<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'show_document',
            'create_document',
            'edit_document',
            'download_document',
            'print_document',
            'delete_document',
            'approve_document',
            'reject_document',
            'request_document_revision',
            'archive_document',
            'restore_document',
            'share_document',
            'transfer_document_ownership',
        ];
    
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        
    }
}
