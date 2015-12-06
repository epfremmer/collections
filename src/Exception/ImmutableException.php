<?php
/**
 * File ImmutableCollection.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace Epfremme\Exception;

/**
 * Class ImmutableException
 *
 * @package Epfremme\Exception
 */
class ImmutableException extends \Exception
{
    const MESSAGE = 'Cannot modify immutable class';

    /**
     * ImmutableException constructor
     */
    public function __construct()
    {
        parent::__construct(self::MESSAGE, 500);
    }
}
