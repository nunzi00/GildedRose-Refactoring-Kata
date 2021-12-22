<?php

namespace GildedRose;

/**
 *
 */
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
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * @return Item
     */
    abstract public function update(): Item;

    /**
     * @return void
     */
    protected function increaseQuality(): void
    {
        $this->item->quality++;
    }

    /**
     * @return void
     */
    protected function decreaseSellIn(): void
    {
        $this->item->sell_in--;
    }

    /**
     * @return void
     */
    protected function decreaseQuality(): void
    {
        $this->item->quality--;
    }

    abstract protected function lessThanMinSellIn(): void;
}
