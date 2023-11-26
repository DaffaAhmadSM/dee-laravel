<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $category_list =[
           [ "name" => "LED Display"],
           [ "name" => "Genset"],
           [ "name" => "Lighting"],
           [ "name" => "Party Equipment"],
           [ "name" => "Sound System"],
           [ "name" => "Stage"],
           [ "name" => "Tenda"],
           [ "name" => "Decoration"],
           [ "name" => "Photo/Video Equipment"],
           [ "name" => "Other"],
        ];

        Category::insert($category_list);
        Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make("admin123"),
        ]);

        $admin->assignRole('admin');
    }
}
