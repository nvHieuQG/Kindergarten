<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        // Mark as read if not already
        if ($contact->status == 'unread') {
            $contact->update(['status' => 'read']);
            
            Log::info('Contact marked as read', [
                'contact_id' => $contact->id,
                'admin_id' => Auth::id(),
            ]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function markAsRead(Contact $contact)
    {
        try {
            $contact->update(['status' => 'read']);

            Log::info('Contact marked as read', [
                'contact_id' => $contact->id,
                'admin_id' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Tin nhắn đã được đánh dấu là đã đọc!');
        } catch (\Exception $e) {
            Log::error('Failed to mark contact as read', [
                'contact_id' => $contact->id,
                'error' => $e->getMessage(),
                'admin_id' => Auth::id(),
            ]);

            return redirect()->back()->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau.');
        }
    }

    public function destroy(Contact $contact)
    {
        try {
            $contactId = $contact->id;
            $contactName = $contact->name;
            
            $contact->delete();

            Log::info('Contact deleted', [
                'contact_id' => $contactId,
                'contact_name' => $contactName,
                'admin_id' => Auth::id(),
                'admin_email' => Auth::user()?->email,
            ]);

            return redirect()->route('admin.contacts.index')->with('success', 'Tin nhắn liên hệ đã được xóa thành công!');
        } catch (\Exception $e) {
            Log::error('Failed to delete contact', [
                'contact_id' => $contact->id,
                'error' => $e->getMessage(),
                'admin_id' => Auth::id(),
            ]);

            return redirect()->back()
                ->with('error', 'Đã xảy ra lỗi khi xóa tin nhắn. Vui lòng thử lại sau.');
        }
    }
}
