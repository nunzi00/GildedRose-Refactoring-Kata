<?php

declare(strict_types=1);

namespace GildedRose;

/**
 *
 */
final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    /**
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return void
     */
    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case Updater::AGED_BRIE:
                    $updater = new AgedBrieUpdater($item);
                    break;
                case Updater::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT:
                    $updater = new BackStagePassesUpdater($item);
                    break;
                case Updater::SULFURAS_HAND_OF_RAGNAROS:
                    $updater = new SulfurasUpdater($item);
                    break;
                default:
                    $updater = new DefaultUpdater($item);
                    break;
            }
            $updater->update();
        }
    }
}
