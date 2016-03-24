#KayakoMagento
###Description
This is a simple Kayako/Magento contact form integration. It replaces the default Magento contact form when enabled. Google reCATPCHA is also integrated with the form, https://www.google.com/recaptcha/intro/index.html.

The following form fields are editable by the user:
* Name
* Email
* Subject
* Issue
* Comment

The following fields are set automatically but could easily be added and pulled from Kayako as well:
* Status - Default value set to New - Kayako/Model/Ticket.php line 32
* Priority - Default value set to Normal - Kayako/Model/Ticket.php line 33
* Department - Default value set to Customer Service - Kayako/Model/Ticket.php line 38

###System Configurations
System > Configuration > General > Contacts > Kayako
* Enable Kayako - Enables the form
* API URL - Obtained from Kayako
* API Key - Obtained from Kayako
* Secret Key - Obtained from Kayako
* Issues - Issues are pulled from Kayako and can be selected
* Enable reCAPTCHA - Enables form reCAPTCHA for contact from
* reCAPTCHA Secret Key - Obtained from https://www.google.com/recaptcha/intro/index.html
* reCAPTCHA Site Key - Obtained from https://www.google.com/recaptcha/intro/index.html
