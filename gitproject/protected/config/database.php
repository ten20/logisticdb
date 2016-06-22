<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

//Local	
    'connectionString' => 'mysql:host=localhost;dbname=db_logistic',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
/*
//Server	
    'connectionString' => 'mysql:host=localhost;dbname=db_saichon',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
//
*/
);