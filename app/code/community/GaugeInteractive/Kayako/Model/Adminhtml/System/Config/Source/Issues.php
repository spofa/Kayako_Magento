<?php
class GaugeInteractive_Kayako_Model_Adminhtml_System_Config_Source_Issues
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return Mage::getModel('kayako/ticket')->retrieveIssues();
    }
}
