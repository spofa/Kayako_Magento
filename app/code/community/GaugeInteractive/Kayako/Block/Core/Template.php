<?php
class GaugeInteractive_Kayako_Block_Core_Template extends Mage_Core_Block_Template
{
    public function getSelections()
    {
        $values = Mage::getModel('kayako/ticket')->retrieveIssues();

        return $values;
    }
}
