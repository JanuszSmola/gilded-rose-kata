<?php

namespace App;

final class GildedRose
{
    public function updateQuality($vendorItem): void
    {
        $item = ItemFactory::create($vendorItem);
        $item->updateQuality();
        $item->updateSellIn();
        $item->updateAgedItemsQuality();
    }
}
