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
     * Add element to collection
     *
     * @param $element
     * @return $this
     */
    public function add($element)
    {
        $this->push($element);

        return $this;
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
     * Set new value to collection at position
     *
     * @param mixed $key
     * @param mixed $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->offsetSet($key, $value);

        return $this;
    }

    /**
     * Return new collection sliced from current elements
     *
     * @param int $offset
     * @param int $length
     * @return static
     */
    public function slice($offset = 0, $length = 0)
    {
        return new static(array_slice($this->elements, $offset, $length, true));
    }

    /**
     * Splice and return new collection from current elements
     *
     * @param int $offset
     * @param int $length
     * @param array|mixed $replacement
     * @return static
     */
    public function splice($offset = 0, $length = 0, $replacement = [])
    {
        return new static(array_splice($this->elements, $offset, $length, $replacement));
    }

    /**
     * Map function on against collection elements
     *
     * @param Closure $fn
     * @return static
     */
    public function map(Closure $fn)
    {
        return new static(array_map($fn, $this->getValues(), $this->getKeys()));
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
     * maintain element keys/indicies
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
            if ($fn($element, $key) === false) {
                return false;
            }
        }

        return true;
    }
}
