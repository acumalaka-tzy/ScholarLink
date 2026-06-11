<?php
$req = Request::create('/chat-rooms/1', 'GET');
$user = \App\Models\User::where('role', 'mahasiswa')->first();
$req->setUserResolver(function () use ($user) {
    return $user;
});
Auth::login($user);
$res = app()->handle($req);
if ($res->status() >= 500) {
    if (isset($res->exception)) {
        echo $res->exception->getMessage() . "\n";
        echo $res->exception->getFile() . ":" . $res->exception->getLine() . "\n";
    } else {
        echo $res->getContent();
    }
} else {
    echo "Status: " . $res->status() . "\n";
}
