<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Branch;
use App\Models\City;
use App\Models\Country;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Setting;
use App\Models\Employee;
use App\Models\Page;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Setting::factory(1)->create();
        Employee::factory(2)->create();
        Country::factory(1)->create();
        City::factory(1)->create();
        Branch::factory(1)->create();
        Supervisor::factory(2)->create();
        User::factory(2)->create();
        Page::factory(1)->create();
        Category::factory(1)->create();
    }
}
