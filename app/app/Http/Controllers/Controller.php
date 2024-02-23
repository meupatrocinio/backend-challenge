<?php

namespace App\Http\Controllers;

use App\Services\LegacyApiHandler;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function listItems(Request $request, LegacyApiHandler $legacyApi)
    {
        $page = ($request->query('page')) ? $request->query('page') : 1;
        $perPage = ($request->query('perPage')) ? $request->query('perPage') : 100;

        $items = $legacyApi->allItems( (($page * $perPage) / 100));

        $items = array_chunk($items, $perPage);

        return response()->json([
            'payload' => [
                'items' => $items[$page-1]
            ],
        ]);
    }
}
