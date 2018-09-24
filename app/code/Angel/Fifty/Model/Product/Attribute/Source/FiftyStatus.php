<?php


namespace Angel\Fifty\Model\Product\Attribute\Source;

class FiftyStatus extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    const PENDING = 0;
    const PROCESSING = 1;
    const FINISHED = 2;
    /**
     * @var \Magento\Eav\Model\ResourceModel\Entity\AttributeFactory
     */
    protected $_eavAttrEntity;

    public function __construct(
        \Magento\Eav\Model\ResourceModel\Entity\AttributeFactory $attributeFactory
    ){
        $this->_eavAttrEntity = $attributeFactory;
    }

    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions(){
        $this->_options = [
            ['label' => __('Pending'), 'value' => self::PENDING],
            ['label' => __('Processing'), 'value' => self::PROCESSING],
            ['label' => __('Finished'), 'value' => self::FINISHED],
        ];
        return $this->_options;
    }

    /**
     * @return array
     */
    public function getFlatColumns()
    {
        $attributeCode = $this->getAttribute()->getAttributeCode();
        return [
            $attributeCode => [
                'unsigned' => false,
                'default' => null,
                'extra' => null,
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 255,
                'nullable' => true,
                'comment' => $attributeCode . ' column',
            ]
        ];
    }

    /**
     * @return array
     */
    public function getFlatIndexes()
    {
        $indexes = [];
        
        $index = 'IDX_' . strtoupper($this->getAttribute()->getAttributeCode());
        $indexes[$index] = ['type' => 'index', 'fields' => [$this->getAttribute()->getAttributeCode()]];
        
        return $indexes;
    }

    /**
     * @param int $store
     * @return \Magento\Framework\DB\Select|null
     */
    public function getFlatUpdateSelect($store)
    {
        return $this->_eavAttrEntity->create()->getFlatUpdateSelect($this->getAttribute(), $store);
    }
}
