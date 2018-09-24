<?php


namespace Angel\Fifty\Api\Data;

interface WinningNumberInterface
{

    const PRODUCT_ID = 'product_id';
    const WINNING_NUMBER_ID = 'winning_number_id';
    const PRICE = 'price';
    const CURRENCY = 'currency';
    const NUMBER = 'number';

    /**
     * Get winning_number_id
     * @return string|null
     */
    public function getWinningNumberId();

    /**
     * Set winning_number_id
     * @param string $winningNumberId
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setWinningNumberId($winningNumberId);

    /**
     * Get product_id
     * @return string|null
     */
    public function getProductId();

    /**
     * Set product_id
     * @param string $productId
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setProductId($productId);

    /**
     * Get number
     * @return string|null
     */
    public function getNumber();

    /**
     * Set number
     * @param string $number
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setNumber($number);

    /**
     * Get price
     * @return string|null
     */
    public function getPrice();

    /**
     * Set price
     * @param string $price
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setPrice($price);

    /**
     * Get currency
     * @return string|null
     */
    public function getCurrency();

    /**
     * Set currency
     * @param string $currency
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setCurrency($currency);
}
