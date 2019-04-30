<?php
require_once('config.php');

class apiFunction extends DB{
	public $_sql;
	public $mysqli;
	

	public function __construct(){
		$this->mysqli = new mysqli($this->host,$this->user,$this->passwd,$this->db) or die($mysqli->error);	
			//echo"Successfully connected";	
	}

	public function today(){
		$this->_sql = $this->mysqli->query("SELECT CURDATE() as cDate")or die($this->mysqli->error);
		return $this->_sql;
	}
	
	public function customQeury($mQuery){
		$this->_sql = $this->mysqli->query($mQuery)or die($this->mysqli->error);
		return $this->_sql;
	}

	//check username if exist
	public function CheckUserExist($username){
		$this->_sql = $this->mysqli->query("SELECT user_name FROM user_table WHERE user_name = '$username'")or die($this->mysqli->error);
		return $this->_sql;
	}

    //check email if exist
	public function CheckEmail($email){
		$this->_sql = $this->mysqli->query("SELECT user_email FROM user_table WHERE user_email = '$email'") or die($this->mysqli->error);
		return $this->_sql;
	}

	//insert data
	public function PublicInsert($table,$value){
		$this->_sql = $this->mysqli->query("INSERT INTO $table VALUES($value)")or die($this->mysqli->error);
		return $this->_sql;
	}

	//login
	public function isLogin($username,$password){
		$this->_sql = $this->mysqli->query("SELECT user_id,user_name, user_password FROM user_table WHERE user_name='$username' AND user_password='$password'")or die($this->mysqli->error);
		return $this->_sql;
	}

	//public select
	public function _select($table){
		$this->_sql = $this->mysqli->query("SELECT * FROM $table") or die($this->mysqli->error);
		return $this->_sql;
	}



	public function search($table,$column,$datefrom,$dateto,$column2,$id,$column3,$fname){
		$this->_sql = $this->mysqli->query("SELECT * FROM $table WHERE $column2 LIKE concat('',$id,'%') 
			 AND $column BETWEEN '$datefrom' and '$dateto' AND fileName LIKE concat('','$fname','%')")or die($this->mysqli->error);
		return $this->_sql;
	}

	public function delete($table,$column,$id){
		$this->_sql = $this->mysqli->query("DELETE FROM $table WHERE $column=$id ")or die($this->mysqli->error);
		return $this->_sql;
	}

	public function getID ($table,$column,$id){
		$this->_sql = $this->mysqli->query("SELECT * FROM $table WHERE $column = $id") or die($this->mysqli->error);
		return $this->_sql;
	}

	public function getEmail($id){
		$this->_sql = $this->mysqli->query("SELECT user_email FROM user_table where user_name='$id'") or die($this->mysqli->error);
		return $this->_sql;
	}

	public function _autoComplete($table,$column,$term){
		$this->_sql = $this->mysqli->query("SELECT $column FROM $table where $column like concat('%','$term','%')") or die($this->mysqli->error);
		return $this->_sql;
	}

	//share query
	public function Share($datefrom,$dateto,$id,$fname){
		$this->_sql = $this->mysqli->query("select file.fileName as fileName, file.path as path, file.fid as fid,
		share.sid as id, share.date as date, (select concat(FirstName,' ', LastName)  from user_table where user_id = share.shareBy) as shareby 
		from file_table as file 
		left join share_table as share on file.fid = share.fid
		where share.user_id like concat('%',$id,'%') AND share.date between '$datefrom' and '$dateto' AND file.fileName like concat('%','$fname','%')") or die($this->mysqli->error);
		return $this->_sql;
	}

	//chech file if already shared
	public function CheckFile($fid,$shareby,$shareTo){
	$this->_sql = $this->mysqli->query("select user_id,fid,shareBy from share_table where user_id='$shareTo' and fid='$fid' and shareBy ='$shareby'")or die($this->mysqli->error);
	return $this->_sql;	
	}


	//FOLDER Query
	public function GetUserfolder($id){
		$this->_sql = $this->mysqli->query("SELECT * FROM folder_table where user_id='$id'") or die($this->mysqli->error);
		return $this->_sql;
	}

	public function SearchUserFolder($id,$fname){
		$this->_sql = $this->mysqli->query("SELECT * FROM folder_table where user_id='$id' AND folderName like concat('%','$fname','%')") or die($this->mysqli->error);
		return $this->_sql;
	}

	public function SearchFolderContent($id,$userid){
		$this->_sql = $this->mysqli->query("select file.fid as fid,folderContent.ContentID as ContentID,folderContent.user_id as userID,folder.folderName as FolderName, file.fileName as fileName, file.path as path
						from folder_table as folder 
						left join addtofolder_table as folderContent ON folder.folderID = folderContent.folderID
						left join file_table as file ON folderContent.fid = file.fid
						where folderContent.user_id ='$userid' and folder.folderID='$id'") or die($this->mysqli->error);
		return $this->_sql;
	}



}
//$a=new apiFunction;

?>