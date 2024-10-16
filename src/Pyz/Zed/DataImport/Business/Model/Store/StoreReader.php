<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Store;

use Spryker\Zed\DataImport\Business\Model\DataReader\DataReaderInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class StoreReader implements DataReaderInterface
{
    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @var \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface
     */
    protected $dataSet;

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     */
    public function __construct(DataSetInterface $dataSet)
    {
        $this->dataSet = $dataSet;
    }

    /**
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     *
     * @since 5.0.0
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     *
     * @since 5.0.0
     *
     * @return mixed scalar on success, or null on failure.
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     *
     * @since 5.0.0
     *
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    #[\ReturnTypeWillChange]
    public function valid(): bool
    {
        return isset($this->dataSet[$this->position]);
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     *
     * @since 5.0.0
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface
     */
    public function current(): DataSetInterface
    {
        return $this->dataSet;
    }
}
