<?php
/**
 * userinput.php
 *
 * @author tmaxymillian
 * @version $Id: userinput.php 1852 2007-10-16 23:03:50Z tmaxymillian $
 * @package FB
 * @filesource
 */

/**
 * UserInput
 *
 * The UserInput class identifies expected user
 * input values, checks those values for validity,
 * and sanitizes them against cross site scripting
 * attacks.
 * @package Attensa
 */
class UserInput {
	/**
	 * Select identified elements from the
	 * $_POST or $_GET array
	 *
	 * Input an associative array as the argument.
	 * Each key corrosponds to a key in the
	 * $_POST or $_GET array, and each value is the
	 * data type expected.
	 *
	 * Returns an associative array.  Each key is
	 * an expected input (the name of the html
	 * input element), and each value is the cleaned
	 * input value.
	 *
	 * <code>
	 * HTML form
	 * <form name="details" id="details" method="post" action="some.php">
	 * <input type="text" maxlength="40" name="details_name" />
	 * <input type="text" maxlength="40" name="details_email" />
	 * </form>
	 *
	 * PHP script
	 * $expected_input = array('details_name'=>'string', 'details_email'=>'string');
	 * $input = new UserInput();
	 * $trusted_input = $input->get_request_values($expected_input);
	 * </code>
	 * @param map $expected_input An associative array.
	 * The key is the expected key in the $_POST or $_GET array.
	 * The value is the expected type, which can be any type accepted
	 * by {@link clean_request_value function clean_request_value}
	 * @param string $collection Form submission method ('post', 'get' or 'request')
	 * @returns map
	 */
	protected function get_request_values($expected_input, $collection='') {
		$ret = array();
		$coll = array();
		switch($collection) {
			case 'post':
				$coll = $_POST;
				break;
			case 'get':
				$coll = $_GET;
				break;
			default:
				$coll = $_REQUEST;
		}
		foreach(array_keys($expected_input) as $key) {
			if(array_key_exists($key, $coll)) {
				try {
					$ret[$key] = $this->clean_request_value($coll[$key], $expected_input[$key]);
				}
				catch(Exception $e) {
					exit($e->getMessage());
				}
			}
		}
		return $ret;
	}

	/**
	 * Check and clean a user input value
	 *
	 * Checks the data to conform to a defined type,
	 * and converts special characters to HTML entities
	 * using {@link htmlentities htmlentities}.
	 * @param string $val the value to test
	 * @param string $type either 'string', 'number', 'mixed', 'text_area'
	 * or an exact expected value.
	 */
	protected function clean_request_value($val, $type) {
		$err = false;
		$ret = '';
		switch($type) {
			case 'string':
				if(is_string($val) && strlen($val) < 256 && preg_match('/\S+/', $val)) {
					try {
						$ret = htmlentities($val, ENT_QUOTES, 'utf-8');
					}
					catch(Exception $e) {
						throw $e;
					}
				}
				else { $err = true; }
				break;
			case 'number':
				if(is_numeric($val) && strlen($val) < 256) {
					$ret = $val;
				}
				else { $err = true; }
				break;
			case 'mixed':
				if(strlen($val) < 256) {
					try {
						$ret = htmlentities($val, ENT_QUOTES, 'utf-8');
					}
					catch(Exception $e) {
						throw $e;
					}
				}
				else { $err = true; }
				break;
			case 'text_area':
				try {
					$ret = htmlentities($val, ENT_QUOTES, 'utf-8');
				}
				catch(Exception $e) {
					throw $e;
				}
				break;
			default:
				if($val == $type) {
					try {
						$ret = htmlentities($val, ENT_QUOTES, 'utf-8');
					}
					catch(Exception $e) {
						throw $e;
					}
				}
				else { $err = true; }
				break;
		}
		if($err) {
			throw new Exception("Service unavailable.");
		}
		else {
			return $ret;
		}
	}
}
?>