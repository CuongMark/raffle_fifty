<?php


namespace Angel\Fifty\Api\Data;

interface TransactionInterface
{

    const TICKET_ID = 'ticket_id';
    const TRANSACTION_ID = 'transaction_id';
    const CREATED_AT = 'created_at';
    const NUMBER = 'number';
    const VALUE = 'value';

    /**
     * Get transaction_id
     * @return string|null
     */
    public function getTransactionId();

    /**
     * Set transaction_id
     * @param string $transactionId
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setTransactionId($transactionId);

    /**
     * Get ticket_id
     * @return string|null
     */
    public function getTicketId();

    /**
     * Set ticket_id
     * @param string $ticketId
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setTicketId($ticketId);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get value
     * @return string|null
     */
    public function getValue();

    /**
     * Set value
     * @param string $value
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setValue($value);

    /**
     * Get number
     * @return string|null
     */
    public function getNumber();

    /**
     * Set number
     * @param string $number
     * @return \Angel\Fifty\Api\Data\TransactionInterface
     */
    public function setNumber($number);
}
