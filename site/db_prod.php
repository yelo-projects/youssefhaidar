<?php

define('SQL_RANDOM','RANDOM()');

MySQLDatabase::set_connection_charset('utf8');
return array(
	"type" => 'SQLiteDatabase',
	"server" => '',
	"username" => '',
	"password" => '',
	"database" => $project.'.sqlite',
	"path" => realpath(dirname($_project_dir).'/assets/.db/'),
);
