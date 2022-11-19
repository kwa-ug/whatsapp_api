<?php 

	/**
	 * Class  	:	WA_MSG Class
	 * Company	:	Kwaug Technologies
	 * Author 	:	Fredrick Wampamba
	 */
	class WA_MSG
	{

		public const DOCUMENT = "document";

		public const TEXT = "text";

		public const FILE = "file";

		public const IMAGE = "image";

		private $recipients;

		private $pub_key;

		private $document;

		private $message;

		private $file;

		private $image;

		private $country_code;
		/*
		* takes in public key and array of recipients ie array(2567XXXXXXX,2567XXXXXXX)
		*/
		function __construct($pub_key, $recipients, $country_code=256)
		{
			$this->pub_key = $pub_key;
			$this->recipients = $recipients;
			$this->country_code = $country_code;

			$this->format_phone_numbers($this->country_code);
		}
		/*
		*formats the phone numbers if they start with 0, contain spaces or hyphen
		*@param default_country_code
		*/
		public function format_phone_numbers(){
			$ph_num = array();
			foreach ($this->recipients as $phone) {
				$ph_num[] = $this->quick_format($phone);
			}
			$this->recipients = $ph_num;
		}

		public function quick_format($phone_number){

       		$phone_number = str_replace("+", "", $phone_number);
        	$phone_number = str_replace("-", "", $phone_number);
        	$phone_number = str_replace(" ", "", $phone_number);
        	$phone_number = str_replace("", "", $phone_number);
        	$phone_number = str_replace("_", "", $phone_number);
        	$phone_number = str_replace("(", "", $phone_number);
        	$phone_number = str_replace(")", "", $phone_number);
        	$phone_number = str_replace("[", "", $phone_number);
        	$phone_number = str_replace("]", "", $phone_number);
        	$phone_number = str_replace("{", "", $phone_number);
        	$phone_number = str_replace("}", "", $phone_number);

			$phone_number = preg_replace("/[^0-9]/", "", $phone_number);

			if (substr( $phone_number, 0, 1 ) === "0") {
			    $phone_number = "256".substr($phone_number, 1);
			}

        	return $phone_number;
		}

		public function set_message($message){
			$this->message = $message;
		}

		public function set_document($document){
			$this->document = $document;
		}

		public function set_file($file_url){
			$this->file = $file_url;
		}

		public function set_image($image_url, $caption){
			$this->image = $image_url;
			$this->message = $caption;
		}

		public function send_message($send_type){
			try {
				switch ($send_type) {
					case self::TEXT:
						$body = array("text"=>urlencode($this->message),
							"type"=>self::TEXT);
						break;
					
					case self::DOCUMENT:
						$body = array("document"=>urlencode($this->document),
							"type"=>self::DOCUMENT);
						break;
					
					case self::FILE:
						$body = array("file"=>urlencode($this->file),
							"type"=>self::FILE);
						break;
					
					case WA_MSG::IMAGE:
						$body = array("text"=>urlencode($this->message),
									 "file"=> $this->image,
									 "type"=>self::IMAGE
									);
						break;
					
					default:
						throw new Exception("Invalid Message format", 1);
						break;
				}

				$http_param = "";

				foreach ($body as $key => $value) {
					$http_param .= "&".$key."=".$value;
				}

				$send_url = "https://dev.kwaug.com/messaging/whatsapp.php?recipients=".json_encode($this->recipients)."&pub_key=".$this->pub_key.$http_param;
				
				// Initialize a CURL session.
				$ch = curl_init();
				 
				// Return Page contents.
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				 
				//grab URL and pass it to the variable.
				curl_setopt($ch, CURLOPT_URL, $send_url);
				 
				$result = curl_exec($ch);
				 
				return $result;

			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
	}
 ?>