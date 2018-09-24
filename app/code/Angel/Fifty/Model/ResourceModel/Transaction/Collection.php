<?php


namespace Angel\Fifty\Model\ResourceModel\Transaction;

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
            \Angel\Fifty\Model\Transaction::class,
            \Angel\Fifty\Model\ResourceModel\Transaction::class
        );
    }
}
