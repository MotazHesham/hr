<?php

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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'family_create',
            ],
            [
                'id'    => 24,
                'title' => 'family_edit',
            ],
            [
                'id'    => 25,
                'title' => 'family_show',
            ],
            [
                'id'    => 26,
                'title' => 'family_delete',
            ],
            [
                'id'    => 27,
                'title' => 'family_access',
            ],
            [
                'id'    => 28,
                'title' => 'user_document_create',
            ],
            [
                'id'    => 29,
                'title' => 'user_document_edit',
            ],
            [
                'id'    => 30,
                'title' => 'user_document_show',
            ],
            [
                'id'    => 31,
                'title' => 'user_document_delete',
            ],
            [
                'id'    => 32,
                'title' => 'user_document_access',
            ],
            [
                'id'    => 33,
                'title' => 'contract_create',
            ],
            [
                'id'    => 34,
                'title' => 'contract_edit',
            ],
            [
                'id'    => 35,
                'title' => 'contract_show',
            ],
            [
                'id'    => 36,
                'title' => 'contract_delete',
            ],
            [
                'id'    => 37,
                'title' => 'contract_access',
            ],
            [
                'id'    => 38,
                'title' => 'employees_request_access',
            ],
            [
                'id'    => 39,
                'title' => 'vacation_request_create',
            ],
            [
                'id'    => 40,
                'title' => 'vacation_request_edit',
            ],
            [
                'id'    => 41,
                'title' => 'vacation_request_show',
            ],
            [
                'id'    => 42,
                'title' => 'vacation_request_delete',
            ],
            [
                'id'    => 43,
                'title' => 'vacation_request_access',
            ],
            [
                'id'    => 44,
                'title' => 'setting_access',
            ],
            [
                'id'    => 45,
                'title' => 'facility_create',
            ],
            [
                'id'    => 46,
                'title' => 'facility_edit',
            ],
            [
                'id'    => 47,
                'title' => 'facility_show',
            ],
            [
                'id'    => 48,
                'title' => 'facility_delete',
            ],
            [
                'id'    => 49,
                'title' => 'facility_access',
            ],
            [
                'id'    => 50,
                'title' => 'city_create',
            ],
            [
                'id'    => 51,
                'title' => 'city_edit',
            ],
            [
                'id'    => 52,
                'title' => 'city_show',
            ],
            [
                'id'    => 53,
                'title' => 'city_delete',
            ],
            [
                'id'    => 54,
                'title' => 'city_access',
            ],
            [
                'id'    => 55,
                'title' => 'branch_create',
            ],
            [
                'id'    => 56,
                'title' => 'branch_edit',
            ],
            [
                'id'    => 57,
                'title' => 'branch_show',
            ],
            [
                'id'    => 58,
                'title' => 'branch_delete',
            ],
            [
                'id'    => 59,
                'title' => 'branch_access',
            ],
            [
                'id'    => 60,
                'title' => 'vacations_type_create',
            ],
            [
                'id'    => 61,
                'title' => 'vacations_type_edit',
            ],
            [
                'id'    => 62,
                'title' => 'vacations_type_show',
            ],
            [
                'id'    => 63,
                'title' => 'vacations_type_delete',
            ],
            [
                'id'    => 64,
                'title' => 'vacations_type_access',
            ],
            [
                'id'    => 65,
                'title' => 'attendance_access',
            ],
            [
                'id'    => 66,
                'title' => 'reward_create',
            ],
            [
                'id'    => 67,
                'title' => 'reward_edit',
            ],
            [
                'id'    => 68,
                'title' => 'reward_show',
            ],
            [
                'id'    => 69,
                'title' => 'reward_delete',
            ],
            [
                'id'    => 70,
                'title' => 'reward_access',
            ],
            [
                'id'    => 71,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
