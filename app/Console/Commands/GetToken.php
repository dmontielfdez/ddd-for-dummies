<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GetToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:token {userId}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Token for a user';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $id = $this->argument('userId');

        /** @var User $user */
        $user = User::query()->where('id', $id)->first();
        $this->info($user->createToken('token-name')->plainTextToken);
        return 0;
    }
}
