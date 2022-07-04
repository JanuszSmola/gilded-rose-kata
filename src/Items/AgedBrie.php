<?php

namespace App\Items;

class AgedBrie extends Item
{
    public const NAME = 'Aged Brie';
    protected $qualityModifier = 1;
    protected $agedQualityModifier = 1;

    public function updateQuality(): void
    {
        $this->getItem()->quality += $this->getQualityModifier();
        $this->getItem()->quality = min($this->getItem()->quality, self::MAX_QUALITY);
    }
}
