<?php
    include_once 'model/ImportDAO.php';
    
    $importDAO = new ImportDAO();

    $importDAO->importFileSystem();

    echo "Completed"
?>