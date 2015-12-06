<?php
/**
 * File Collection.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection;

use \Closure;

use Epfremme\Collection\Traits\ClearableTrait;

/**
 * Class Collection
 *
 * @package Epfremme\Collection
 */
class Collection extends BaseCollection
{
    use ClearableTrait;

    /**
     * Push new element to collection
     *
     * @param mixed $element
     * @return int
     */
    public function push($element)
    {
        return array_push($this->elements, $element);
    }

    /**
     * Pop last element from collection
     *
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->elements);
    }

    /**
     * Shift first element from collection
     *
     * @return mixed
     */
    public function shift()
    {
        return array_shift($this->elements);
    }

    /**
     * Unshift element to collection
     *
     * @param mixed $element
     * @return int
     */
    public function unshift($element)
    {
        return array_unshift($this->elements, $element);
    }

    /**
     * Return new collection sliced from current elements
     *
     * @param int $offset
     * @param int $length
     * @return static
     */
    public function slice($offset = 0, $length = 1)
    {
        return new static(array_slice($this->elements, $offset, $length, true));
    }

    /**
     * Splice and return new collection from current elements
     *
     * @return static
     */
    public function splice()
    {
        return new static(array_splice($this->elements, $offset, $length));
    }

    /**
     * Add element to collection
     *
     * @param $element
     * @return void
     */
    public function add($element)
    {
        $this->push($element);
    }

    /**
     * Remove element from collection
     *
     * @param $element
     * @return bool
     */
    public function remove($element)
    {
        if (!$this->contains($element)) {
            return false;
        }

        $this->offsetUnset($this->indexOf($element));

        return true;
    }

    /**
     * Map function on against collection elements
     *
     * @param Closure $fn
     * @return static
     */
    public function map(Closure $fn)
    {
        return new static(array_map($fn, $this->elements));
    }

    /**
     * Reduce collection to a single value
     *
     * @param Closure $fn
     * @param null $initial
     * @return mixed
     */
    public function reduce(Closure $fn, $initial = null)
    {
        return array_reduce($this->elements, $fn, $initial);
    }

    /**
     * Sort collection by user defined function
     *
     * @param Closure $fn
     * @return bool
     */
    public function sort(Closure $fn)
    {
        return usort($this->elements, $fn);
    }

    /**
     * Sort collection by use defined function and
     * maintain element indicies
     *
     * @param Closure $fn
     * @return bool
     */
    public function asort(Closure $fn)
    {
        return uasort($this->elements, $fn);
    }

    /**
     * CAll function on each element of collection
     *
     * @param Closure $fn
     * @return bool
     */
    public function each(Closure $fn)
    {
        foreach ($this->elements as $key => $element) {
            if ( !$fn($key, $element)) {
                return false;
            }
        }

        return true;
    }
}
