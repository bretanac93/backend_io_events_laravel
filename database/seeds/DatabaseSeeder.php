<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Cesar Bretana Gonzalez',
            'email' => 'bretanac@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'name' => 'Albert Einstein',
            'email' => 'alber@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
