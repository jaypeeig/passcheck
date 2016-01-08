<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Main extends CI_Controller {


	public function index()
	{
		$data['title'] = "Password Analyzer";
		$this->load->view('main/head', $data);
	}


	public function graph(){
		$this->load->model('passkeys');
		$result = $this->passkeys->countall();
		$coded = $this->passkeys->categorized('Duplicate');
		$codew = $this->passkeys->categorized('Weak');
		$codea = $this->passkeys->categorized('Acceptable');
		$codeg = $this->passkeys->categorized('Good');
		$codes = $this->passkeys->categorized('Strong');
		$total = $result[0]->total;
		$coded = round(($coded[0]->total / $total) * 100, 0);
		$codew = round(($codew[0]->total / $total) * 100, 0);
		$codea = round(($codea[0]->total / $total) * 100, 0);
		$codeg = round(($codeg[0]->total / $total) * 100, 0);
		$codes = round(($codes[0]->total / $total) * 100, 0);

		echo "
			<div class = 'row'>
				<div class = 'col-sm-6'>
				<p class='text-primary'>Out of the {$total} passwords people gave so far are:</p>
				<ul>
					<li>{$codew}% WEAK</li>
					<li>{$codea}% ACCEPTABLE</li>
					<li>{$codeg}% GOOD</li>
					<li>{$codes}% STRONG</li>
					<li>{$coded}% DUPLICATES</li>
				</ul>
				</div>
				<div class = 'col-sm-6'></div>
			</div>
		";


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

			$std = $_REQUEST['type'];
			switch ($std) {
				case 'validation':
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
					break;
				default:
						//save duplicates
						$this->load->model('passkeys');
						$result = $this->passkeys->querykey($pass);
						if (!(empty($result))){
							$this->passkeys->save_event('Duplicate');
							echo "code-d";
							exit();
						}
						
						switch ($count) {
								case 1:
									$this->passkeys->save_event('Acceptable');
									echo "code-a";
									break;
								case 2:
									$this->passkeys->savekey($pass);
									$this->passkeys->save_event('Good');
									//save the key
									
									echo "code-g";
									break;
								case 3:
									$this->passkeys->savekey($pass);
									$this->passkeys->save_event('Strong');
									//save the key
									
									echo "code-s";
									break;
								default:
									$this->passkeys->save_event('Weak');
									echo "code-w";
									break;
							}
							
					break;
			}
			
	}



	public function dupquery(){
		$pass = $_REQUEST['password'];
		$this->load->model('passkeys');
		$result = $this->passkeys->querykey($pass);
		if (!(empty($result))){
			echo "Password exists on database!";
		}

	}

	public function save(){
		$this->load->model('passkeys');
		$this->passkeys->savekey('as');

	}

	
}
