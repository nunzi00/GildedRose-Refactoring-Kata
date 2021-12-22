<?php

/**
 * SulfurasUpdater.php
 *
 * @copyright Conselleria do Medio Rural e do Mar
 * @package   app.
 */

namespace GildedRose;

/**
 *
 */
class SulfurasUpdater extends Updater
{

    /**
     * @inheritDoc
     */
    public function update(): Item
    {
        return $this->item;
    }

    /**
     * @return void
     */
    protected function lessThanMinSellIn(): void
    {
    }
}
