<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\web;

/**
<<<<<<< HEAD
 * SessionIterator implements an [[\Iterator|iterator]] for traversing session variables managed by [[Session]].
=======
 * SessionIterator implements an iterator for traversing session variables managed by [[Session]].
>>>>>>> official/master
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SessionIterator implements \Iterator
{
    /**
     * @var array list of keys in the map
     */
    private $_keys;
    /**
     * @var mixed current key
     */
    private $_key;


    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->_keys = array_keys($_SESSION);
    }

    /**
     * Rewinds internal array pointer.
<<<<<<< HEAD
     * This method is required by the interface [[\Iterator]].
=======
     * This method is required by the interface Iterator.
>>>>>>> official/master
     */
    public function rewind()
    {
        $this->_key = reset($this->_keys);
    }

    /**
     * Returns the key of the current array element.
<<<<<<< HEAD
     * This method is required by the interface [[\Iterator]].
=======
     * This method is required by the interface Iterator.
>>>>>>> official/master
     * @return mixed the key of the current array element
     */
    public function key()
    {
        return $this->_key;
    }

    /**
     * Returns the current array element.
<<<<<<< HEAD
     * This method is required by the interface [[\Iterator]].
=======
     * This method is required by the interface Iterator.
>>>>>>> official/master
     * @return mixed the current array element
     */
    public function current()
    {
        return isset($_SESSION[$this->_key]) ? $_SESSION[$this->_key] : null;
    }

    /**
     * Moves the internal pointer to the next array element.
<<<<<<< HEAD
     * This method is required by the interface [[\Iterator]].
=======
     * This method is required by the interface Iterator.
>>>>>>> official/master
     */
    public function next()
    {
        do {
            $this->_key = next($this->_keys);
        } while (!isset($_SESSION[$this->_key]) && $this->_key !== false);
    }

    /**
     * Returns whether there is an element at current position.
<<<<<<< HEAD
     * This method is required by the interface [[\Iterator]].
=======
     * This method is required by the interface Iterator.
>>>>>>> official/master
     * @return boolean
     */
    public function valid()
    {
        return $this->_key !== false;
    }
}
