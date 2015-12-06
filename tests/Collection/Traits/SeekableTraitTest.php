<?php
/**
 * File SeekableTraitTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Collection\Traits;

use SeekableIterator;
use Epfremme\Collection\Collection;

/**
 * Class SeekableTraitTest
 *
 * @package Epfremme\Tests\Collection\Traits
 */
class SeekableTraitTest extends \PHPUnit_Framework_TestCase
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
     * Verify collection implements ArrayAccess interface
     *
     * @return void
     */
    public function testImplementsInterface()
    {
        $this->assertInstanceOf(SeekableIterator::class, $this->collection);
    }

    /**
     * Test collection seek method
     *
     * @return void
     */
    public function testSeek()
    {
        $this->collection->seek('a');
        $this->assertEquals(4, $this->collection->current());

        $this->collection->seek(2);
        $this->assertEquals(3, $this->collection->current());
    }

    /**
     * Test invalid offset seek exception
     *
     * @expectedException \InvalidArgumentException
     * @return void
     */
    public function testSeekException()
    {
        $this->collection->seek('noop');
    }
}
