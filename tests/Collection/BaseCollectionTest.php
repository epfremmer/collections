<?php
/**
 * File BaseCollectionTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Collection;

use Epfremme\Collection\BaseCollection;

/**
 * Class BaseCollectionTest
 *
 * @package Epfremme\Tests\Collection
 */
class BaseCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test collection construct
     *
     * @return void
     */
    public function testConstruct()
    {
        $collection = new BaseCollection([1,2,3,4,5]);

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
        $collection = new BaseCollection();

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
        $collection = new BaseCollection(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5]);

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
        $collection = new BaseCollection([1,2,3,4,5]);

        foreach ($collection as $element) {
            $this->assertAttributeContains($element, 'elements', $collection);
        }
    }

    /**
     * Test get element
     *
     * @return void
     */
    public function testGet()
    {
        $collection = new BaseCollection([1, 2, 3,'a' => 4, 'b' => 5]);

        $this->assertEquals(2, $collection->get(1));
        $this->assertEquals(4, $collection->get('a'));
    }

    /**
     * Test getting collection keys
     *
     * @return void
     */
    public function testGetKeys()
    {
        $collection = new BaseCollection([1, 2, 3,'a' => 4, 'b' => 5]);

        $this->assertEquals([0,1,2,'a','b'], $collection->getKeys());
    }

    /**
     * Test getting collection values
     *
     * @return void
     */
    public function testGetValues()
    {
        $collection = new BaseCollection([1, 2, 3,'a' => 4, 'b' => 5]);

        $this->assertEquals([1,2,3,4,5], $collection->getValues());
    }

    /**
     * Test converting back to array
     *
     * @return void
     */
    public function testToArray()
    {
        $collection = new BaseCollection([1, 2, 3,'a' => 4, 'b' => 5]);

        $this->assertEquals([1, 2, 3,'a' => 4, 'b' => 5], $collection->toArray());
    }
}
