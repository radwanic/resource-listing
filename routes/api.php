<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Card API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your card. These routes
| are loaded by the ServiceProvider of your card. You're free to add
| as many additional routes to this file as your card may require.
|
*/
//

Route::post('/fetch', function () {
    $resource = request()->json('resource');

    if(!class_exists($resource)) {
        return response()->json(['error' => true, 'message' => "Invalid class $resource"], 422);
    }

    $orderBy = request()->json('orderBy', 'created_at');
    $order = request()->json('order', 'desc');
    $limit = request()->json('limit', 10);
    $resourceTitleColumn = request()->json('resourceTitleColumn', 'title');

    $items = $resource::orderBy($orderBy, $order)->take($limit)->get();

    $items->map(function ($item) use ($resourceTitleColumn, $orderBy) {
        $item->makeVisible('id');
        $item->title = $item->{$resourceTitleColumn};
        $item->readable_created_at = \Carbon\Carbon::parse($item->created_at)->diffForHumans();
    });

    return response()->json($items, 200);
});

//Route::post('/fetch' , \Radwanic\ResourceListing\Http\Controllers\ResourceListingController::class.'@fetch');