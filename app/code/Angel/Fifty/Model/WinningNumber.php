<?php


namespace Angel\Fifty\Model;

use Angel\Fifty\Api\Data\WinningNumberInterface;

class WinningNumber extends \Magento\Framework\Model\AbstractModel implements WinningNumberInterface
{

    protected $_eventPrefix = 'angel_fifty_winning_number';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Angel\Fifty\Model\ResourceModel\WinningNumber::class);
    }

    /**
     * Get winning_number_id
     * @return string
     */
    public function getWinningNumberId()
    {
        return $this->getData(self::WINNING_NUMBER_ID);
    }

    /**
     * Set winning_number_id
     * @param string $winningNumberId
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setWinningNumberId($winningNumberId)
    {
        return $this->setData(self::WINNING_NUMBER_ID, $winningNumberId);
    }

    /**
     * Get product_id
     * @return string
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Set product_id
     * @param string $productId
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
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
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setNumber($number)
    {
        return $this->setData(self::NUMBER, $number);
    }

    /**
     * Get price
     * @return string
     */
    public function getPrice()
    {
        return $this->getData(self::PRICE);
    }

    /**
     * Set price
     * @param string $price
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setPrice($price)
    {
        return $this->setData(self::PRICE, $price);
    }

    /**
     * Get currency
     * @return string
     */
    public function getCurrency()
    {
        return $this->getData(self::CURRENCY);
    }

    /**
     * Set currency
     * @param string $currency
     * @return \Angel\Fifty\Api\Data\WinningNumberInterface
     */
    public function setCurrency($currency)
    {
        return $this->setData(self::CURRENCY, $currency);
    }
}
