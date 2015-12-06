<?php
/**
 * File SearchableTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Collection\Traits;

use Epfremme\Collection\Collection;

/**
 * Class SearchableTraitTest
 *
 * @package Epfremme\Tests\Collection\Traits
 */
class SearchableTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Collection
     */
    private $collection;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->collection = new Collection([1, 2, 3, 'a' => 4, 'b' => 5]);
    }

    /**
     * Test getting index of an element
     *
     * @return void
     */
    public function testIndexOf()
    {
        $this->assertEquals(1, $this->collection->indexOf(2));
        $this->assertEquals('a', $this->collection->indexOf(4));
        $this->assertFalse($this->collection->indexOf(7));
    }

    /**
     * Test validating collection elements exist
     *
     * @return void
     */
    public function testContains()
    {
        $this->assertTrue($this->collection->contains(3));
        $this->assertFalse($this->collection->contains(7));
    }

    /**
     * Test validating collection key exists
     *
     * @return void
     */
    public function testKeyExists()
    {
        $this->assertTrue($this->collection->keyExists(2));
        $this->assertFalse($this->collection->keyExists('noop'));
    }

    /**
     * Test filtering collection elements
     *
     * @return void
     */
    public function testFilter()
    {
        $filtered = $this->collection->filter(function($value, $key) {
            return is_string($key);
        });

        $this->assertAttributeNotEmpty('elements', $filtered);
        $this->assertAttributeCount(2, 'elements', $filtered);
    }
}
