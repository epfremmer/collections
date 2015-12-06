<?php
/**
 * File IterableTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Collection\Traits;

use Iterator;
use Epfremme\Collection\BaseCollection;

/**
 * Class IterableTraitTest
 *
 * @package Epfremme\Tests\Collection\Traits
 */
class IterableTraitTest extends \PHPUnit_Framework_TestCase
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
        $this->assertInstanceOf(Iterator::class, $this->collection);
    }

    /**
     * Test collection key position
     *
     * @return void
     */
    public function testKey()
    {
        $this->collection->seek(2);
        $this->assertEquals(2, $this->collection->key());

        $this->collection->seek('a');
        $this->assertEquals('a', $this->collection->key());
    }

    /**
     * Test collection current position
     *
     * @return void
     */
    public function testCurrent()
    {
        $this->collection->seek(2);
        $this->assertEquals(3, $this->collection->current());

        $this->collection->seek('a');
        $this->assertEquals(4, $this->collection->current());
    }

    /**
     * Test collection first position
     *
     * @depends testKey
     * @depends testCurrent
     * @return void
     */
    public function testFirst()
    {
        $this->collection->seek(2);
        $this->collection->first();
        $this->assertEquals(0, $this->collection->key());
        $this->assertEquals(1, $this->collection->current());
    }

    /**
     * Test collection last position
     *
     * @depends testKey
     * @depends testCurrent
     * @return void
     */
    public function testLast()
    {
        $this->collection->last();
        $this->assertEquals('b', $this->collection->key());
        $this->assertEquals(5, $this->collection->current());
    }

    /**
     * Test collection next position
     *
     * @depends testKey
     * @depends testCurrent
     * @return void
     */
    public function testNext()
    {
        $this->collection->next();
        $this->assertEquals(1, $this->collection->key());
        $this->assertEquals(2, $this->collection->current());

        $this->collection->last();
        $this->collection->next();
        $this->assertNull($this->collection->key());
        $this->assertFalse($this->collection->current());
    }

    /**
     * Test collection previous position
     *
     * @depends testKey
     * @depends testCurrent
     * @depends testNext
     * @return void
     */
    public function testPrev()
    {
        $this->collection->next();
        $this->collection->prev();
        $this->assertEquals(0, $this->collection->key());
        $this->assertEquals(1, $this->collection->current());

        $this->collection->prev();
        $this->assertNull($this->collection->key());
        $this->assertFalse($this->collection->current());
    }

    /**
     * Test collection valid
     *
     * @depends testNext
     * @depends testLast
     * @return void
     */
    public function testValid()
    {
        $this->assertTrue($this->collection->valid());

        $this->collection->last();
        $this->assertTrue($this->collection->valid());

        $this->collection->next();
        $this->assertFalse($this->collection->valid());
    }

    /**
     * Test collection rewind
     *
     * @depends testKey
     * @depends testCurrent
     * @return void
     */
    public function testRewind()
    {
        $this->collection->last();
        $this->assertEquals('b', $this->collection->key());
        $this->assertEquals(5, $this->collection->current());

        $this->collection->rewind();
        $this->assertEquals(0, $this->collection->key());
        $this->assertEquals(1, $this->collection->current());
    }
}
