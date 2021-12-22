<?php

/**
 * BackStagePassesUpdater.php
 *
 * @copyright Conselleria do Medio Rural e do Mar
 * @package   app.
 */

namespace GildedRose;

/**
 *
 */
class BackStagePassesUpdater extends Updater
{

    /**
     * @inheritDoc
     */
    public function update(): Item
    {
        if ($this->item->quality < Updater::MAX_QUALITY) {
            $this->increaseQuality();
        }

        if (($this->item->sell_in < Updater::HIGH_STEPIN_SELLIN) && $this->item->quality < Updater::MAX_QUALITY) {
            $this->increaseQuality();
        }
        if (($this->item->sell_in < Updater::MID_STEPIN_SELLIN) && $this->item->quality < Updater::MAX_QUALITY) {
            $this->increaseQuality();
        }
        $this->decreaseSellIn();
        return $this->item;
    }

    /**
     * @return void
     */
    protected function lessThanMinSellin(): void
    {
        if ($this->item->sell_in < Updater::LOW_STEPIN_SELLIN) {
            $this->decreaseQuality();
        }
    }
}
