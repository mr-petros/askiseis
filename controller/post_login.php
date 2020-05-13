<?php
function __do_post_login(){
    try {
       $user = findUser($_POST["email"]);
       $r = $user->login($_POST["pwd"]);
        if ($r === true)
            header('Location: cp');
        else
            header('Location: changepwd');
        exit;    
    } catch (Exception $e) {
        $errmsg = $e->getMessage();
        
        view('startpage', [
            'errmsg' => $errmsg
        ]);
    }
} 