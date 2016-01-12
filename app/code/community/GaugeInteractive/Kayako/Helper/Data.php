<?php
/**
 * Kayako Data Helper
 *
 * @package    GaugeInteractive_Kayako
 * @author     GaugeInteractive <accounts@gaugeinteractive.com>
 */
class GaugeInteractive_Kayako_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * System configuration constants
     */
    const XML_PATH_CONTACTS_KAYAKO_ENABLE       = 'contacts/kayako/enabled';
    const XML_PATH_CONTACTS_KAYAKO_APIURL       = 'contacts/kayako/api_url';
    const XML_PATH_CONTACTS_KAYAKO_APIKEY       = 'contacts/kayako/api_key';
    const XML_PATH_CONTACTS_KAYAKO_SECRETKEY    = 'contacts/kayako/secret_key';

    const XML_PATH_KAYAKO_CATPCHA_ENABLED       = 'contacts/kayako/enabled_captcha';
    const XML_PATH_KAYAKO_CATPCHA_KEY           = 'contacts/kayako/captcha_key';
    const XML_PATH_KAYAKO_CATPCHA_SITE          = 'contacts/kayako/captcha_site';

    /**
     * @return bool
     */
    public function isKayakoEnabled()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_CONTACTS_KAYAKO_ENABLE);
    }

    /**
     * @return string
     */
    public function getKayakoApiUrl()
    {
        return Mage::getStoreConfig(self::XML_PATH_CONTACTS_KAYAKO_APIURL);
    }

    /**
     * @return string
     */
    public function getKayakoApiKey()
    {
        return Mage::getStoreConfig(self::XML_PATH_CONTACTS_KAYAKO_APIKEY);
    }

    /**
     * @return string
     */
    public function getKayakoSecretKey()
    {
        return Mage::getStoreConfig(self::XML_PATH_CONTACTS_KAYAKO_SECRETKEY);
    }

    /**
     * @return bool
     */
    public function isCaptchaEnabled()
    {
        return Mage::getStoreConfigFlag(self::XML_PATH_KAYAKO_CATPCHA_ENABLED);
    }

    /**
     * @return string
     */
    public function getCaptchaSecretKey()
    {
        return Mage::getStoreConfig(self::XML_PATH_KAYAKO_CATPCHA_KEY);
    }

    /**
     * @return string
     */
    public function getCaptchaSiteKey()
    {
        return Mage::getStoreConfig(self::XML_PATH_KAYAKO_CATPCHA_SITE);
    }
}
