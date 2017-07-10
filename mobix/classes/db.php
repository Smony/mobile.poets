<?php

class database {
 
 
	private $conn = false;
	private $data = array();
 

		  public function __construct($host, $user, $pass, $base) {
			
			$this->conn = mysql_connect($host, $user, $pass) or die(mysql_error());
			
			mysql_select_db($base, $this->conn);
			
			mysql_query("SET NAMES 'utf8'", $this->conn);
		  }
  
  }