<?php

use Illuminate\Support\Facades\Mail;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

Mail::raw('Este es un correo de prueba', function ($message) {
    $message->to('jtpelagio2003@gmail.com')
            ->subject('Correo de prueba');
});

echo "Correo enviado.";