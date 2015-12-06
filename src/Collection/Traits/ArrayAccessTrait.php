<?php
/**
 * File ArrayAccessTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection\Traits;

/**
 * Trait ArrayAccessTrait
 *
 * @property array|mixed[] $elements
 * @package Epfremme\Collection\Traits
 */
trait ArrayAccessTrait
{
    /**
     * Test if offset exists in collection
     *
     * @param $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->elements);
    }

    /**
     * Return collection element at $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            throw new \InvalidArgumentException(
                sprintf('Offset %s does not exist in collection', $offset)
            );
        }

        return $this->elements[$offset];
    }

    /**
     * Collection offset to set
     *
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->elements[$offset] = $value;
    }

    /**
     * Collection offset to unset
     *
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->elements[$offset]);
    }
}
