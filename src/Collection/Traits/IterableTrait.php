<?php
/**
 * File IterableTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection\Traits;

/**
 * Class IterableTrait
 *
 * @property array|mixed[] $elements
 * @package Epfremme\Collection\Traits
 */
trait IterableTrait
{
    /**
     * Return the current element
     *
     * @return mixed
     */
    public function current()
    {
        return current($this->elements);
    }

    /**
     * Advance and return last element
     *
     * @return mixed
     */
    public function last()
    {
        return end($this->elements);
    }

    /**
     * Move elements pointer forward
     *
     * @return void
     */
    public function next()
    {
        next($this->elements);
    }

    /**
     * Move elements pointer backward
     *
     * @reutrn void
     */
    public function prev()
    {
        prev($this->elements);
    }

    /**
     * Return the key of the current element
     *
     * @return mixed
     */
    public function key()
    {
        return key($this->elements);
    }

    /**
     * Checks if current position is valid
     *
     * @return bool
     */
    public function valid()
    {
        return key($this->elements) !== null;
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind()
    {
        reset($this->elements);
    }
}
