<?php


namespace Angel\Fifty\Api\Data;

interface TransactionSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get transaction list.
     * @return \Angel\Fifty\Api\Data\TransactionInterface[]
     */
    public function getItems();

    /**
     * Set ticket_id list.
     * @param \Angel\Fifty\Api\Data\TransactionInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
