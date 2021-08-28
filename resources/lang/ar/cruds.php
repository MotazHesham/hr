<?php

return [
    'userManagement' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'First Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'last_name'                => 'Last Name',
            'last_name_helper'         => ' ',
            'job_number'               => 'Job Number',
            'job_number_helper'        => ' ',
            'phone'                    => 'Phone',
            'phone_helper'             => ' ',
            'identity_number'          => 'Identity Number',
            'identity_number_helper'   => ' ',
            'identity_end_date'        => 'Identity End Date',
            'identity_end_date_helper' => ' ',
            'gender'                   => 'Gender',
            'gender_helper'            => ' ',
            'image'                    => 'Image',
            'image_helper'             => ' ',
            'birthday'                 => 'Birthday',
            'birthday_helper'          => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
        ],
    ],
    'family' => [
        'title'          => 'Families',
        'title_singular' => 'Family',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'relation'          => 'Relation',
            'relation_helper'   => ' ',
            'birthday'          => 'Birthday',
            'birthday_helper'   => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'userDocument' => [
        'title'          => 'User Documents',
        'title_singular' => 'User Document',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'number'            => 'Number',
            'number_helper'     => ' ',
            'end_date'          => 'End Date',
            'end_date_helper'   => ' ',
            'file'              => 'File',
            'file_helper'       => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contract' => [
        'title'          => 'Contracts',
        'title_singular' => 'Contract',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'salery'            => 'Salery',
            'salery_helper'     => ' ',
            'start_date'        => 'Start Date',
            'start_date_helper' => ' ',
            'end_date'          => 'End Date',
            'end_date_helper'   => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'job_tasks'         => 'Job Tasks',
            'job_tasks_helper'  => ' ',
        ],
    ],
    'employeesRequest' => [
        'title'          => 'Employees Requests',
        'title_singular' => 'Employees Request',
    ],
    'vacationRequest' => [
        'title'          => 'Vacation Requests',
        'title_singular' => 'Vacation Request',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'reason'               => 'Reason',
            'reason_helper'        => ' ',
            'start_date'           => 'Start Date',
            'start_date_helper'    => ' ',
            'end_date'             => 'End Date',
            'end_date_helper'      => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'vacation_type'        => 'Vacation Type',
            'vacation_type_helper' => ' ',
            'user'                 => 'User',
            'user_helper'          => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'facility' => [
        'title'          => 'Facilities',
        'title_singular' => 'Facility',
        'fields'         => [
            'id'                                    => 'ID',
            'id_helper'                             => ' ',
            'name'                                  => 'Name',
            'name_helper'                           => ' ',
            'phone'                                 => 'Phone',
            'phone_helper'                          => ' ',
            'mailbox'                               => 'Mailbox',
            'mailbox_helper'                        => ' ',
            'post_code'                             => 'Post Code',
            'post_code_helper'                      => ' ',
            'building_number'                       => 'Building Number',
            'building_number_helper'                => ' ',
            'unit_number'                           => 'Unit Number',
            'unit_number_helper'                    => ' ',
            'neighborhood'                          => 'Neighborhood',
            'neighborhood_helper'                   => ' ',
            'street_number'                         => 'Street Number',
            'street_number_helper'                  => ' ',
            'comrl_reg_num'                         => 'Comrl Reg Num',
            'comrl_reg_num_helper'                  => ' ',
            'comrl_reg_expiry'                      => 'Comrl Reg Expiry',
            'comrl_reg_expiry_helper'               => ' ',
            'chamber_commerce_num'                  => 'Chamber Commerce Num',
            'chamber_commerce_num_helper'           => ' ',
            'chamber_commerce_expiry'               => 'Chamber Commerce Expiry',
            'chamber_commerce_expiry_helper'        => ' ',
            'municipal_license_num'                 => 'Municipal License Num',
            'municipal_license_num_helper'          => ' ',
            'municcipal_license_expiry'             => 'Municcipal License Expiry',
            'municcipal_license_expiry_helper'      => ' ',
            'civil_defense_license'                 => 'Civil Defense License',
            'civil_defense_license_helper'          => ' ',
            'civil_defense_license_expiry'          => 'Civil Defense License Expiry',
            'civil_defense_license_expiry_helper'   => ' ',
            'facility_num_in_work_office'           => 'Facility Num In Work Office',
            'facility_num_in_work_office_helper'    => ' ',
            'facility_num_in_insurance'             => 'Facility Num In Insurance',
            'facility_num_in_insurance_helper'      => ' ',
            'tax_num'                               => 'Tax Num',
            'tax_num_helper'                        => ' ',
            'logo'                                  => 'Logo',
            'logo_helper'                           => ' ',
            'comrl_reg_image'                       => 'Comrl Reg Image',
            'comrl_reg_image_helper'                => ' ',
            'chamber_of_commerce_image'             => 'Chamber Of Commerce Image',
            'chamber_of_commerce_image_helper'      => ' ',
            'vat_registeration_cerftificate'        => 'Vat Registeration Cerftificate',
            'vat_registeration_cerftificate_helper' => ' ',
            'created_at'                            => 'Created at',
            'created_at_helper'                     => ' ',
            'updated_at'                            => 'Updated at',
            'updated_at_helper'                     => ' ',
            'deleted_at'                            => 'Deleted at',
            'deleted_at_helper'                     => ' ',
            'city'                                  => 'City',
            'city_helper'                           => ' ',
        ],
    ],
    'city' => [
        'title'          => 'Cities',
        'title_singular' => 'City',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'branch' => [
        'title'          => 'Branches',
        'title_singular' => 'Branch',
        'fields'         => [
            'id'                                    => 'ID',
            'id_helper'                             => ' ',
            'name'                                  => 'Name',
            'name_helper'                           => ' ',
            'phone'                                 => 'Phone',
            'phone_helper'                          => ' ',
            'mailbox'                               => 'Mailbox',
            'mailbox_helper'                        => ' ',
            'post_code'                             => 'Post Code',
            'post_code_helper'                      => ' ',
            'building_number'                       => 'Building Number',
            'building_number_helper'                => ' ',
            'unit_number'                           => 'Unit Number',
            'unit_number_helper'                    => ' ',
            'neighborhood'                          => 'Neighborhood',
            'neighborhood_helper'                   => ' ',
            'street_number'                         => 'Street Number',
            'street_number_helper'                  => ' ',
            'comrl_reg_num'                         => 'Comrl Reg Num',
            'comrl_reg_num_helper'                  => ' ',
            'comrl_reg_expiry'                      => 'Comrl Reg Expiry',
            'comrl_reg_expiry_helper'               => ' ',
            'chamber_commerce_num'                  => 'Chamber Commerce Num',
            'chamber_commerce_num_helper'           => ' ',
            'chamber_commerce_expiry'               => 'Chamber Commerce Expiry',
            'chamber_commerce_expiry_helper'        => ' ',
            'municipal_license_num'                 => 'Municipal License Num',
            'municipal_license_num_helper'          => ' ',
            'municcipal_license_expiry'             => 'Municcipal License Expiry',
            'municcipal_license_expiry_helper'      => ' ',
            'civil_defense_license'                 => 'Civil Defense License',
            'civil_defense_license_helper'          => ' ',
            'civil_defense_license_expiry'          => 'Civil Defense License Expiry',
            'civil_defense_license_expiry_helper'   => ' ',
            'facility_num_in_work_office'           => 'Facility Num In Work Office',
            'facility_num_in_work_office_helper'    => ' ',
            'facility_num_in_insurance'             => 'Facility Num In Insurance',
            'facility_num_in_insurance_helper'      => ' ',
            'tax_num'                               => 'Tax Num',
            'tax_num_helper'                        => ' ',
            'logo'                                  => 'Logo',
            'logo_helper'                           => ' ',
            'comrl_reg_image'                       => 'Comrl Reg Image',
            'comrl_reg_image_helper'                => ' ',
            'chamber_of_commerce_image'             => 'Chamber Of Commerce Image',
            'chamber_of_commerce_image_helper'      => ' ',
            'vat_registeration_cerftificate'        => 'Vat Registeration Cerftificate',
            'vat_registeration_cerftificate_helper' => ' ',
            'city'                                  => 'City',
            'city_helper'                           => ' ',
            'facility'                              => 'Facility',
            'facility_helper'                       => ' ',
            'manager'                               => 'Manager',
            'manager_helper'                        => ' ',
            'created_at'                            => 'Created at',
            'created_at_helper'                     => ' ',
            'updated_at'                            => 'Updated at',
            'updated_at_helper'                     => ' ',
            'deleted_at'                            => 'Deleted at',
            'deleted_at_helper'                     => ' ',
        ],
    ],
    'vacationsType' => [
        'title'          => 'Vacations Types',
        'title_singular' => 'Vacations Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'attendance' => [
        'title'          => 'Attendance',
        'title_singular' => 'Attendance',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'reward' => [
        'title'          => 'Rewards',
        'title_singular' => 'Reward',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
