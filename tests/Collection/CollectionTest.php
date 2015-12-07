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
     * @var Collection
     */
    private $collection;

    /**
     * {@inheritdoc}
     */
    public function setup()
    {
        parent::setup();

        $this->collection = new Collection([1,2,3]);
    }

    /**
     * Test pushing element onto collection
     *
     * @return void
     */
    public function testPush()
    {
        $this->collection->push(4);

        $this->assertCount(4, $this->collection);
        $this->assertTrue($this->collection->contains(4));
        $this->assertEquals(4, $this->collection->get(3));
    }

    /**
     * Test popping element from collection
     *
     * @return void
     */
    public function testPop()
    {
        $element = $this->collection->pop();

        $this->assertCount(2, $this->collection);
        $this->assertFalse($this->collection->contains(3));
        $this->assertEquals(3, $element);
    }

    /**
     * Test shifting element from collection
     *
     * @return void
     */
    public function testShift()
    {
        $element = $this->collection->shift();

        $this->assertCount(2, $this->collection);
        $this->assertFalse($this->collection->contains(1));
        $this->assertEquals(1, $element);
    }

    /**
     * Test un-shifting element onto collection
     *
     * @return void
     */
    public function testUnshift()
    {
        $this->collection->unshift(0);

        $this->assertCount(4, $this->collection);
        $this->assertTrue($this->collection->contains(0));
        $this->assertEquals(0, $this->collection->get(0));
    }

    /**
     * Test adding element to collection
     *
     * @return void
     */
    public function testAdd()
    {
        $collection = $this->collection->add(7);

        $this->assertCount(4, $this->collection);
        $this->assertEquals(7, $this->collection->get(3));
        $this->assertSame($this->collection, $collection);
    }

    /**
     * Test removing element from array
     *
     * @return void
     */
    public function testRemove()
    {
        $success = $this->collection->remove(3);

        $this->assertTrue($success);
        $this->assertCount(2, $this->collection);
        $this->assertFalse($this->collection->contains(3));
    }

    /**
     * Test removing key not in collection
     *
     * @return void
     */
    public function testRemoveUnsetElement()
    {
        $success = $this->collection->remove(7);

        $this->assertFalse($success);
    }

    /**
     * Test setting value at key
     *
     * @return void
     */
    public function testSet()
    {
        $collection = $this->collection->set(1, 7);

        $this->assertEquals(7, $this->collection->get(1));
        $this->assertSame($this->collection, $collection);

        $this->collection->set(6, 9);
        $this->assertEquals(9, $this->collection->get(6));
    }

    /**
     * Test creating slice of collection
     *
     * @return void
     */
    public function testSlice()
    {
        $slice = $this->collection->slice(1, 1);

        $this->assertInstanceOf(Collection::class, $slice);
        $this->assertAttributeEquals([1 => 2], 'elements', $slice);
        $this->assertAttributeEquals([1, 2, 3], 'elements', $this->collection);
    }

    /**
     * Test slice without args returns empty collection
     *
     * @return void
     */
    public function testSliceWithoutArgs()
    {
        $slice = $this->collection->slice();

        $this->assertInstanceOf(Collection::class, $slice);
        $this->assertAttributeEquals([], 'elements', $slice);
        $this->assertAttributeEquals([1, 2, 3], 'elements', $this->collection);
    }

    /**
     * Test splicing elements from collection
     *
     * @return void
     */
    public function testSplice()
    {
        $slice = $this->collection->splice(1, 1);

        $this->assertInstanceOf(Collection::class, $slice);
        $this->assertAttributeEquals([2], 'elements', $slice);
        $this->assertAttributeEquals([1, 3], 'elements', $this->collection);
    }

    /**
     * Test splicing elements from collection
     *
     * @return void
     */
    public function testSpliceWithoutArgs()
    {
        $slice = $this->collection->splice();

        $this->assertInstanceOf(Collection::class, $slice);
        $this->assertAttributeEquals([], 'elements', $slice);
        $this->assertAttributeEquals([1, 2, 3], 'elements', $this->collection);
    }

    /**
     * Test splicing single element into collection
     *
     * @return void
     */
    public function testSpliceWithScalarReplacement()
    {
        $slice = $this->collection->splice(1, 1, 7);

        $this->assertInstanceOf(Collection::class, $slice);
        $this->assertAttributeEquals([2], 'elements', $slice);
        $this->assertAttributeEquals([1, 7, 3], 'elements', $this->collection);
    }

    /**
     * Test splicing array of elements into collection
     *
     * @return void
     */
    public function testSpliceWithArrayOfReplacements()
    {
        $slice = $this->collection->splice(1, 1, [7,8,9]);

        $this->assertInstanceOf(Collection::class, $slice);
        $this->assertAttributeEquals([2], 'elements', $slice);
        $this->assertAttributeEquals([1, 7, 8, 9, 3], 'elements', $this->collection);
    }

    /**
     * Test mapping callback to new collection
     *
     * @return void
     */
    public function testMap()
    {
        $collection = $this->collection->map(function($value, $key) {
            return 2 * $value;
        });

        $this->assertAttributeEquals([2,4,6], 'elements', $collection);
        $this->assertAttributeEquals([1,2,3], 'elements', $this->collection);
    }

    /**
     * Test collection reduction method
     *
     * @return void
     */
    public function testReduce()
    {
        $result = $this->collection->reduce(function($carry, $value) {
            return $carry + $value;
        });

        $this->assertEquals(6, $result);
    }

    /**
     * Test sorting collection by callback
     *
     * @return void
     */
    public function testSort()
    {
        $this->collection->sort(function($a, $b) {
            if ($a === $b) {
                return 0;
            }

            return $a > $b ? -1 : 1;
        });

        $this->assertAttributeEquals([3,2,1], 'elements', $this->collection);
    }

    /**
     * Test sorting collection by callback and retaining element keys/indicies
     *
     * @return void
     */
    public function testAsort()
    {
        $this->collection->asort(function($a, $b) {
            if ($a === $b) {
                return 0;
            }

            return $a > $b ? -1 : 1;
        });

        $this->assertAttributeEquals([2 => 3, 1 => 2, 0 => 1], 'elements', $this->collection);
    }

    /**
     * Test applying a callback to each element of the collection
     *
     * @reutrn void
     */
    public function testEach()
    {
        $success = $this->collection->each(function($value, $key) {
            $this->assertTrue($this->collection->keyExists($key));
            $this->assertEquals($value, $this->collection->get($key));

            $this->collection->set($key, $value * 2);
        });

        $this->assertTrue($success);
        $this->assertAttributeEquals([2,4,6], 'elements', $this->collection);
    }

    /**
     * Test each method breaks when receiving false from callback
     *
     * @return void
     */
    public function testEachWithEarlyReturn()
    {
        $success = $this->collection->each(function($key, $value) {
            return $key === 1;
        });

        $this->assertFalse($success);
    }
}
