<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	public function index()
	{
		$data['title'] = "Password Analyzer";
		$this->load->view('main/head', $data);
	}

	public function show_messages(){

		if (isset($_REQUEST['password'])) {
			$message = null;
			$pass = $_REQUEST['password'];
			if (strlen($pass) < 8) {
				echo "<li class='text-danger'><span class='glyphicon glyphicon-remove'></span> Password must be at least 8 characters!</li>";
			}elseif (strlen($pass) > 30) {
				echo "<li class='text-danger'><span class='glyphicon glyphicon-remove'></span> Password must not exceed 30 characters!</li>";
			}
			preg_match_all('/[A-Z]/', $pass, $caps);
			preg_match_all('/[a-z]/', $pass, $ncaps);
			$upper = count($caps[0]);
			$lower = count($ncaps[0]);
			echo $message2 = (($upper < 1) or ($lower < 1)) ? "<li class='text-danger'><span class='glyphicon glyphicon-remove'></span> Password must both upper and lower case letters!</li>" : "";
			echo $message3 = (( ! preg_match( '/[0-9\W]/', $pass )) || (( ! preg_match( '/[A-Za-z]/', $pass ) )) ) ? $message .= ( "<li class='text-danger'><span class='glyphicon glyphicon-remove'></span> Password must contain letters and at least one number or symbol.</li>") : "";
		}

	}

	public function validate(){
			$count = 0;
			$pass = $_REQUEST['password'];
			preg_match_all('/[A-Z]/', $pass, $caps);
			preg_match_all('/[a-z]/', $pass, $ncaps);
			$upper = count($caps[0]);
			$lower = count($ncaps[0]);
			if (strlen($pass) < 8) {
		
			}elseif (strlen($pass) > 30) {
		
			}else{
				$count += 1;
			}
			if (( ! preg_match( '/[0-9\W]/', $pass )) || (( ! preg_match( '/[A-Za-z]/', $pass ) )) ) {  } else { $count += 1; }
			if  (($upper < 1) or ($lower < 1)) { } else { $count += 1; }

			switch ($count) {
				case 1:
					echo "acceptable";
					break;
				case 2:
					echo "good";
					break;
				case 3:
					echo "strong";
					break;
				default:
					echo "weak";
					break;
			}
	}

	public function dupquery(){
		$pass = $_REQUEST['password'];
		$this->load->model('passkeys');
		$result = $this->passkeys->querykey($pass);
		if (!(empty($result))){
			echo "Password already in database";
		}
	}

	public function save(){
		$this->load->model('passkeys');
		$this->passkeys->savekey('as');

	}

	
}
