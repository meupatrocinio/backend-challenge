<?php

namespace App\Services;
use App\Services\Item\IItemService;
use Illuminate\Support\Facades\Http;

class ItemService implements IItemService {
    private $apiUrl = "http://sf-legacy-api.now.sh/items";
    public function getItem(Int $page, Int $perPage){
        $startIndex = $page * $perPage;

        if($startIndex <= 100){
            return array_slice($this->legacyApi(1)['data'], $startIndex - $perPage, $perPage);
        }
        $metadata = $this->legacyApi(1)['metadata'];

        $maxPage = ceil($metadata['totalItems'] / $metadata['perPage']);

        $firstPage = ceil($startIndex / $metadata['perPage']);
        $endPage = ceil($perPage / $metadata['perPage']) + $firstPage;
        $data = [];

        for($i = $firstPage; $i < $endPage ; $i++){

            if($i > $maxPage){
                break;
            }

            $data = array_merge($data, $this->legacyApi($i)['data']);
        }

        $start = $startIndex % $metadata['perPage'];
        return array_slice($data, $start, $perPage);
    }


    public function legacyApi(Int $page){
        try {
            $response = Http::get($this->apiUrl, ["page" => $page]);
        } catch (\Exception $e) {
            throw new \Exception("Não foi possível conectar a API");
        }

        return $response->json();
    }
}
