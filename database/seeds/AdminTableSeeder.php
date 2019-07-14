<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\Permission;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[
              
                   'name' => 'admin',
                   'email' => 'admin@gmail.com',
                  'password' =>  bcrypt('123456789')
               ];
        $role=[
               	 'name' => 'admin',
                   'display_name' => 'admin',
                   'description' => 'admin role'
               
              ];

               $permissions=[
              [
                   'name' => 'role-index',
                   'display_name' => 'Display role Listing',
                   'description' => 'See all role'
               ],
               [
                   'name' => 'role-show',
                   'display_name' => 'show role ',
                   'description' => 'show role'
               ],
               [
                   'name' => 'role-create',
                   'display_name' => 'Create role',
                   'description' => 'Create New role'
               ],
               [
                   'name' => 'role-edit',
                   'display_name' => 'Edit role',
                   'description' => 'Edit role'
               ],
               [
                   'name' => 'role-delete',
                   'display_name' => 'Delete role',
                   'description' => 'Delete role'
               ],
              ///////////////////////
               [
                   'name' => 'user-index',
                   'display_name' => 'Display user Listing',
                   'description' => 'See all user'
               ],
               [
                   'name' => 'user-show',
                   'display_name' => 'show user ',
                   'description' => 'show user'
               ],
               [
                   'name' => 'user-create',
                   'display_name' => 'Create user',
                   'description' => 'Create New user'
               ],
               [
                   'name' => 'user-edit',
                   'display_name' => 'Edit user',
                   'description' => 'Edit user'
               ],
               [
                   'name' => 'user-delete',
                   'display_name' => 'Delete user',
                   'description' => 'Delete user'
               ],
              
              
//////////////////////////

               [
                   'name' => 'project-index',
                   'display_name' => 'Display project Listing',
                   'description' => 'See all projects'
               ],
               [
                   'name' => 'project-show',
                   'display_name' => 'show project ',
                   'description' => 'show project'
               ],
               [
                   'name' => 'project-create',
                   'display_name' => 'Create project',
                   'description' => 'Create New project'
               ],
               [
                   'name' => 'project-edit',
                   'display_name' => 'Edit project',
                   'description' => 'Edit project'
               ],
               [
                   'name' => 'project-delete',
                   'display_name' => 'Delete project',
                   'description' => 'Delete project'
               ],

///////////////////////////////////////
                [
                   'name' => 'service-index',
                   'display_name' => 'Display service Listing',
                   'description' => 'See all service'
               ],
               [
                   'name' => 'service-show',
                   'display_name' => 'show service ',
                   'description' => 'show service'
               ],
               [
                   'name' => 'service-create',
                   'display_name' => 'Create service',
                   'description' => 'Create New service'
               ],
               [
                   'name' => 'service-edit',
                   'display_name' => 'Edit service',
                   'description' => 'Edit service'
               ],
               [
                   'name' => 'service-delete',
                   'display_name' => 'Delete service',
                   'description' => 'Delete service'
               ],

  ///////////////////////////////////////////////

                [
                   'name' => 'email-index',
                   'display_name' => 'Display email Listing',
                   'description' => 'See all email'
               ],
               [
                   'name' => 'email-show',
                   'display_name' => 'show email ',
                   'description' => 'show email'
               ],
               [
                   'name' => 'email-create',
                   'display_name' => 'Create email',
                   'description' => 'Create New email'
               ],
               [
                   'name' => 'email-edit',
                   'display_name' => 'Edit email',
                   'description' => 'Edit email'
               ],
               [
                   'name' => 'email-delete',
                   'display_name' => 'Delete email',
                   'description' => 'Delete email'
               ],

               ///////////////////////////////////////////////

                [
                   'name' => 'social-index',
                   'display_name' => 'Display social Listing',
                   'description' => 'See all social'
               ],
               [
                   'name' => 'social-show',
                   'display_name' => 'show social ',
                   'description' => 'show social'
               ],
               [
                   'name' => 'social-create',
                   'display_name' => 'Create social',
                   'description' => 'Create New social'
               ],
               [
                   'name' => 'social-edit',
                   'display_name' => 'Edit social',
                   'description' => 'Edit social'
               ],
               [
                   'name' => 'social-delete',
                   'display_name' => 'Delete social',
                   'description' => 'Delete social'
               ],
                              ///////////////////////////////////////////////

                [
                   'name' => 'mobile-index',
                   'display_name' => 'Display mobile Listing',
                   'description' => 'See all mobile'
               ],
               [
                   'name' => 'mobile-show',
                   'display_name' => 'show mobile ',
                   'description' => 'show mobile'
               ],
               [
                   'name' => 'mobile-create',
                   'display_name' => 'Create mobile',
                   'description' => 'Create New mobile'
               ],
               [
                   'name' => 'mobile-edit',
                   'display_name' => 'Edit mobile',
                   'description' => 'Edit mobile'
               ],
               [
                   'name' => 'mobile-delete',
                   'display_name' => 'Delete mobile',
                   'description' => 'Delete mobile'
               ],
          ///////////////////////////////////////////////

                [
                   'name' => 'subscribe-index',
                   'display_name' => 'Display subscribe Listing',
                   'description' => 'See all subscribe'
               ],

                [
                   'name' => 'subscribe-delete',
                   'display_name' => 'Delete subscribe',
                   'description' => 'Delete subscribe'
               ],
               ///////////////////////////////
               
                [
                   'name' => 'setting-edit',
                   'display_name' => 'Edit setting',
                   'description' => 'Edit setting'
               ],

              ///////////////////////////////
              
              
              

       ];

       foreach ($permissions as $key=>$value){
        Permission::create($value);
    }


        $user=User::create($user);
        $role=Role::create($role);

        $user->roles()->attach($role);
        $role->permissions()->attach(Permission::all());
        //  Auth::logout();


    }
}
