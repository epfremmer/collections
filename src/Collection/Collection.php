<?php
/**
 * File Collection.php
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

/**
 * Class Collection
 *
 * @package Epfremme\Collection
 */
class Collection implements SeekableIterator, Countable, ArrayAccess
{
    use IterableTrait;
    use SeekableTrait;
    use CountableTrait;
    use ArrayAccessTrait;

    /**
     * @var array
     */
    protected $elements;

    /**
     * Collection constructor
     *
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }
}
