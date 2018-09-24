<?php


namespace Angel\Fifty\Model;

use Angel\Fifty\Model\ResourceModel\Ticket\CollectionFactory as TicketCollectionFactory;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Angel\Fifty\Api\TicketRepositoryInterface;
use Angel\Fifty\Api\Data\TicketInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Angel\Fifty\Api\Data\TicketSearchResultsInterfaceFactory;
use Magento\Store\Model\StoreManagerInterface;
use Angel\Fifty\Model\ResourceModel\Ticket as ResourceTicket;

class TicketRepository implements TicketRepositoryInterface
{

    protected $dataObjectProcessor;

    protected $searchResultsFactory;

    protected $dataTicketFactory;

    protected $resource;

    protected $ticketCollectionFactory;

    private $storeManager;
    protected $ticketFactory;

    protected $dataObjectHelper;


    /**
     * @param ResourceTicket $resource
     * @param TicketFactory $ticketFactory
     * @param TicketInterfaceFactory $dataTicketFactory
     * @param TicketCollectionFactory $ticketCollectionFactory
     * @param TicketSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceTicket $resource,
        TicketFactory $ticketFactory,
        TicketInterfaceFactory $dataTicketFactory,
        TicketCollectionFactory $ticketCollectionFactory,
        TicketSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->ticketFactory = $ticketFactory;
        $this->ticketCollectionFactory = $ticketCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataTicketFactory = $dataTicketFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Angel\Fifty\Api\Data\TicketInterface $ticket
    ) {
        /* if (empty($ticket->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $ticket->setStoreId($storeId);
        } */
        try {
            $this->resource->save($ticket);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the ticket: %1',
                $exception->getMessage()
            ));
        }
        return $ticket;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($ticketId)
    {
        $ticket = $this->ticketFactory->create();
        $this->resource->load($ticket, $ticketId);
        if (!$ticket->getId()) {
            throw new NoSuchEntityException(__('Ticket with id "%1" does not exist.', $ticketId));
        }
        return $ticket;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->ticketCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $fields[] = $filter->getField();
                $condition = $filter->getConditionType() ?: 'eq';
                $conditions[] = [$condition => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
        
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Angel\Fifty\Api\Data\TicketInterface $ticket
    ) {
        try {
            $this->resource->delete($ticket);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Ticket: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($ticketId)
    {
        return $this->delete($this->getById($ticketId));
    }
}
