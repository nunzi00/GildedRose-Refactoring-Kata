<?php

namespace GildedRose;

abstract class Updater
{
    public const MAX_QUALITY = 50;

    public const MIN_QUALITY = 0;

    public const HIGH_STEPIN_SELLIN = 11;

    public const MID_STEPIN_SELLIN = 6;

    public const LOW_STEPIN_SELLIN = 0;

    public const AGED_BRIE = 'Aged Brie';

    public const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';

    public const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';

    /**
     * @var Item
     */
    protected $item;

    /**
     * @param Item $item
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    abstract public function update(): Item;

    protected function increaseQuality(): void
    {
        if ($this->item->quality < self::MAX_QUALITY) {
            ++$this->item->quality;
        }
    }

    protected function decreaseSellIn(): void
    {
        --$this->item->sell_in;
    }

    protected function decreaseQuality(): void
    {
        if ($this->item->quality > self::MIN_QUALITY) {
            --$this->item->quality;
        }

    }

    abstract protected function lessThanMinSellIn(): void;
}
