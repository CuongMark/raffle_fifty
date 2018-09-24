<?php


namespace Angel\Fifty\Model;

class VerifyTicketManagement implements Angel\Fifty\Api\VerifyTicketManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getVerifyTicket($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}
