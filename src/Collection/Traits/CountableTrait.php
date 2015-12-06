<?php
/**
 * File CountableTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection\Traits;

/**
 * Trait CountableTrait
 *
 * @property array|mixed[] $elements
 * @package Epfremme\Collection\Traits
 */
trait CountableTrait
{
    /**
     * Return count of elements in collection
     *
     * @return int
     */
    public function count()
    {
        return count($this->elements);
    }
}
