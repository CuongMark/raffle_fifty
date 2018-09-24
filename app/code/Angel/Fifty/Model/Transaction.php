<?php


namespace Angel\Fifty\Model;

use Angel\Fifty\Api\Data\TransactionInterface;

class Transaction extends \Magento\Framework\Model\AbstractModel implements TransactionInterface
{

    protected $_eventPrefix = 'angel_fifty_transaction';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Angel\Fifty\Model\ResourceModel\Transaction::class);
    }

    /**
     * Get transaction_id
     * @return string
     */
    public function getTransactionId()
    {
        return $this->getData(self::TRANSACTION_ID);
    }

    /**
     * Set transaction_id
     * @param string $transactionId
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setTransactionId($transactionId)
    {
        return $this->setData(self::TRANSACTION_ID, $transactionId);
    }

    /**
     * Get ticket_id
     * @return string
     */
    public function getTicketId()
    {
        return $this->getData(self::TICKET_ID);
    }

    /**
     * Set ticket_id
     * @param string $ticketId
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setTicketId($ticketId)
    {
        return $this->setData(self::TICKET_ID, $ticketId);
    }

    /**
     * Get created_at
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get value
     * @return string
     */
    public function getValue()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * Set value
     * @param string $value
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setValue($value)
    {
        return $this->setData(self::VALUE, $value);
    }

    /**
     * Get number
     * @return string
     */
    public function getNumber()
    {
        return $this->getData(self::NUMBER);
    }

    /**
     * Set number
     * @param string $number
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setNumber($number)
    {
        return $this->setData(self::NUMBER, $number);
    }
}
