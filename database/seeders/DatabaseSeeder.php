<?php

namespace Database\Seeders;

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
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CourseSeeder::class);
    }
}
