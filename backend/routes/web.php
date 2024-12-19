<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})-> name('trainees.home');

Route::get('/trainees', function () {
    $trainees = [
        ['name' => 'Sodiq', 'skill' => 95, "id" => "1"],
        ['name' => 'Trish', 'skill' => 95, "id" => "2"],
    ];
    return view('trainees.index', ['trainees' => $trainees ]);
})->name('trainees.index');

Route::get('/trainees/{id}', function ($id) {
    // $trainees = [
    //     ['name' => 'Sodiq', 'skill' => 95, "id" => "1"],
    //     ['name' => 'Trish', 'skill' => 95, "id" => "2"],
    // ];
    return view('trainees.show', ['id' => $id]);
})->name('trainees.show');

