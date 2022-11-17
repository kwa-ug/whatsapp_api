# whatsapp_api
![Whatsapp SMS API](https://github.com/kwa-ug/whatsapp_api/blob/main/img/whatsapp.png?raw=true)
Send your whatsapp messages through us. 

Instatiate the object
```php
require_once 'src/WA_MSG.php';
```

Send just a text message
```php
/*Send text message*/
$wa_msg = new WA_MSG("PUBLIC_KEY", array("07XXXXXXX"));
$wa_msg->set_message("This is the developer's face😂. Hope you find his file 📁");
$wa_msg->send_message(WA_MSG::TEXT);
```
![Whatsapp Text Message Sample](https://github.com/kwa-ug/whatsapp_api/blob/main/img/text.png?raw=true)

Send whatsapp image
```php
/*Send Image*/

$wa_msg = new WA_MSG("PUBLIC_KEY", array("07XXXXXXX", "2567XXXXXX"));
$wa_msg->set_image("https://avatars.githubusercontent.com/u/44467800?s=48&v=4",
					"This is the developer's face😂. Hope you find his file 📁");
$wa_msg->send_message(WA_MSG::IMAGE);
```
![Whatsapp Image Message Sample](https://github.com/kwa-ug/whatsapp_api/blob/main/img/image.png?raw=true)

Send just the document
```php
/*Send Document PDF / WORD / ETC*/

$wa_msg = new WA_MSG("PUBLIC_KEY", array("07XXXXXXX"));
$wa_msg->set_document("https://www.unhcr.org/handbooks/aap/documents/UNHCR_AAPTool_CT_Engaging%20with%20Communities%20via%20Whatsapp.pdf");
$wa_msg->send_message(WA_MSG::DOCUMENT);
```
![Whatsapp Document Message Sample](https://github.com/kwa-ug/whatsapp_api/blob/main/img/pdf.png?raw=true)

Send just the file
```php
/*Send File*/

$wa_msg = new WA_MSG("PUBLIC_KEY", array("07XXXXXXX"));
$wa_msg->set_file("https://www.7-zip.org/a/7z920_extra.7z");
$wa_msg->send_message(WA_MSG::FILE);
```
![Whatsapp File Message Sample](https://github.com/kwa-ug/whatsapp_api/blob/main/img/pdf.png?raw=true)

<a href="https://kwaug.com">Contact us here</a>
