<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'admin')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Tạo tài khoản Admin thành công.');
    }

    public function edit(User $user)
    {
        if ($user->role !== 'admin') {
            return redirect()->route('admin.users.index')->with('error', 'Chỉ được phép chỉnh sửa tài khoản Admin.');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', 'min:6'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật thông tin thành công.');
    }

    public function destroy(User $user)
    {
        if ($user->role !== 'admin') {
            abort(403);
        }

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Bạn không thể xóa tài khoản của chính mình.');
        }

        // Prevent deleting the last admin if needed, but for now simple check is enough
        $adminCount = User::where('role', 'admin')->count();
        if ($adminCount <= 1) {
            return back()->with('error', 'Không thể xóa Admin cuối cùng.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Đã xóa tài khoản Admin.');
    }

    public function toggleStatus(User $user)
    {
        if ($user->role !== 'admin') {
            abort(403);
        }

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Bạn không thể tự vô hiệu hóa tài khoản của chính mình.');
        }

        $user->is_active = !$user->is_active;
        $user->save();

        $status = $user->is_active ? 'kích hoạt' : 'vô hiệu hóa';
        return redirect()->route('admin.users.index')->with('success', "Đã {$status} tài khoản [{$user->name}].");
    }
}
