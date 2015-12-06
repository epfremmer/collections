<?php
/**
 * File BaseCollection.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection;

use \ArrayAccess;
use \Countable;
use \SeekableIterator;

use Epfremme\Collection\Traits\IterableTrait;
use Epfremme\Collection\Traits\ArrayAccessTrait;
use Epfremme\Collection\Traits\CountableTrait;
use Epfremme\Collection\Traits\SeekableTrait;
use Epfremme\Collection\Traits\SearchableTrait;

/**
 * Class BaseCollection
 *
 * @package Epfremme\Collection
 */
class BaseCollection implements SeekableIterator, Countable, ArrayAccess
{
    use IterableTrait;
    use CountableTrait;
    use SeekableTrait;
    use SearchableTrait;
    use ArrayAccessTrait;

    /**
     * @var array
     */
    protected $elements;

    /**
     * BaseCollection constructor
     *
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    /**
     * Return element at $key
     *
     * @param mixed $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->offsetGet($key);
    }

    /**
     * Return keys
     *
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->elements);
    }

    /**
     * Return values
     *
     * @return array
     */
    public function getValues()
    {
        return array_values($this->elements);
    }

    /**
     * Return elements array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->elements;
    }
}
