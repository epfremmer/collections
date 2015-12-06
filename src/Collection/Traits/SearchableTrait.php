<?php
/**
 * File SearchableTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection\Traits;

use Closure;

/**
 * Trait SearchableTrait
 *
 * @property array|mixed[] $elements
 * @package Epfremme\Collection\Traits
 */
trait SearchableTrait
{
    /**
     * Return index of element
     *
     * @param mixed $element
     * @return mixed
     */
    public function indexOf($element)
    {
        return array_search($element, $this->elements, true);
    }

    /**
     * Test if element in collection
     *
     * @param mixed $element
     * @return bool
     */
    public function contains($element)
    {
        return in_array($element, $this->elements, true);
    }

    /**
     * Test if key exists in collection
     *
     * @param mixed $key
     * @return bool
     */
    public function keyExists($key)
    {
        return array_key_exists($key, $this->elements);
    }

    /**
     * Return new collection with elements filtered by function
     *
     * @param Closure $fn
     * @return static
     */
    public function filter(Closure $fn)
    {
        return new static(array_filter($this->elements, $fn, ARRAY_FILTER_USE_BOTH));
    }
}
