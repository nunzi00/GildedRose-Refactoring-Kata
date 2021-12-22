<?php

/**
 * AgedBrieUpdater.php
 *
 * @copyright Conselleria do Medio Rural e do Mar
 * @package   app.
 */

namespace GildedRose;

class AgedBrieUpdater extends Updater
{
    public function update(): Item
    {
        if ($this->item->quality < self::MAX_QUALITY) {
            $this->increaseQuality();
        }
        $this->decreaseSellIn();
        return $this->item;
    }

    protected function lessThanMinSellin(): void
    {
        if ($this->item->sell_in < Updater::LOW_STEPIN_SELLIN) {
            $this->decreaseQuality();
        }
    }
}
