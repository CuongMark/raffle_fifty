<?php


namespace Angel\Fifty\Api\Data;

interface TicketInterface
{

    const START = 'start';
    const END = 'end';
    const SERIAL = 'serial';
    const STATUS = 'status';
    const INVOICE_ITEM_ID = 'invoice_item_id';
    const TICKET_ID = 'ticket_id';

    /**
     * Get ticket_id
     * @return string|null
     */
    public function getTicketId();

    /**
     * Set ticket_id
     * @param string $ticketId
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setTicketId($ticketId);

    /**
     * Get invoice_item_id
     * @return string|null
     */
    public function getInvoiceItemId();

    /**
     * Set invoice_item_id
     * @param string $invoiceItemId
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setInvoiceItemId($invoiceItemId);

    /**
     * Get start
     * @return string|null
     */
    public function getStart();

    /**
     * Set start
     * @param string $start
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setStart($start);

    /**
     * Get end
     * @return string|null
     */
    public function getEnd();

    /**
     * Set end
     * @param string $end
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setEnd($end);

    /**
     * Get serial
     * @return string|null
     */
    public function getSerial();

    /**
     * Set serial
     * @param string $serial
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setSerial($serial);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Angel\Fifty\Api\Data\TicketInterface
     */
    public function setStatus($status);
}
