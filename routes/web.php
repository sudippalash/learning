<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('deploy-webhook', function () {
    if (env('FTP_DEPLOY_SECRET') == request('secret')) {
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('storage:link');

        return 'Artisan run successfully!';
    } else {
        return 'Invalid secret!';
    }
});

Route::get('/', function () {
    return view('welcome');
});
