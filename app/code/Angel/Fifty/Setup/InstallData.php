<?php


namespace Angel\Fifty\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{

    private $eavSetupFactory;

    /**
     * Constructor
     *
     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'fifty_start',
            [
                'type' => 'datetime',
                'backend' => '',
                'frontend' => '',
                'label' => 'Start At',
                'input' => 'date',
                'class' => '',
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => null,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => \Angel\Fifty\Model\Fifty::TYPE_ID,
                'system' => 1,
                'group' => 'General',
                'option' => array('values' => array(""))
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'fifty_end',
            [
                'type' => 'datetime',
                'backend' => '',
                'frontend' => '',
                'label' => 'End At',
                'input' => 'date',
                'class' => '',
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => null,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => \Angel\Fifty\Model\Fifty::TYPE_ID,
                'system' => 1,
                'group' => 'General',
                'option' => array('values' => array(""))
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'fifty_start_pot',
            [
                'type' => 'decimal',
                'backend' => '',
                'frontend' => '',
                'label' => 'Start Pot',
                'input' => 'price',
                'class' => '',
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => null,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => \Angel\Fifty\Model\Fifty::TYPE_ID,
                'system' => 1,
                'group' => 'General',
                'option' => array('values' => array(""))
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'fifty_prize_percent',
            [
                'type' => 'varchar',
                'backend' => '',
                'frontend' => '',
                'label' => 'Prize Percent',
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => null,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => \Angel\Fifty\Model\Fifty::TYPE_ID,
                'system' => 1,
                'group' => 'General',
                'option' => array('values' => array(""))
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'fifty_status',
            [
                'type' => 'int',
                'backend' => '',
                'frontend' => '',
                'label' => '50 - 50 Status',
                'input' => 'select',
                'class' => '',
                'source' => \Angel\Fifty\Model\Product\Attribute\Source\FiftyStatus::class,
                'global' => 1,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null,
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => \Angel\Fifty\Model\Fifty::TYPE_ID,
                'system' => 1,
                'group' => 'General',
                'option' => []
            ]
        );

        //Your install script
    }
}
