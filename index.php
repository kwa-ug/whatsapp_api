<?php 
	include 'src/WA_SMS.php';

	/*Send text message*/

	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX"));
	$sms_obj->set_message("This is the developer's face😂. Hope you find his file 📁");
	$sms_obj->send_message(WA_SMS::TEXT);

	/*Send Image*/

	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX", "2567XXXXXX"));
	$sms_obj->set_image("https://avatars.githubusercontent.com/u/44467800?s=48&v=4",
				 "This is the developer's face😂. Hope you find his file 📁");
	$sms_obj->send_message(WA_SMS::IMAGE);

	/*Send Document PDF / WORD / ETC*/

	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX"));
	$sms_obj->set_document("https://www.unhcr.org/handbooks/aap/documents/UNHCR_AAPTool_CT_Engaging%20with%20Communities%20via%20Whatsapp.pdf");
	$sms_obj->send_message(WA_SMS::DOCUMENT);

	/*Send File*/

	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX"));
	$sms_obj->set_file("https://www.7-zip.org/a/7z920_extra.7z");
	$sms_obj->send_message(WA_SMS::FILE);

	/*Send Buttons*/

	$sms_obj = new WA_SMS("PUBLIC_KEY", array("07XXXXXXX"));
	$sms_obj->set_buttons("Would you prefer sms or whatsapp texts"
							, array("Yes", "No"),
							"We shall be glad to get your response"
						);
	$sms_obj->send_message(WA_SMS::BUTTONS);
 ?>