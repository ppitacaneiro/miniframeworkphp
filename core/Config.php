<?php

// URL DOMAIN

define("URL_DOMAIN","http://localhost:8080/miniframeworkphp/");

// DATABASE 

define("DRIVER_DATABASE","mysql");
define("USER_DATABASE","root");
define("CHARSET_DATABASE","utf8");
define("PASSWORD_DATABASE","");
define("NAME_DATABASE","gestion_empresa");
define("HOST","localhost");

// DEFAULTS

define("DEFAULT_CONTROLLER","usuario");
define("DEFAULT_ACTION","index");
define("DEFAULT_STRINGS_FILE","strings.php");

// PATHS

define("PATH_HTTP_SEPARATOR","/");
define("PATH_CONTROLLERS","controllers");
define("PATH_VIEWS","views");
define("PATH_MODELS","models");

// VALIDATORS

define("VALIDATOR_EMAIL","La dirección de correo electrónica no es válida");
define("VALIDATOR_REQUIRED","Campo obligatorio no cumplimentado");
define("VALIDATOR_PASSWORD","La contraseña debe ser de 8 caracteres como mínimo. Debe contener una mayúscula, una minúscula y un número");

// SEND MAILS

define("HOST_SMTP","smtp.**************.es");
define("USER_SMTP","************************");
define("PASSWORD_SMTP","************");
define("PORT_SMTP","587");
define("MAIL_FROM","***************");


?>
