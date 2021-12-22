<?php

/**
 * SulfurasUpdater.php
 *
 * @copyright Conselleria do Medio Rural e do Mar
 * @package   app.
 */

namespace GildedRose;

class SulfurasUpdater extends Updater
{
    public function update(): Item
    {
        return $this->item;
    }

    protected function lessThanMinSellIn(): void
    {
    }
}
