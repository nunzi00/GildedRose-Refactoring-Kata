<?php

/**
 * DefaultUpdater.php
 *
 * @copyright Conselleria do Medio Rural e do Mar
 * @package   app.
 */

namespace GildedRose;

/**
 *
 */
class DefaultUpdater extends Updater
{
    /**
     * @inheritDoc
     */
    public function update(): Item
    {
        if ($this->item->quality > Updater::MIN_QUALITY) {
            $this->decreaseQuality();
        }
        $this->decreaseSellIn();
        return $this->item;
    }

    /**
     * @return void
     */
    protected function lessThanMinSellin(): void
    {
        if (($this->item->sell_in < Updater::LOW_STEPIN_SELLIN) && $this->item->quality > Updater::MIN_QUALITY) {
            $this->decreaseQuality();
        }
    }
}
