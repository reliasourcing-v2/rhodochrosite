<?php

namespace App\Http\Controllers;

use App\Http\Requests\CkeditorStoreRequest;

class CkeditorController extends Controller
{
    public function upload(CkeditorStoreRequest $request) {
        
    	$result = $request->file('upload')->store('ckeditor-images', 'public');

    	$url = url('/') . '/storage/';
    	
    	$path = $url . $result;

    	return response()->json([
    		'url' => $path,
    	]);
    }
}
