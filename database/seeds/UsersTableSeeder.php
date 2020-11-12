<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Transisi',
            'email' => 'admin@transisi.id',
            'password' => bcrypt('transisi')
        ]);

        factory(User::class, 5)->create();
    }
}
