<?php


namespace Angel\Fifty\Api\Data;

interface WinningNumberSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Winning_number list.
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface[]
     */
    public function getItems();

    /**
     * Set product_id list.
     * @param \Angel\Fifty\Api\Data\WinningNumberInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
