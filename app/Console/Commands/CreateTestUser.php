<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateTestUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-test-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a test user for development';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Check if user already exists
        if (User::where('email', 'test@baliseo.com')->exists()) {
            $this->info('Test user already exists!');
            return;
        }

        // Create test user
        User::create([
            'name' => 'Test User',
            'email' => 'test@baliseo.com',
            'password' => Hash::make('password123'),
        ]);

        $this->info('Test user created successfully!');
        $this->info('Email: test@baliseo.com');
        $this->info('Password: password123');
    }
}
