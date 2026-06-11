<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

class TestProviderReg extends Command
{
    protected $signature = 'test:provider';

    protected $description = 'Test provider registration';

    public function handle()
    {
        try {
            $user = \App\Models\User::create([
                'name' => 'Test Provider',
                'email' => 'testprov2@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'provider',
                'status' => 'pending',
            ]);

            \App\Models\Provider::create([
                'user_id' => $user->id,
                'nama_instansi' => $user->name,
                'deskripsi_instansi' => null,
                'website' => null,
                'email_kontak' => $user->email,
                'no_hp' => null,
                'alamat' => null,
            ]);

            event(new \Illuminate\Auth\Events\Registered($user));
            $this->info("Success!");
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
