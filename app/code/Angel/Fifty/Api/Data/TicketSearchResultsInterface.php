<?php


namespace Angel\Fifty\Api\Data;

interface TicketSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Ticket list.
     * @return \Angel\Fifty\Api\Data\TicketInterface[]
     */
    public function getItems();

    /**
     * Set invoice_item_id list.
     * @param \Angel\Fifty\Api\Data\TicketInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
