<?php
/**
 * File ImmutableCollectionTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Collection;

use Epfremme\Collection\ImmutableCollection;

/**
 * Class ImmutableCollectionTest
 *
 * @package Epfremme\Tests\Collection
 */
class ImmutableCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test invalid offset seek exception
     *
     * @expectedException \Epfremme\Exception\ImmutableException
     * @return void
     */
    public function testOffsetUnset()
    {
        $collection = new ImmutableCollection([1,2,3]);

        $collection->offsetUnset(0);
    }

    /**
     * Test immutable collection exception
     *
     * @expectedException \Epfremme\Exception\ImmutableException
     * @return void
     */
    public function testOffsetSet()
    {
        $collection = new ImmutableCollection([1,2,3]);

        $collection->offsetSet(0, 7);
    }
}
