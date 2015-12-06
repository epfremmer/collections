<?php
/**
 * File CountableTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Collection\Traits;

use Countable;
use Epfremme\Collection\BaseCollection;

/**
 * Class CountableTraitTest
 *
 * @package Epfremme\Tests\Collection\Traits
 */
class CountableTraitTest extends \PHPUnit_Framework_TestCase
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
        $this->assertInstanceOf(Countable::class, $this->collection);
    }

    /**
     * Test collection count method
     *
     * @return void
     */
    public function testCount()
    {
        $this->assertEquals(5, $this->collection->count());
    }
}
