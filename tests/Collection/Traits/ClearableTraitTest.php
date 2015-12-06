<?php
/**
 * File ClearableTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Collection\Traits;

use Epfremme\Collection\Collection;

/**
 * Class ClearableTraitTest
 *
 * @package Epfremme\Tests\Collection\Traits
 */
class ClearableTraitTest extends \PHPUnit_Framework_TestCase
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
     * Test emptying collection
     *
     * @return void
     */
    public function testClear()
    {
        $this->collection->clear();

        $this->assertAttributeEmpty('elements', $this->collection);
        $this->assertAttributeCount(0, 'elements', $this->collection);
    }

    /**
     * Test collection empty method
     *
     * @return void
     */
    public function testIsEmpty()
    {
        $this->assertFalse($this->collection->isEmpty());
        $this->collection->clear();
        $this->assertTrue($this->collection->isEmpty());
    }
}
