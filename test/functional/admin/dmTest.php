<?php

require_once realpath(dirname(__FILE__).'/../../../config/ProjectConfiguration.class.php');

$config = array(
  'env'       => 'test',
  'debug'     => true,
  'login'     => true,
  'username'  => 'thibault',
  'password'  => 'ckg8opj',
  'validate'  => false
);

$test = new dmAdminFunctionalCoverageTest($config);

$test->run();