<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:change-password {email : The email address of the user} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Changes user password';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        /** @var User $user */
        $user = User::query()->where('email', $this->argument('email'))->first();
        $user->password = Hash::make($this->argument('password'));
        $user->save();
        return 0;

    }
}
