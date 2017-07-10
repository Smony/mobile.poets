<?php

class Database {

	private $db_host = 'M2017poetryclub';             
    private $db_user = 'vobushka';                          
    private $db_pass = '1ovushka';                           
    private $db_name = 'poetryclub';                        
	
	private $con = false;
	private $result0 = array();
	
	
	
	public function connect(){	
		if(!$this->con){
			
			$myConn = @mysql_connect($this->db_host, $this->db_user, $this->db_pass);
			
			if($myConn){
				
				$selDb = @mysql_select_db($this->db_name, $myConn);
					
					if($selDb){
					
						$this->con = true;
						print ("1.");
						return true;
				
					}else{
					print ("2.");
						return false;
					
					}
			}else{
			print ("3.");
				return false;
			}
			
		}else {
			print ("4.");
			return true;
		
		}
	
	}
	
	public function setDatabase($name){
		
		if($this->con){
			if(@mysql_close()){
				
				$this->con = false;
				$this->result0 = null;
				$this->db_name = $name;
				$this->connct();
				
			}
			
		}
		
	}
	
	public function getResult(){
	
		return $this->result0;
	}
	


}