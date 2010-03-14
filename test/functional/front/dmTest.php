<?php

require_once realpath(dirname(__FILE__).'/../../../config/ProjectConfiguration.class.php');

$config = array(
  'env'       => 'test',
  'debug'     => false,
  'login'     => false,
  'username'  => 'admin',
  'password'  => 'admin',
  'validate'  => false
);

$test = new dmFrontFunctionalCoverageTest($config);

$test->run();