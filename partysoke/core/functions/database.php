<?php

function db_open()
{
	global $dbconnect,$dbhost,$dbname,$dbuser,$dbpwd;

	$dbconnect = mysql_connect($dbhost,$dbuser,$dbpwd);
	@mysql_select_db($dbname);
	if ($dbconnect == TRUE)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function db_close()
{
	global $dbconnect,$dbhost,$dbname,$dbuser,$dbpwd;
	@mysql_close($dbconnect);
}

?>