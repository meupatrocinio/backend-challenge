<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;

class ItemController extends Controller
{

    public function getItems(ItemRequest $req, ItemService $itemService){

        $req = $req->validated();
        $response = $itemService->getItem($req->page ?? 1, $req->perPage ?? 100);
        return $response;

    }
}
