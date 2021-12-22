<?php

/**
 * DefaultUpdater.php
 *
 * @copyright Conselleria do Medio Rural e do Mar
 * @package   app.
 */

namespace GildedRose;

class DefaultUpdater extends Updater
{
    public function update(): Item
    {
        $this->decreaseSellIn();
        $this->decreaseQuality();
        return $this->item;
    }

    protected function lessThanMinSellin(): void
    {
        if ($this->item->sell_in < Updater::LOW_STEPIN_SELLIN) {
            $this->decreaseQuality();
        }
    }
}
