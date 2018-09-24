<?php


namespace Angel\Fifty\Model;

use Angel\Fifty\Api\Data\WinningNumberInterfaceFactory;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Angel\Fifty\Api\WinningNumberRepositoryInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\DataObjectHelper;
use Angel\Fifty\Model\ResourceModel\WinningNumber\CollectionFactory as WinningNumberCollectionFactory;
use Angel\Fifty\Api\Data\WinningNumberSearchResultsInterfaceFactory;
use Magento\Store\Model\StoreManagerInterface;
use Angel\Fifty\Model\ResourceModel\WinningNumber as ResourceWinningNumber;

class WinningNumberRepository implements WinningNumberRepositoryInterface
{

    protected $searchResultsFactory;

    protected $dataWinningNumberFactory;

    protected $dataObjectProcessor;

    protected $resource;

    protected $winningNumberCollectionFactory;

    private $storeManager;
    protected $dataObjectHelper;

    protected $winningNumberFactory;


    /**
     * @param ResourceWinningNumber $resource
     * @param WinningNumberFactory $winningNumberFactory
     * @param WinningNumberInterfaceFactory $dataWinningNumberFactory
     * @param WinningNumberCollectionFactory $winningNumberCollectionFactory
     * @param WinningNumberSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceWinningNumber $resource,
        WinningNumberFactory $winningNumberFactory,
        WinningNumberInterfaceFactory $dataWinningNumberFactory,
        WinningNumberCollectionFactory $winningNumberCollectionFactory,
        WinningNumberSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->winningNumberFactory = $winningNumberFactory;
        $this->winningNumberCollectionFactory = $winningNumberCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataWinningNumberFactory = $dataWinningNumberFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Angel\Fifty\Api\Data\WinningNumberInterface $winningNumber
    ) {
        /* if (empty($winningNumber->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $winningNumber->setStoreId($storeId);
        } */
        try {
            $this->resource->save($winningNumber);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the winningNumber: %1',
                $exception->getMessage()
            ));
        }
        return $winningNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($winningNumberId)
    {
        $winningNumber = $this->winningNumberFactory->create();
        $this->resource->load($winningNumber, $winningNumberId);
        if (!$winningNumber->getId()) {
            throw new NoSuchEntityException(__('Winning_number with id "%1" does not exist.', $winningNumberId));
        }
        return $winningNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->winningNumberCollectionFactory->create();
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
        \Angel\Fifty\Api\Data\WinningNumberInterface $winningNumber
    ) {
        try {
            $this->resource->delete($winningNumber);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Winning_number: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($winningNumberId)
    {
        return $this->delete($this->getById($winningNumberId));
    }
}
