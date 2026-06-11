<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::create('/scholarships/1/chat-rooms', 'GET');

// mock user role as mahasiswa
$user = \App\Models\User::where('role', 'mahasiswa')->first();
$request->setUserResolver(function () use ($user) {
    return $user;
});
\Illuminate\Support\Facades\Auth::login($user);

$response = $kernel->handle($request);

if ($response->status() >= 500) {
    if (isset($response->exception)) {
        echo $response->exception->getMessage() . "\n";
        echo $response->exception->getFile() . ":" . $response->exception->getLine() . "\n";
    } else {
        echo $response->getContent();
    }
} else {
    echo "Status: " . $response->status() . "\n";
}
