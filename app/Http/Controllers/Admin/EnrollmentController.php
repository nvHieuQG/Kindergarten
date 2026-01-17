<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::latest()->paginate(15);
        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function show(Enrollment $enrollment)
    {
        return view('admin.enrollments.show', compact('enrollment'));
    }

    public function updateStatus(Request $request, Enrollment $enrollment)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|in:pending,reviewing,approved,rejected',
                'admin_notes' => 'nullable|string'
            ]);

            $oldStatus = $enrollment->status;
            $enrollment->update($validated);

            Log::info('Enrollment status updated', [
                'enrollment_id' => $enrollment->id,
                'old_status' => $oldStatus,
                'new_status' => $enrollment->status,
                'admin_id' => Auth::id(),
                'admin_email' => Auth::user()?->email,
            ]);

            return redirect()->back()->with('success', 'Trạng thái đăng ký đã được cập nhật thành công!');
        } catch (\Exception $e) {
            Log::error('Failed to update enrollment status', [
                'enrollment_id' => $enrollment->id,
                'error' => $e->getMessage(),
                'admin_id' => Auth::id(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi khi cập nhật trạng thái. Vui lòng thử lại sau.');
        }
    }

    public function destroy(Enrollment $enrollment)
    {
        try {
            $enrollmentId = $enrollment->id;
            $childName = $enrollment->child_name;
            
            $enrollment->delete();

            Log::info('Enrollment deleted', [
                'enrollment_id' => $enrollmentId,
                'child_name' => $childName,
                'admin_id' => Auth::id(),
                'admin_email' => Auth::user()?->email,
            ]);

            return redirect()->route('admin.enrollments.index')->with('success', 'Đơn đăng ký đã được xóa thành công!');
        } catch (\Exception $e) {
            Log::error('Failed to delete enrollment', [
                'enrollment_id' => $enrollment->id,
                'error' => $e->getMessage(),
                'admin_id' => Auth::id(),
            ]);

            return redirect()->back()
                ->with('error', 'Đã xảy ra lỗi khi xóa đơn đăng ký. Vui lòng thử lại sau.');
        }
    }
}
