<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;

class ItemController extends Controller
{

    public function getItems(ItemRequest $req, ItemService $itemService){

        $req = $req->validated();
        try {
            $data = $itemService->getItem($req->page ?? 1, $req->perPage ?? 100);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
        return response($data, 200);

    }
}
