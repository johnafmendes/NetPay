<?php
include_once 'Database.php';

class ImportDAO extends Database{
	
	private $conn;
	
	public function __construct(){
		parent::__construct();
		$this->conn = parent::getConnection();
	}
		
	public function importFileSystem(){
		$tab = "\t";

        $fp = fopen('filesystem.txt', 'r');

        $previousNumTab = 0;
        $previousIdFolder = null;
        $previousPreviousIdFolder = null;
        $idFolder = null;
        $file = false;

        while ( !feof($fp) ){
            $line = fgets($fp, 2048);

            $numTab = strspn($line, $tab);

            if($numTab > $previousNumTab) {
                $previousNumTab = $numTab - 1;
                $previousPreviousIdFolder = $previousIdFolder;
                $previousIdFolder = $idFolder;
            } else if ($numTab == 0){
                $previousNumTab = 0;
                $previousIdFolder = null;
                $previousPreviousIdFolder = null;
            } else if ($numTab <= $previousNumTab) {
                $previousNumTab = $numTab - 1;
                $previousPreviousIdFolder = $previousIdFolder - 1;
                $previousIdFolder = $idFolder - 1;
            }
            
            if (strpos($line, '.') !== false) {//save file
                $this->saveFile($numTab, trim(preg_replace('/\t+/', '', $line)), ($previousIdFolder == null ? $idFolder : $previousIdFolder));
            } else { //save folder
                $idFolder = $this->saveFolder($numTab, trim(preg_replace('/\t+/', '', $line)), (($previousNumTab <= $numTab && $previousIdFolder != $idFolder) ? $previousPreviousIdFolder : $previousIdFolder) );
            }
        }

        fclose($fp);
	}
	
    public function saveFolder($numTab, $data, $idFolder) {
    	$query = "INSERT INTO folders (folder, idfolderchild, tab) "
    			. "VALUES (?, ?, ?)";
    	// 		echo $query;
    	$stmt = $this->conn->prepare( $query );
    	$stmt->bindParam(1, $data, PDO::PARAM_STR);
        $stmt->bindParam(2, $idFolder, PDO::PARAM_INT);
        $stmt->bindParam(3, $numTab, PDO::PARAM_INT);
    	$stmt->execute();
    	
    	if ($stmt->rowCount() == 0) {
    		return null;
        }
        $stmt = $this->conn->query("SELECT LAST_INSERT_ID()");
        $lastId = $stmt->fetchColumn();
        return $lastId;
    }

    public function saveFile($numTab, $data, $idFolder) {
    	$query = "INSERT INTO files (name, idfolder, tab) "
    			. "VALUES (?, ?, ?)";
    	// 		echo $query;
    	$stmt = $this->conn->prepare( $query );
    	$stmt->bindParam(1, $data, PDO::PARAM_STR);
        $stmt->bindParam(2, $idFolder, PDO::PARAM_INT);
        $stmt->bindParam(3, $numTab, PDO::PARAM_INT);
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