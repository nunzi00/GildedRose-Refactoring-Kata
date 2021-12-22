<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testRun()
    {
        $items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            // this conjured item does not work properly yet
            new Item('Conjured Mana Cake', 3, 6),
        ];

        $gildedRose = new GildedRose($items);
        $this->assertSame(5, $gildedRose->items[2]->sell_in);
        $this->assertSame(7, $gildedRose->items[2]->quality);
        return $gildedRose;
    }

    /**
     * @depends testRun
     */
    public function testDayOneDefaultUpdatePass(GildedRose $gildedRose)
    {
        $gildedRose->updateQuality();
        $this->assertSame(6, $gildedRose->items[2]->quality);
        $this->assertSame(4, $gildedRose->items[2]->sell_in);
        return $gildedRose;
    }

    /**
     * @depends testRun
     */
    public function testDayOneFailDefaultUpdateQuality(GildedRose $gildedRose)
    {
        $gildedRose->updateQuality();
        $this->assertNotEquals(6, $gildedRose->items[0]->quality);
    }

    /**
     * @depends testDayOneDefaultUpdatePass
     */
    public function testTwoOneDefaultUpdatePass(GildedRose $gildedRose)
    {
        $gildedRose->updateQuality();

        $this->assertSame(3, $gildedRose->items[2]->sell_in);
        $this->assertSame(5, $gildedRose->items[2]->quality);
    }

}
