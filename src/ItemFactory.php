<?php

namespace App;

use App\Items\AgedBrie;
use App\Items\BackstagePasses;
use App\Items\Item;
use App\Items\Sulfuras;

class ItemFactory
{
    private const AVAILABLE_ITEMS = [
        AgedBrie::NAME => AgedBrie::class,
        BackstagePasses::NAME => BackstagePasses::class,
        Sulfuras::NAME => Sulfuras::class,
    ];

    public static function create($item): Item
    {
        if (isset(self::AVAILABLE_ITEMS[$item->name])) {
            $itemClass = self::AVAILABLE_ITEMS[$item->name];
            return new $itemClass($item);
        } else {
            return new Item($item);
        }
    }
}
