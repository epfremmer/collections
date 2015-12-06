<?php
/**
 * File CollectionTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Collection;

use Epfremme\Collection\Collection;

/**
 * Class CollectionTest
 *
 * @package Epfremme\Tests\Collection
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test collection construct
     *
     * @return void
     */
    public function testConstruct()
    {
        $collection = new Collection([1,2,3,4,5]);

        $this->assertAttributeInternalType('array', 'elements', $collection);
        $this->assertAttributeNotEmpty('elements', $collection);
        $this->assertAttributeCount(5, 'elements', $collection);
        $this->assertAttributeEquals([1,2,3,4,5], 'elements', $collection);
    }

    /**
     * Test empty collection construct
     *
     * @return void
     */
    public function testConstructEmpty()
    {
        $collection = new Collection();

        $this->assertAttributeInternalType('array', 'elements', $collection);
        $this->assertAttributeEmpty('elements', $collection);
        $this->assertAttributeCount(0, 'elements', $collection);
        $this->assertAttributeEquals([], 'elements', $collection);
    }

    /**
     * Test associative collection construct
     *
     * @return void
     */
    public function testConstructAssociative()
    {
        $collection = new Collection(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5]);

        $this->assertAttributeInternalType('array', 'elements', $collection);
        $this->assertAttributeNotEmpty('elements', $collection);
        $this->assertAttributeCount(5, 'elements', $collection);
        $this->assertAttributeEquals(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5], 'elements', $collection);
    }

    /**
     * Test collection is traversable
     *
     * @return void
     */
    public function testTraversable()
    {
        $collection = new Collection([1,2,3,4,5]);

        foreach ($collection as $element) {
            $this->assertAttributeContains($element, 'elements', $collection);
        }
    }
}
