<?php
/**
 * File ClearableTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection\Traits;

/**
 * Trait ClearableTrait
 *
 * @property array|mixed[] $elements
 * @package Epfremme\Collection\Traits
 */
trait ClearableTrait
{
    /**
     * Empty the collection
     *
     * @return void
     */
    public function clear()
    {
        $this->elements = [];
    }

    /**
     * Test if collection is empty
     *
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->elements);
    }
}
