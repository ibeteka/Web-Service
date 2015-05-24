/**
 * Handle the using of any webservices type
 * @author xan_tounkara
 */

abstract class AbstractWebService {
	
	private $url;
	private $options;
	
	
	protected function getUrl() {
		return $this->url;
	}
	
	protected function setUrl($url) {
		$this->url = $url;
	}
	
	protected function setOptions($options){
		$this->options = $options;
	}
	
	public function getOptions() {
		return $this->options;
	}
	
	
	
	
	/**
	 * Invoke a Webservice
	 */
	abstract public function invokeWebService();
	
	
	
	/**
	 * Retrieve the parameters from a given file
	 * @param string $file (filename)
	 */
	abstract protected function getParameters($file);
	
	
	
}
