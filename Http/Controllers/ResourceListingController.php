<?php

namespace Radwanic\ResourceListing\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Radwanic\ResourceListing\ResourceListing;

class ResourceListingController
{
    public function fetch()
    {
        $resource = request()->json('resource');

        if(!class_exists($resource)) {
            return response()->json(['error' => true, 'message' => "Invalid class $resource"], 422);
        }

        $orderBy = request()->json('orderBy', 'created_at');
        $order = request()->json('order', 'desc');
        $limit = request()->json('limit', 10);
        $resourceTitleColumn = request()->json('resourceTitleColumn', 'title');

        $items = $resource::orderBy($orderBy, $order)->take($limit)->get();

        $items->map(function ($item) use ($resourceTitleColumn) {
            $item->makeVisible('id');
            $item->title = $item->{$resourceTitleColumn};
        });

        return response()->json($items, 200);
    }
}
