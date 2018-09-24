<?php


namespace Angel\Fifty\Model;

use Angel\Fifty\Api\Data\TicketInterface;

class Ticket extends \Magento\Framework\Model\AbstractModel implements TicketInterface
{

    protected $_eventPrefix = 'angel_fifty_ticket';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Angel\Fifty\Model\ResourceModel\Ticket::class);
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
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setTicketId($ticketId)
    {
        return $this->setData(self::TICKET_ID, $ticketId);
    }

    /**
     * Get invoice_item_id
     * @return string
     */
    public function getInvoiceItemId()
    {
        return $this->getData(self::INVOICE_ITEM_ID);
    }

    /**
     * Set invoice_item_id
     * @param string $invoiceItemId
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setInvoiceItemId($invoiceItemId)
    {
        return $this->setData(self::INVOICE_ITEM_ID, $invoiceItemId);
    }

    /**
     * Get start
     * @return string
     */
    public function getStart()
    {
        return $this->getData(self::START);
    }

    /**
     * Set start
     * @param string $start
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setStart($start)
    {
        return $this->setData(self::START, $start);
    }

    /**
     * Get end
     * @return string
     */
    public function getEnd()
    {
        return $this->getData(self::END);
    }

    /**
     * Set end
     * @param string $end
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setEnd($end)
    {
        return $this->setData(self::END, $end);
    }

    /**
     * Get serial
     * @return string
     */
    public function getSerial()
    {
        return $this->getData(self::SERIAL);
    }

    /**
     * Set serial
     * @param string $serial
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setSerial($serial)
    {
        return $this->setData(self::SERIAL, $serial);
    }

    /**
     * Get status
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
