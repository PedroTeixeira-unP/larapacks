<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

Route::get('/packages', function () {
    try {
        $list = shell_exec('npm list --depth=0 --json');
        $packageList = json_decode($list, true)['dependencies'];
        return View::make('packages', compact('packageList'));
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to retrieve package list.'], 500);
    }
});

Route::post('/install', function (Request $request) {
    $packageName = $request->input('package');
    shell_exec("npm install $packageName@latest");
    return back()->with('message', "Package $packageName installed successfully.");
});