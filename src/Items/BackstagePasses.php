<?php

namespace App\Items;

class BackstagePasses extends Item
{
    public const NAME = 'Backstage passes to a TAFKAL80ETC concert';
    protected $qualityModifier = 1;

    public function updateQuality(): void
    {
        if ($this->getItem()->sell_in < 6) {
            $this->qualityModifier = 3;
        } elseif ($this->getItem()->sell_in < 11) {
            $this->qualityModifier = 2;
        }

        parent::updateQuality();
    }

    public function updateAgedItemsQuality(): void
    {
        if ($this->getItem()->sell_in < 0) {
            $this->getItem()->quality = 0;
        }
    }
}
