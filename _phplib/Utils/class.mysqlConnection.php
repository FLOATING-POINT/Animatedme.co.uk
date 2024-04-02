<?php 
// Production server
class mysqlConnection {

	var $_localUser;
	var $_localHost;
	var $_localPass;
	var $_localDBName;
	
	var $_liveUser;
	var $_liveHost;
	var $_livePass;
	var $_liveDBName;
	
	var $_isLive; // Indicates whether a local Dev database or Live Web Server datase is being used
	
	var $_conn; // the MySQL connection
	var $_db_conn;
	
	var $_user;
	var $_pass;
	var $_host;
	var $_dbName;
	
	 function mysqlConnection(){
	 
		 $this->_isLive 	= false; 
	
		$this->_liveUser 	="amdbu";		
		$this->_liveHost	="localhost";
		$this->_livePass	="O&ynjhud*&ass";
		$this->_liveDBName	="animatedmedbo";
		
		$this->_localUser	="root";
		$this->_localHost	="localhost";
		$this->_localPass	="password";
		$this->_localDBName	="animatedme";

	}
	 function connect(){
		if($this->_isLive){
			$this->_user 	= $this->_liveUser;
			$this->_pass 	= $this->_livePass;
			$this->_host 	= $this->_liveHost;
			$this->_dbName 	= $this->_liveDBName;		
		} else {
			$this->_user 	= $this->_localUser;
			$this->_pass 	= $this->_localPass;
			$this->_host 	= $this->_localHost;
			$this->_dbName 	= $this->_localDBName;
		}
		// try to create the connection		
		$this->doConnect();

	}
	function doConnect(){
	
		$this->_conn = @mysql_connect($this->_host, $this->_user, $this->_pass);
		$this->_db_conn= mysql_select_db($this->_dbName, $this->_conn);
		
	}
	 function disconnect(){
		mysql_close();
	}
	public function getConnection(){
		if(isset($this->_conn)){
			return $this->_conn;
		} else {
			throw new Exception("No MYSQL connection resource available");

		}	
	}
}

?>