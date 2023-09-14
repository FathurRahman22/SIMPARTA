<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_access',
            ],
            [
                'id'    => 18,
                'title' => 'tag_create',
            ],
            [
                'id'    => 19,
                'title' => 'tag_edit',
            ],
            [
                'id'    => 20,
                'title' => 'tag_show',
            ],
            [
                'id'    => 21,
                'title' => 'tag_delete',
            ],
            [
                'id'    => 22,
                'title' => 'tag_access',
            ],
            [
                'id'    => 23,
                'title' => 'review_create',
            ],
            [
                'id'    => 24,
                'title' => 'review_edit',
            ],
            [
                'id'    => 25,
                'title' => 'review_show',
            ],
            [
                'id'    => 26,
                'title' => 'review_delete',
            ],
            [
                'id'    => 27,
                'title' => 'review_access',
            ],
            [
                'id'    => 28,
                'title' => 'fasilitasWisata_create',
            ],
            [
                'id'    => 29,
                'title' => 'fasilitasWisata_edit',
            ],
            [
                'id'    => 30,
                'title' => 'fasilitasWisata_show',
            ],
            [
                'id'    => 31,
                'title' => 'fasilitasWisata_delete',
            ],
            [
                'id'    => 32,
                'title' => 'fasilitasWisata_access',
            ],
            [
                'id'    => 33,
                'title' => 'agenda_create',
            ],
            [
                'id'    => 34,
                'title' => 'agenda_edit',
            ],
            [
                'id'    => 35,
                'title' => 'agenda_show',
            ],
            [
                'id'    => 36,
                'title' => 'agenda_delete',
            ],
            [
                'id'    => 37,
                'title' => 'agenda_access',
            ],
            [
                'id'    => 38,
                'title' => 'data_access',
            ],
            [
                'id'    => 39,
                'title' => 'data_lain_create',
            ],
            [
                'id'    => 40,
                'title' => 'data_lain_edit',
            ],
            [
                'id'    => 41,
                'title' => 'data_lain_show',
            ],
            [
                'id'    => 42,
                'title' => 'data_lain_delete',
            ],
            [
                'id'    => 43,
                'title' => 'data_lain_access',
            ],
            [
                'id'    => 44,
                'title' => 'dataprofil_create',
            ],
            [
                'id'    => 45,
                'title' => 'dataprofil_edit',
            ],
            [
                'id'    => 46,
                'title' => 'dataprofil_show',
            ],
            [
                'id'    => 47,
                'title' => 'dataprofil_delete',
            ],
            [
                'id'    => 48,
                'title' => 'dataprofil_access',
            ],
            [
                'id'    => 49,
                'title' => 'paket_create',
            ],
            [
                'id'    => 50,
                'title' => 'paket_edit',
            ],
            [
                'id'    => 51,
                'title' => 'paket_show',
            ],
            [
                'id'    => 52,
                'title' => 'paket_delete',
            ],
            [
                'id'    => 53,
                'title' => 'paket_access',
            ],
            [
                'id'    => 54,
                'title' => 'data_kunjungan_create',
            ],
            [
                'id'    => 55,
                'title' => 'data_kunjungan_edit',
            ],
            [
                'id'    => 56,
                'title' => 'data_kunjungan_show',
            ],
            [
                'id'    => 57,
                'title' => 'data_kunjungan_delete',
            ],
            [
                'id'    => 58,
                'title' => 'data_kunjungan_access',
            ],
            [
                'id'    => 59,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 60,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 61,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
