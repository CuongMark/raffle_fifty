<?php


namespace Angel\Fifty\Model\ResourceModel\WinningNumber;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Angel\Fifty\Model\WinningNumber::class,
            \Angel\Fifty\Model\ResourceModel\WinningNumber::class
        );
    }
}
