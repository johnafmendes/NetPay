<?php

class ContactDAO {
	
	public function saveContact($name, $email, $phone){
        $fp = fopen('contact.txt', 'w');

        fwrite($fp, $name . ";");
        fwrite($fp, $email . ";");
        fwrite($fp, $phone);

        fclose($fp);
	}
    
    public function checkIfExist($name, $email, $phone){
        $fp = fopen('contact.txt', 'r');

        $line = fgets($fp, 2048);

        if (strpos($line, $name) !== false && strpos($line, $email) !== false && strpos($line, $phone) !== false) {
            return true;
        } else { 
            return false;
        }
    }

    public function deleteFile(){
        if (file_exists("contact.txt")) {
            unlink("contact.txt");
        } else {
            echo "<div class='help'>File not found!</div><br/>";
        }
    }
}
?>