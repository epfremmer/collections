<?php
/**
 * File IterableTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection\Traits;

/**
 * Trait IterableTrait
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
     * Return the fist element
     *
     * @return mixed
     */
    public function first()
    {
        return reset($this->elements);
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
     * @return mixed
     */
    public function next()
    {
        return next($this->elements);
    }

    /**
     * Move elements pointer backward
     *
     * @reutrn void
     */
    public function prev()
    {
        return prev($this->elements);
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
     * Reset pointer and return the first element
     *
     * @return mixed
     */
    public function reset()
    {
        return reset($this->elements);
    }

    /**
     * Rewind the collection pointer
     *
     * @return void
     */
    public function rewind()
    {
        $this->reset();
    }
}
