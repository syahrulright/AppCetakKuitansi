<?php
Class KwtConfig{
	function __Construct(){
		$this->dbhost = 'localhost:3307';
		$this->dbuser = 'root';
		$this->dbpass = '';
		$this->dbName = 'kuitansi';
		$this->conn = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass);
		$this->kwNumPattern = "/KHS-KWT/".$this->Tanggal('romawi')."/".$this->Tanggal('th');
	}
}
?>