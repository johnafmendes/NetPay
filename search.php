<?php
    include_once 'model/SearchDAO.php';

    header('Content-Type: text/plain');

    $searchDAO = new SearchDAO();

    $content = "";
    $previousFolder = "";

    $fileSystem = $searchDAO->getFileSystem($_POST['word']);
    if($fileSystem != null) {
        while ($fs = $fileSystem->fetch(PDO::FETCH_OBJ)){
            if($fs->folder == $previousFolder){
                $content .= returnTab($fs->tab) . $fs->name . "\n"; 
            } else {
                $content .= returnTab($fs->tab - 1) . $fs->folder . "\n"; 
                $content .= returnTab($fs->tab) . $fs->name . "\n"; 
                $previousFolder = $fs->folder;
            }
        }
    } else {
        $content .= "none to show";
    }

    function returnTab($numTab){
        $str = "";
        for ($i = 0; $i < $numTab ; $i++){
            $str .= "\t";
        }
        return $str;
    }

    echo $content;
?>