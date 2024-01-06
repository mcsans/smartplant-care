<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $serviceName = 'TestSatu';

    $names = explode('/', $serviceName);
    $classname = end($names);

    if (count($names) > 1) {
        array_pop($names);
        $namespace = 'App\\Http\\Services\\Features\\' . implode('\\', $names);
    } else {
        $namespace = 'App\\Http\\Services\\Features';
    }

    echo $classname;
    echo '<br>';
    echo $namespace;
});
