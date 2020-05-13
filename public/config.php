<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB connections
// info here:   https://redbeanphp.com/index.php?p=/connection

/*
	define("dbConStr", "mysql:host=localhost;dbname=mikbib");
	define("dbUser", "root");
	define("dbPwd", "root");
*/

define("dbConStr", "sqlite:mb_123.db");
define("dbUser", "");
define("dbPwd", "");


// Mail connections
define("mailHost", "smtp.mailtrap.io");
define("mailUsername", "1f14deed1713d3");
define("mailPassword", "000f0adbcde71c#pkz");
define("mailFrom", "pkoutroulis@sch.gr");
define("mailFromName", "μικρές βιβλιοθήκες");

  /*'protocol' => 'smtp',
  'smtp_host' => 'smtp.mailtrap.io',
  'smtp_port' => 2525,
  'smtp_user' => '1f14deed1713d3',
  'smtp_pass' => '000f0adbcde71c',
  'crlf' => "\r\n",
  'newline' => "\r\n"*/


define( 'PATH_SYSTEM', '..' );
define( 'PATH_SRC',    PATH_SYSTEM     );
define( 'PATH_DATA',   PATH_SYSTEM     );
define( 'PATH_APP',    PATH_SRC        );
define( 'PATH_LIB',    PATH_SRC    .  '/lib'     );
define( 'PATH_CONFIG', PATH_APP    .  '/config'  );
define( 'PATH_I18N',   PATH_APP    .  '/i18n'    );
define( 'PATH_VIEW',   PATH_APP    .  '/view'    );
define( 'PATH_MODEL',  PATH_APP    .  '/object'  );
define( 'PATH_OBJECT', PATH_APP    .  '/object'  );
define( 'PATH_SCRIPT', PATH_APP    .  '/script'  );

date_default_timezone_set('Europe/Athens');