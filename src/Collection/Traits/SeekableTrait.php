<?php
/**
 * File SeekableTrait.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Collection\Traits;

/**
 * Trait SeekableTrait
 *
 * @property array|mixed[] $elements
 * @package Epfremme\Collection\Traits
 * @uses \SeekableIterator
 */
trait SeekableTrait
{
    /**
     * Seek to a position within the collection
     *
     * @param $position
     * @return void
     */
    public function seek($position)
    {
        if (!array_key_exists($position, $this->elements)) {
            throw new \InvalidArgumentException(
                sprintf('Position %s does not exist in collection', $position)
            );
        }

        reset($this->elements);

        while (key($this->elements) !== $position) {
            next($this->elements);
        }
    }
}
