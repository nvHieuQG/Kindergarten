<?php

namespace App\Services;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Log;

class EnrollmentService
{
    /**
     * Tạo đơn đăng ký mới
     *
     * @param array $data
     * @param string|null $ipAddress
     * @return Enrollment
     * @throws \Exception
     */
    public function create(array $data, ?string $ipAddress = null): Enrollment
    {
        $enrollment = Enrollment::create($data);

        Log::info('New enrollment submitted', [
            'id' => $enrollment->id,
            'child_name' => $enrollment->child_name,
            'parent_name' => $enrollment->parent_name,
            'parent_phone' => $enrollment->parent_phone,
            'ip' => $ipAddress,
        ]);

        return $enrollment;
    }

    /**
     * Cập nhật trạng thái đơn đăng ký
     *
     * @param Enrollment $enrollment
     * @param string $status
     * @param string|null $adminNotes
     * @param int|null $adminId
     * @return Enrollment
     */
    public function updateStatus(
        Enrollment $enrollment,
        string $status,
        ?string $adminNotes = null,
        ?int $adminId = null
    ): Enrollment {
        $oldStatus = $enrollment->status;

        $enrollment->update([
            'status' => $status,
            'admin_notes' => $adminNotes,
        ]);

        Log::info('Enrollment status updated', [
            'enrollment_id' => $enrollment->id,
            'old_status' => $oldStatus,
            'new_status' => $status,
            'admin_id' => $adminId,
        ]);

        return $enrollment;
    }

    /**
     * Xóa đơn đăng ký
     *
     * @param Enrollment $enrollment
     * @param int|null $adminId
     * @return bool
     */
    public function delete(Enrollment $enrollment, ?int $adminId = null): bool
    {
        $enrollmentId = $enrollment->id;
        $childName = $enrollment->child_name;

        $deleted = $enrollment->delete();

        if ($deleted) {
            Log::info('Enrollment deleted', [
                'enrollment_id' => $enrollmentId,
                'child_name' => $childName,
                'admin_id' => $adminId,
            ]);
        }

        return $deleted;
    }

    /**
     * Lấy thống kê enrollment
     *
     * @return array
     */
    public function getStats(): array
    {
        return [
            'total' => Enrollment::count(),
            'pending' => Enrollment::pending()->count(),
            'reviewing' => Enrollment::reviewing()->count(),
            'approved' => Enrollment::approved()->count(),
            'rejected' => Enrollment::rejected()->count(),
        ];
    }
}
