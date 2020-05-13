<?php
function __do_post_registerT(){
    try {
		$user = R::dispense( 'user' );
        $user->signup($_POST["username"], $_POST["email"]);
       
        view('startpage', [
            'infomsg' => "Η εγγραφή σας έγινε. Σας έχει αποσταλεί ο κωδικός εισόδου με email.",
            'active_tab' => 'registerT'
        ]);
        
	} catch (Exception $e) {
        $errmsg = $e->getMessage();
        
        view('startpage', [
            'active_tab' => 'registerT',
            'errmsg' => $errmsg
        ]);
    }
} 