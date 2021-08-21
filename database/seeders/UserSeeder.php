<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PhpParser\Builder\Use_;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = new User();
        $users->name = 'Tống Văn Dũng';
        $users->email = 'tongvanthienvu@gmail.com';
        $users->password = Hash::make('10tongdung10');
        $users->level = 'Admin';
        $users->save();
    }
}
