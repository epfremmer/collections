<?php
/**
 * File ImmutableCollection.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection;

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
     */
    public function offsetUnset($offset) {}

    /**
     * Prevent setting elements
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) {}
}
