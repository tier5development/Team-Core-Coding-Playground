<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user           = new User();
        $user->name     = 'Flipbabon Admin';
        $user->email    = 'tarun.raj@tier5.in';
        $user->password = Hash::make('123456');
        $user->role     = '1';
        $user->save();
    }
}
