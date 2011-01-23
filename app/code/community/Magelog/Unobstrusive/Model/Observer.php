<?php

/**
 * Observer
 *
 * @author jk
 */
class Magelog_Unobstrusive_Model_Observer {
    
    public function beforeBlockToHtml(Varien_Event_Observer $observer) {
        if ($observer->getBlock() instanceof Mage_Adminhtml_Block_Catalog_Product_Grid) {
            $this->addCustomColumns($observer->getBlock());
        }
    }

    protected function addCustomColumns(Mage_Adminhtml_Block_Catalog_Product_Grid $grid) {
        $store = Mage::app()->getStore((int) $grid->getRequest()->getParam('store', 0));
        $grid->addColumnAfter(
                'updated_at',
                array(
                    'header' => Mage::helper('magelog_grid')->__('Updated at'),
                    'width' => '150px',
                    'type'  => 'datetime',
                    'index' => 'updated_at'
                ),
                'name'
        );
    }
}
?>
