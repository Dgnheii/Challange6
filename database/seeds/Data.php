<?php

use Illuminate\Database\Seeder;

class Data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('permissions')->insert([
            ['name' => 'edit_all'],
            ['name' => 'edit_own'],
            ['name' => 'delete_all'],
            ['name' => 'delete_own'],
            ['name' => 'upload'],
        ]);
        
        DB::table('roles')->insert([
            ['name' => 'admin'],
        ]);
        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('permission_role')->insert([
            ['permisison_id' => 1, 'role_id' => 1],
            ['permisison_id' => 2, 'role_id' => 1],
            ['permisison_id' => 3, 'role_id' => 1],
            ['permisison_id' => 4, 'role_id' => 1],
            ['permisison_id' => 5, 'role_id' => 1],
        ]);
        
    }
}
