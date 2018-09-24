<?php


namespace Angel\Fifty\Model\ResourceModel;

class WinningNumber extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('angel_fifty_winning_number', 'winning_number_id');
    }
}
