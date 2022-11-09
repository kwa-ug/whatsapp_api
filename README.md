# whatsapp_api
Send your whatsapp messages through us. 

Instatiate the object
```php
include 'src/WA_SMS.php';
```

Send just a text message
```php
	/*Send text message*/
	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX"));
	$sms_obj->set_message("This is the developer's face😂. Hope you find his file 📁");
	$sms_obj->send_message(WA_SMS::TEXT);
```
![Whatsapp Text Message Sample](https://github.com/kwa-ug/whatsapp_api/blob/main/img/text.png?raw=true)

Send whatsapp image
```php
	/*Send Image*/

	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX", "2567XXXXXX"));
	$sms_obj->set_image("https://avatars.githubusercontent.com/u/44467800?s=48&v=4", "This is the developer's face😂. Hope you find his file 📁");
	$sms_obj->send_message(WA_SMS::IMAGE);
```
![Whatsapp Image Message Sample](https://github.com/kwa-ug/whatsapp_api/blob/main/img/image.png?raw=true)

Send just the document
```php
	/*Send Document PDF / WORD / ETC*/

	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX"));
	$sms_obj->set_document("https://www.unhcr.org/handbooks/aap/documents/UNHCR_AAPTool_CT_Engaging%20with%20Communities%20via%20Whatsapp.pdf");
	$sms_obj->send_message(WA_SMS::DOCUMENT);
```
![Whatsapp Document Message Sample](https://github.com/kwa-ug/whatsapp_api/blob/main/img/pdf.png?raw=true)

Send a whatsapp button
```php
	/*Send Buttons*/

	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX"));
	$sms_obj->set_buttons("Would you prefer sms or whatsapp texts", array("Yes", "No"), "We shall be glad to get your response");
	$sms_obj->send_message(WA_SMS::BUTTONS);
```
![Whatsapp Button Message Sample](https://github.com/kwa-ug/whatsapp_api/blob/main/img/buttons.png?raw=true)

Send just the file
```php
	/*Send File*/

	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX"));
	$sms_obj->set_file("https://www.7-zip.org/a/7z920_extra.7z");
	$sms_obj->send_message(WA_SMS::FILE);
```
![Whatsapp File Message Sample](https://github.com/kwa-ug/whatsapp_api/blob/main/img/pdf.png?raw=true)