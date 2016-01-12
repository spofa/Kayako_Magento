<?php
class GaugeInteractive_Kayako_IndexController extends Mage_Core_Controller_Front_Action
{
    public function submitTicketAction()
    {
        $data = $this->getRequest()->getPost();

        if ($data) {
            $translate = Mage::getSingleton('core/translate');
            /* @var $translate Mage_Core_Model_Translate */
            $translate->setTranslateInline(false);
            try {
                $postObject = new Varien_Object();
                $postObject->setData($data);
                $postObject->setData(
                    'ip', 
                    $_SERVER['REMOTE_ADDR']
                );

                $error = false;

                if (!Zend_Validate::is(trim($postObject['name']) , 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($postObject['subject']) , 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($postObject['comment']) , 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($postObject['email']), 'EmailAddress')) {
                    $error = true;
                }

                if ($error) {
                    throw new Exception();
                }

                if (Mage::helper('kayako')->isCaptchaEnabled()) {
                    $secretKey = Mage::helper('kayako')->getCaptchaSecretKey();
                    $responseString = $postObject['g-recaptcha-response'];
                    $userIp = $postObject['ip'];
                    $responseUrl = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $responseString . '&remoteip=' . $userIp;
                    $response = file_get_contents($responseUrl);
                    $jsonResponse = json_decode($response, true);

                    if ($jsonResponse['success'] != 1) {
                        throw new Exception();
                    }
                }

                $ticket = Mage::getModel('kayako/ticket');
                $createTicket = $ticket->createTicket($data);

                $translate->setTranslateInline(true);

                Mage::getSingleton('customer/session')->addSuccess(Mage::helper('kayako')->__('Your inquiry was submitted and will be responded to as soon as possible. Thank you for contacting us.'));
                $this->_redirect('contacts');
    
                return;
            } catch (Exception $e) {
                $translate->setTranslateInline(true);

                Mage::getSingleton('customer/session')->addError(Mage::helper('contacts')->__('Unable to submit your request. Please, try again later.'));
                $this->_redirect('contacts');
                return;
            }
        } else {
            $this->_redirect('contacts');
        }
    }
}