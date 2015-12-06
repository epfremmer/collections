<?php
/**
 * File ImmutableExceptionTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Tests\Exception;

use Epfremme\Exception\ImmutableException;

/**
 * Class ImmutableExceptionTest
 *
 * @package Epfremme\Tests\Exception
 */
class ImmutableExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test immutable exception
     *
     * @return void
     */
    public function testConstruct()
    {
        $exception = new ImmutableException();

        $this->assertInstanceOf(\Exception::class, $exception);
        $this->assertEquals(ImmutableException::MESSAGE, $exception->getMessage());
        $this->assertEquals(500, $exception->getCode());
    }
}
