<?php

namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ContactService
{
    /**
     * Tạo contact mới
     *
     * @param array $data
     * @param string|null $ipAddress
     * @return Contact
     */
    public function create(array $data, ?string $ipAddress = null): Contact
    {
        // Đảm bảo subject có giá trị mặc định
        if (empty($data['subject'])) {
            $data['subject'] = 'Tư vấn từ trang chủ';
        }

        $contact = Contact::create($data);

        Log::info('New contact submitted', [
            'id' => $contact->id,
            'name' => $contact->name,
            'phone' => $contact->phone,
            'ip' => $ipAddress,
        ]);

        return $contact;
    }

    /**
     * Đánh dấu contact đã đọc
     *
     * @param Contact $contact
     * @param int|null $adminId
     * @return Contact
     */
    public function markAsRead(Contact $contact, ?int $adminId = null): Contact
    {
        $contact->update(['status' => 'read']);

        Log::info('Contact marked as read', [
            'contact_id' => $contact->id,
            'admin_id' => $adminId,
        ]);

        return $contact;
    }

    /**
     * Xóa contact
     *
     * @param Contact $contact
     * @param int|null $adminId
     * @return bool
     */
    public function delete(Contact $contact, ?int $adminId = null): bool
    {
        $contactId = $contact->id;
        $contactName = $contact->name;

        $deleted = $contact->delete();

        if ($deleted) {
            Log::info('Contact deleted', [
                'contact_id' => $contactId,
                'name' => $contactName,
                'admin_id' => $adminId,
            ]);
        }

        return $deleted;
    }

    /**
     * Lấy thống kê contacts
     *
     * @return array
     */
    public function getStats(): array
    {
        return [
            'total' => Contact::count(),
            'unread' => Contact::unread()->count(),
            'read' => Contact::read()->count(),
        ];
    }
}
