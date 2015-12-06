<?php
/**
 * File ArrayAccessTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Collection\Traits;

use ArrayAccess;
use Epfremme\Collection\BaseCollection;

/**
 * Class ArrayAccessTraitTest
 *
 * @package Epfremme\Tests\Collection\Traits
 */
class ArrayAccessTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BaseCollection
     */
    private $collection;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->collection = new BaseCollection([1, 2, 3, 'a' => 4, 'b' => 5]);
    }

    /**
     * Verify collection implements ArrayAccess interface
     *
     * @return void
     */
    public function testImplementsInterface()
    {
        $this->assertInstanceOf(ArrayAccess::class, $this->collection);
    }

    /**
     * Test offset exists method
     *
     * @reutrn void
     */
    public function testOffsetExists()
    {
        $this->assertTrue($this->collection->offsetExists(0));
        $this->assertTrue($this->collection->offsetExists('a'));
    }

    /**
     * Test offset get returns correct value
     *
     * @return void
     */
    public function testOffsetGet()
    {
        $this->assertEquals(1, $this->collection->offsetGet(0));
        $this->assertEquals(4, $this->collection->offsetGet('a'));
    }

    /**
     * Test invalid offset get exception
     *
     * @expectedException \InvalidArgumentException
     * @return void
     */
    public function testOffsetGetException()
    {
        $this->collection->offsetGet('noop');
    }

    /**
     * Test offset set sets both new & existing values
     *
     * @return void
     */
    public function testOffsetSet()
    {
        $this->collection->offsetSet('new', 7);
        $this->assertEquals(7, $this->collection->offsetGet('new'));

        $this->assertEquals(2, $this->collection->offsetGet(1));
        $this->collection->offsetSet(1, 9);
        $this->assertEquals(9, $this->collection->offsetGet(1));
    }

    /**
     * Test offset unset method removes elements from collection
     *
     * @return void
     */
    public function testOffsetUnset()
    {
        $this->assertTrue($this->collection->offsetExists(2));
        $this->assertAttributeCount(5, 'elements', $this->collection);
        $this->collection->offsetUnset(2);
        $this->assertFalse($this->collection->offsetExists(2));
        $this->assertAttributeCount(4, 'elements', $this->collection);
    }
}
