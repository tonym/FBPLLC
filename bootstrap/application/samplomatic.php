<?php
include(dirname(__FILE__) . '/userinput.php');

class Samplomatic extends UserInput {

	public $data = array();
	protected $_input = array();

	public function __construct() {

		$this->data['action'] = NULL;
		if($_GET['action']) {
			foreach($_GET as $key => $value) {
				$this->_input[$key] = 'mixed';
				$this->data['clean_input'] = $this->get_request_values($this->_input, 'get');
			}
		}
		if($_POST['action']) {
			foreach($_POST as $key => $value) {
				$this->_input[$key] = 'mixed';
				$this->data['clean_input'] = $this->get_request_values($this->_input, 'post');
			}
		}

	}

	public function create_ajax_response() {

		$ret = '<strong>Server says you submitted the following form fields:</strong>';

		foreach($this->data['clean_input'] as $key => $value) {
			$ret .= '<br /><strong>' . $key . '</strong> - ' . $value;
		}
		return $ret;

	}
}
?>
