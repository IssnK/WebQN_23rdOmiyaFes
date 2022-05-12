<?php 
	function getDB(){
		// DB情報
		$host = 'mysql640.db.sakura.ne.jp';
		$user = 'oomiya-fes';
		$password = 'sassa0038';
		$dbname = 'oomiya-fes_questionnaire';

		// DB接続
		$mysqli = new mysqli($host,$user,$password,$dbname);
		if ($mysqli->connect_error) {
			error_log($mysqli->connect_error);
			exit ();
		} else {
			$mysqli->set_charset("utf8");
			return $mysqli;
		}
	}
 ?>
