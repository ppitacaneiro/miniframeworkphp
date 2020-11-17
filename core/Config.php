<?php

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

// PATHS

define("PATH_CONTROLLERS","controllers");
define("PATH_VIEWS","views");
define("PATH_MODELS","models");

// VALIDATORS

define("VALIDATOR_EMAIL","La dirección de correo electrónica no es válida");
define("VALIDATOR_REQUIRED","El campo es obligatorio");
define("VALIDATOR_PASSWORD","La contraseña debe ser de 8 caracteres como mínimo. Debe contener una mayúscula, una minúscula y un número");


?>