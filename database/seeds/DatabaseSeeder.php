<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ManagerSeeder::class);
         $this->call(MenuSeeder::class);
         $this->call(PermissionSeeder::class);
         $this->call(RoleSeeder::class);
         $this->call(SiteSeeder::class);
         $this->call(RoleHasPermissionsSeeder::class);
    }
}
