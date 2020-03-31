<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any?}', 'SinglePageController')
    ->where('any', '.*');