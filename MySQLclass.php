<?php

class MySQL {
	var $servidor;
	var $usuario;
	var $contra;
	var $database;
	var $query;
	
	public function __construct($servidor, $usuario, $contra, $database){
		$this->servidor  = $servidor;
		$this->usuario 	 = $usuario;
		$this->contra 	 = $contra;
		$this->database  = $database;
	}
	
	public function mySQLconnect (){
		$connect = mysql_connect($this->servidor, $this->usuario, $this->contra);
		mysql_select_db($this->database,$connect) or die (msql_error());
		
		if( $connect ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function mySQLinsert($tbl, $data){
		$query  = "INSERT INTO ". $tbl ."(" ;
		$query .= implode(', ', array_keys($data)) . ") VALUES (". implode(',', array_values($data)).")";
		mysql_query($query) or die (mysql_error());
	}
	
	public function mySQLselect($tbl, $where, $order) {
		$query = "SELECT * FROM ". $tbl;
		if ($where) $query .= " WHERE ". $where;
		if ($order) $query .= " ORDER BY ". $order; 
		
		$result = mysql_query($query) or die (mysql_error());
		$value = array();
		while ($row = mysql_fetch_object($result)){
			$value[] = $row;
		}
		return $value;
	}
	
	public function mySQLquery($query) {
		$result = mysql_query($query);
		$value = array();
		while ($row = mysql_fetch_object($result)){
			$value[] = $row;
		}
		return $value;
	}	
	
	public function mySQLnumrows($query) {
		$rows = mysql_query($query);
		$rows = mysql_num_rows($rows);
		return $rows;
	}	
	
	public function mySQLupdate($tbl, $data, $where){
		$query  = "UPDATE ". $tbl ." SET ";
		$item = array();
		foreach ($data as $key => $value) {
			$item[] = $key ." = ". $value;
		}
		$query .= implode (',',$item);
		$query .= " WHERE " . $where; 
		
		mysql_query($query) or die (mysql_error());
	}
	
	public function mySQLdelete($tbl,$where)
	{
		$query = "DELETE FROM ". $tbl;
		$query .= " WHERE ". $where;
		mysql_query($query);
	}
	
	public function mySQLdisconnect(){
		mysql_close();
	}
}
