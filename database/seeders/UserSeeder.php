<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    private $user;

    public function __construct(User $user_model) {
        $this->user= $user_model;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->user->name = 'kredo';
        $this->user->email = 'kredo@gmail.coom';
        $this->user->password = Hash::make('kredo12345');
        $this->user->role = User::USER_ROLE;
        $this->user->save();
    }
}
