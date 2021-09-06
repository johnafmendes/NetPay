<?php
include_once 'Database.php';

class SearchDAO extends Database{
	
	private $conn;
	
	public function __construct(){
		parent::__construct();
		$this->conn = parent::getConnection();
	}
		
    public function getFileSystem($word){
		$query = "SELECT f.*, fi.* "
				. "FROM folders f "
                . "LEFT JOIN folders fo ON fo.idfolderchild = f.idfolder "
                . "LEFT JOIN files fi ON fi.idfolder = f.idfolder "
                . "WHERE UPPER(f.folder) like ? OR UPPER(fi.name) like ? ";
		// 		echo $query;
		$stmt = $this->conn->prepare( $query );
		$word = "%" .  strtoupper($word) . "%";
        $stmt->bindParam(1, $word, PDO::PARAM_STR);
        $stmt->bindParam(2, $word, PDO::PARAM_STR);
		$stmt->execute();

		if ($stmt->rowCount() == 0) {
			return null;
		}
		return $stmt;
	}
  
    
    function __destruct() {
    	unset($this->conn);
    }
}
?>