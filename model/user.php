<?php
class Model_User extends RedBean_SimpleModel {

	function signup($username, $email){
		if (empty($username))
			throw new Exception('Δεν δόθηκε όνομα χρήστη.');

		if (empty($email))
			throw new Exception('Δεν δόθηκε μέιλ.');
		
		$u  = R::findOne( 'user', ' username = ? ', [ $username ] );
		if (!empty($u))
			throw new Exception('Υπάρχει ήδη χρήστης με αυτό το όνομα.');
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			throw new Exception ('Το email δεν είναι σωστό.');
					
		$this->email = mask_email($email, "*");
		$this->email_hash =  crypt($email, "email");
		
		$u  = R::findOne( 'user', ' email_hash = ? ', [ $this->email_hash ] );
		if (!empty($u))
			throw new Exception('Υπάρχει ήδη χρήστης με αυτό το μέιλ.');
		
		$this->username = $username;
		
		$this->sendOTP($email);
		return R::store( $this );
	}
	
	function sendOTP($email){
		$email_hash =  crypt($email, "email");
		if ($email_hash !== $this->email_hash)
			throw new Exception('Το μέιλ δεν ανήκει σε αυτόν τον χρήστη.');
		
		$newpwd = substr(str_shuffle("0123456789abcdefghijkmnopqrstuvwxyz"), 0, 7);
		if ($_SERVER['SERVER_NAME'] === "127.0.0.1") $newpwd = "1111";

		$this->otp_hash = password_hash($newpwd, PASSWORD_DEFAULT);
		$this->otp_created_at = R::isoDateTime();
		return mySendMail ($email, $this->username, $newpwd, "oneTimePwd");
		return R::store( $this );
	}
	
	function login($password){
		if (password_verify ( $password ,$this->pwd_hash )){
			$this->login_at = R::isoDateTime();
			$this->failed_logins = 0;
			$this->otp_hash = NULL;
			$this->otp_created_at = NULL;
		}
		else{
			$this->failed_logins += 1;
			throw new Exception('Λαθος κωδικός εισόδου.');
		}
		return R::store( $this );
		return true;
	}
	
	function changePwd($oldpwd, $newpwd, $newpwd2){
		if ($newpwd !== $newpwd2)
			throw new Exception('Οι δύο νέοι κωδικοί δεν ταιριάζουν.');
		if (!password_verify( $oldpwd ,$this->pwd_hash ) && !password_verify( $oldpwd ,$this->otp_hash ) )
			throw new Exception('Ο κωδικός δεν είναι σωστός.');
		$this->pwd_hash = password_hash($newpwd, PASSWORD_DEFAULT);
		$this->pwd_created_at = R::isoDateTime();
		return R::store( $this );
		return true; 		
	}
	
	function update() {
    	$this->username = strtolower($this->bean->username);
	    if (empty($this->id))
            $this->created_at = R::isoDateTime();
		$this->updated_at = R::isoDateTime();
	}
}

function findUser($str){
	if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
		$u = R::findOne( 'user', 'email_hash = ?', [crypt($str, "email")]);
		if (empty($u))
			throw new Exception('Δεν υπάρχει χρήστης με αυτό το μέιλ.');
	}
	else {
		$u  = R::findOne( 'user', ' username = ? ', [ $str ] );
		if (empty($u))
			throw new Exception('Δεν υπάρχει χρήστης με αυτό το όνομα.');
	}
	return $u;
}