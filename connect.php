<?php
	function fConnect(){
		$host = "tuxa.sme.utc";
		$dbName = "dbnf17p030";
		$user = "nf17p030";
		$pass = "XXXXXXXXX";
		$port = "5432";

		$db = "";
		try {
			$db = pg_connect("host=".$host." port=".$port." user=".$user." dbname=".$dbName." password=".$pass." options='--client_encoding=UTF8'");
		} Catch (Exception $e) {
			Echo $e->getMessage();
		}
		return $db;
	}
?>
