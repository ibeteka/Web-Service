<?php

/**
 * Use the SoapClient and API
 * @author Ibrahim Tounkara (PHP/Symfony Backend Developer)
 */


class SoapService extends AbstractWebService{
	

	private $wsdl;
	
	
	public function getWsdl() {
		return $this->wsdl;
	}
	public function setWsdl($wsdl) {
		$this->wsdl = $wsdl;
	}


	

	
	/**
	 * @param string $wsdl
	 * @param string $name (api's name)
	 */
	public function __construct($wsdl,$name){
		
		$configFile = $_SERVER['CONFIG_FILE'];
	
		if (file_exists($configFile)){
			$content = parse_ini_file($configFile, true);
			
			if (isset($content['WEB_SERVICE'])){
				$options = $this->getParameters($content['WEB_SERVICE'][$name]);
				$this->setWsdl($wsdl);
				$this->setUrl($options['location']);
				$this->setOptions($options);
			}
		}
		
		
	}

	


	 /**
	  * @see AbstractWebService::invokeWebService()
	  */
	public function invokeWebService(){
		
		try{
			$api = new SoapClient($this->getWsdl(),$this->getOptions());
		}
		catch(SoapFault $sf){
			echo $sf->getCode()." ".$sf->getMessage()." ".$sf->getTraceAsString();
			echo $api->__getLastResponse();
			echo $api->__getLastRequest();
		}
		
		return $api;
		
	}
	
	
	
	
	
	/**
	 * @see AbstractWebService::getParameters()
	 */
	protected function getParameters($file){
		$content = parse_ini_file($_SERVER["DOCUMENT_ROOT"] .$_SERVER['API_ROOT'].'/config/'.$file, true);
		return $content['PARAMETERS'];
	}
	
	
}
