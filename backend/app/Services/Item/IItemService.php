<?php


namespace App\Services\Item;


interface IItemService{

    public function getItem(Int $page, Int $perPage);

    public function legacyApi(Int $page);
}
