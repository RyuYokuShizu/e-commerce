<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{

    private $user;

    public function __construct(User $user_model) {
        $this->user = $user_model;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->user->name = 'admin';
        $this->user->email = 'admin@gmail.com';
        $this->user->password = Hash::make('admin12345');
        $this->user->role = User::ADMIN_ROLE;
        $this->user->save();
    }
}
