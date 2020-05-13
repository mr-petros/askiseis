<?php

session_start();
include "config.php";

// include library
foreach (glob("../lib/*.php") as $filename)
    include $filename;

// include model
foreach (glob("../model/*.php") as $filename)
    include $filename;

// include controller
foreach (glob("../controller/*.php") as $filename)
    include $filename;

// connect to the database
R::setup(dbConStr, dbUser, dbPwd);

//echo function_exists( "__do_get" );

if (!fmap( [ ], '__do' )) {
	/* No request handler has been found... */
    http_response_code(404);
    
	die('wut?');
}
