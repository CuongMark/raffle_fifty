<?php


namespace Angel\Fifty\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface WinningNumberRepositoryInterface
{

    /**
     * Save Winning_number
     * @param \Angel\Fifty\Api\Data\WinningNumberInterface $winningNumber
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Angel\Fifty\Api\Data\WinningNumberInterface $winningNumber
    );

    /**
     * Retrieve Winning_number
     * @param string $winningNumberId
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($winningNumberId);

    /**
     * Retrieve Winning_number matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Angel\Fifty\Api\Data\WinningNumberSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Winning_number
     * @param \Angel\Fifty\Api\Data\WinningNumberInterface $winningNumber
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Angel\Fifty\Api\Data\WinningNumberInterface $winningNumber
    );

    /**
     * Delete Winning_number by ID
     * @param string $winningNumberId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($winningNumberId);
}
