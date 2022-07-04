<?php

namespace App\Items;

use App\Item as VendorItem;

class Item
{
    private $item;
    protected const MIN_QUALITY = 0;
    protected const MAX_QUALITY = 50;
    protected $qualityModifier = -1;
    protected $sellInModifier = -1;
    protected $agedQualityModifier = -1;

    public function __construct(VendorItem $item)
    {
        $this->item = $item;
    }

    public function getItem(): VendorItem
    {
        return $this->item;
    }

    public function updateQuality(): void
    {
        if ($this->getItem()->quality > self::MIN_QUALITY && $this->getItem()->quality < self::MAX_QUALITY) {
            $this->getItem()->quality += $this->getQualityModifier();
            $this->getItem()->quality = max(
                min($this->getItem()->quality, self::MAX_QUALITY),
                self::MIN_QUALITY
            );
        }
    }

    public function updateSellIn(): void
    {
        $this->getItem()->sell_in += $this->getSellInModifier();
    }

    public function updateAgedItemsQuality(): void
    {
        if ($this->getItem()->sell_in < 0) {
            if ($this->getItem()->quality > self::MIN_QUALITY && $this->getItem()->quality < self::MAX_QUALITY) {
                $this->getItem()->quality += $this->getAgedQualityModifier();
            }
        }
    }

    protected function getQualityModifier(): int
    {
        return $this->qualityModifier;
    }

    protected function getSellInModifier(): int
    {
        return $this->sellInModifier;
    }

    protected function getAgedQualityModifier(): int
    {
        return $this->agedQualityModifier;
    }
}
