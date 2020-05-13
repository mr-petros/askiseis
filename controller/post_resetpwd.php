<?php
function __do_post_resetpwd(){
    try {
       $user = findUser($_POST["email"]);
       $r = $user->sendOTP($_POST["email"]);
       view('startpage', [
            'infomsg' => "Ένας κωδικός μίας χρήσης έχει αποσταλεί στο email σας. :)",
            'active_forgotten' => 'forgotten'
        ]);
    } catch (Exception $e) {
        $errmsg = $e->getMessage();
        
        view('startpage', [
            'errmsg' => $errmsg,
            'active_forgotten' => 'forgotten'
        ]);
    }
} 