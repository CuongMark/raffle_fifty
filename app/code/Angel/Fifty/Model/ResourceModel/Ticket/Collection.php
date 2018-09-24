<?php


namespace Angel\Fifty\Model\ResourceModel\Ticket;

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
            \Angel\Fifty\Model\Ticket::class,
            \Angel\Fifty\Model\ResourceModel\Ticket::class
        );
    }
}
