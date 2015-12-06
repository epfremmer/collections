<?php
/**
 * File ImmutableCollection.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection;

use Epfremme\Exception\ImmutableException;

/**
 * Class ImmutableCollection
 *
 * @package Epfremme\Collection
 */
class ImmutableCollection extends BaseCollection
{
    /**
     * Prevent removing elements
     *
     * @param mixed $offset
     * @throws ImmutableException
     */
    public function offsetUnset($offset)
    {
        throw new ImmutableException();
    }

    /**
     * Prevent setting elements
     *
     * @param mixed $offset
     * @param mixed $value
     * @throws ImmutableException
     */
    public function offsetSet($offset, $value)
    {
        throw new ImmutableException();
    }
}
