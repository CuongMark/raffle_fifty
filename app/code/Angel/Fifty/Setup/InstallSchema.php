<?php


namespace Angel\Fifty\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $table_angel_fifty_ticket = $setup->getConnection()->newTable($setup->getTable('angel_fifty_ticket'));

        $table_angel_fifty_ticket->addColumn(
            'ticket_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Ticket ID'
        );

        $table_angel_fifty_ticket->addColumn(
            'invoice_item_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => false],
            'Invoice Item Id'
        );

        $table_angel_fifty_ticket->addColumn(
            'start',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'start'
        );

        $table_angel_fifty_ticket->addColumn(
            'end',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'end'
        );

        $table_angel_fifty_ticket->addColumn(
            'serial',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'serial'
        );

        $table_angel_fifty_ticket->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            [],
            'status'
        );

        $table_angel_fifty_ticket->addForeignKey(
            $setup->getFkName('angel_fifty_ticket', 'invoice_item_id', 'sales_invoice_item', 'entity_id'),
            'invoice_item_id',
            $setup->getTable('sales_invoice_item'),
            'entity_id',
            Table::ACTION_CASCADE
        );

        $table_angel_fifty_winning_number = $setup->getConnection()->newTable($setup->getTable('angel_fifty_winning_number'));

        $table_angel_fifty_winning_number->addColumn(
            'winning_number_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Winning Number ID'
        );

        $table_angel_fifty_winning_number->addColumn(
            'product_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => false],
            'Product Id'
        );

        $table_angel_fifty_winning_number->addColumn(
            'number',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
            'number'
        );

        $table_angel_fifty_winning_number->addColumn(
            'price',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '12,4',
            ['nullable' => false],
            'price'
        );

        $table_angel_fifty_winning_number->addColumn(
            'currency',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'currency'
        );

        $table_angel_fifty_winning_number->addForeignKey(
            $setup->getFkName('angel_fifty_winning_number', 'product_id', 'catalog_product_entity', 'entity_id'),
            'product_id',
            $setup->getTable('catalog_product_entity'),
            'entity_id',
            Table::ACTION_CASCADE
        );

        $table_angel_fifty_transaction = $setup->getConnection()->newTable($setup->getTable('angel_fifty_transaction'));

        $table_angel_fifty_transaction->addColumn(
            'transaction_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,],
            'Transaction ID'
        );

        $table_angel_fifty_transaction->addColumn(
            'ticket_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => false],
            'Ticket ID'
        );

        $table_angel_fifty_transaction->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            [],
            'created_at'
        );

        $table_angel_fifty_transaction->addColumn(
            'value',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            '12,4',
            ['nullable' => false],
            'value'
        );

        $table_angel_fifty_transaction->addColumn(
            'number',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['default' => 'currency'],
            'transaction'
        );

        $table_angel_fifty_transaction->addForeignKey(
            $setup->getFkName('angel_fifty_transaction', 'ticket_id', 'angel_fifty_ticket', 'ticket_id'),
            'ticket_id',
            $setup->getTable('angel_fifty_ticket'),
            'ticket_id',
            Table::ACTION_CASCADE
        );

        //Your install script
        $setup->getConnection()->createTable($table_angel_fifty_ticket);

        $setup->getConnection()->createTable($table_angel_fifty_transaction);

        $setup->getConnection()->createTable($table_angel_fifty_winning_number);
    }
}
