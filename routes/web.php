<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('deploy-webhook', function () {
    if (env('FTP_DEPLOY_SECRET') != request('secret')) {
        abort(403, 'Unauthorized');
    } else {
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('storage:link');

        return 'Artisan run successfully!';
    }
});

Route::get('/', function () {
    return view('welcome');
});
