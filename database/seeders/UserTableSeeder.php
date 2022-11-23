<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admistrator = User::create([
            'name'=> 'Administrator',
            'email'=> 'administrator@gmail.com',
            'password'=>bcrypt(1111),
            'role'=> 'admin',
        ]);
        
        $super_admin = User::create([
            'name'=> 'Super Admin',
            'email'=> 'superadmin@gmail.com',
            'password'=>bcrypt(1111),
            'role'=> 'superadmin',
        ]);


        //
        $admistrator_role = Role::create(['name' => 'Administrator']);
        $super_admin_role = Role::create(['name' => 'Super Admin']);


        $permission = [
            'Daily Process' => [
                    'Daily Process',
                    'Price List',
                    'Expenses Record',
                    'Create Expenses',
                    'Expenses Head',
            ],
            'Service' => [
                'Service',
                'Service List',
                'Service Received',
            ],
            'Warranty Management' => [
                'Warranty Management',
                'Warranty Clam',
                'Service Center',
                'Claim To Supplier',
                'Warranty Stock',
                'Manage Product',
                'Warranty Delivered',
            ],
            'Purchase' => [
                'Purchase',
                'Purchase Order',
                'Purchase Return',
            ],
            'Sales' => [
                'Sales',
                'Sales Estimate',
                'Sales Return',
            ],
            'Inventory' => [
                'Inventory',
                'Branch',
                'Branch Stock',
                'Warehouse Stock',
                'Transfer Branch',
            ],
            'Client Setup' => [
                'Client Setup',
                'All-Group',
                'Customer',
                'Supplier',
            ],
            'Products Setup' => [
                'Products Setup',
                'Category',
                'Sub Category',
                'Product',
                'Stock',
            ],
            'Masters Setup' => [
                'Masters Setup',
                'Brand',
                'Manufacturer',
                'Unit',
                'Currency',
                'Country',
                'Transport',
                'Color',
                'Size',
                'District',
                'Zone',
            ],
            'Accounts Setup' => [
                'Accounts Setup',
                'Class',
                'Group',
                'Sub-Group',
                'Ledger',
                'Journal',
            ],
            'Finance Record' => [
                'Finance Record',
                'Chart of Account',
                'profit And Loss',
                'Trial Balance',
                'Balance Sheet',
                'Finance Analycis',
            ],
            'Payroll' => [
                'Payroll',
                'Department',
                'Designation',
                'Employee',
                'Leave Type',
                'Leave Application',
            ],
            'Bank' => [
                'Bank',
                'Account',
                'Mobile Account',
                'Transaction',
                'Cheque Management',
            ],
            'Users And Role' => [
                'Users And Role',
                'Role',
                'User',
            ],
        ];

function create_permission( $permission_array ){
       
        $i = 0 ;
        foreach ( $permission_array as $permission_group => $group_name) {
            $i++;
            foreach ($group_name as $permission_name) {
                $permissiontype = [
                    'read',
                    'edit',
                    'create',
                    'delete',
                    'print',
                ];
                foreach ( $permissiontype as $key => $value) {
                    Permission::create(['name' => $permission_name.' '.$value,'group_id'=>$i, 'group_name'=>$permission_group]);
                }

            }
            
        }
}
        create_permission($permission);


        

        



        $admistrator->assignRole($admistrator_role);
        $super_admin->assignRole($super_admin_role);


        $admistrator_role->givePermissionTo(Permission::all());

    
    }
}
