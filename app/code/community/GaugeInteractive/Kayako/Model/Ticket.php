<?php
set_include_path(get_include_path() . PS . Mage::getBaseDir('lib') . DS . 'KayakoApi');
require_once('kyIncludes.php');

class GaugeInteractive_Kayako_Model_Ticket extends Varien_Object
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Initialize API connection
     */
    public function init()
    {
        $apiUrl = Mage::helper('kayako')->getKayakoApiUrl();
        $apiKey = Mage::helper('kayako')->getKayakoApiKey();
        $secretKey = Mage::helper('kayako')->getKayakoSecretKey();

        $_config = new kyConfig($apiUrl, $apiKey, $secretKey);
        $_config->setIsStandardURLType(true);
        $_config->setDebugEnabled(true);
        kyConfig::set($_config);
    }

    public function createTicket($data)
    {
        $default_status_id = kyTicketStatus::getAll()->filterByTitle('New')->first()->getId();
        $default_priority_id = kyTicketPriority::getAll()->filterByTitle('Normal')->first()->getId();
        $default_type_id = $data['issue'];
        kyTicket::setDefaults($default_status_id, $default_priority_id, $default_type_id);

        $general_department = kyDepartment::getAll()
            ->filterByTitle('Customer Service')
            ->filterByModule(kyDepartment::MODULE_TICKETS)
            ->first();

        $ticket = kyTicket::createNewAuto(
                $general_department,
                $data['name'],
                $data['email'],
                $data['comment'],
                $data['subject'])
            ->create();

        return true;
    }

    public function retrieveIssues()
    {
        $ticket_types = kyTicketType::getAll();

        foreach ($ticket_types as $ticket_type) {
            $issuesArray[] = array(
                'value' => $ticket_type->getId(),
                'label' => $ticket_type->getTitle()
            );
        }

        return $issuesArray;
    }
}
