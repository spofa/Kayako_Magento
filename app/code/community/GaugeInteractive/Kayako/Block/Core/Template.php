<?php
class GaugeInteractive_Kayako_Block_Core_Template extends Mage_Core_Block_Template
{
    public function getSelections()
    {
        $issues = Mage::helper('kayako')->getKayakoIssues();
        $issuesArray = explode(',', $issues);
        $values = Mage::getModel('kayako/ticket')->retrieveIssues();

        foreach($values as $key => $value) {
            if (!in_array($value['value'], $issuesArray)) {
                unset($values[$key]);
            }
        }

        return $values;
    }
}
