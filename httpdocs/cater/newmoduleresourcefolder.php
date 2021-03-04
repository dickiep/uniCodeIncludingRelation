<?php
    include'connections/conn.php';
    session_start();

    if ( isset($_POST['folderTitle']) ) {
        
        // Data validation
        if ( strlen($_POST['folderTitle']) < 1 ) {
            $_SESSION['error'] = 'Invalid Folder Title';
            header("Location: addmoduleresources.php");
            return; 
        }

        
        $moduleCode = mysqli_real_escape_string($conn, $_POST['moduleTitle']);
        $folder = mysqli_real_escape_string($conn, $_POST['folderTitle']);
        
        //create the folder
        $curdir = getcwd();
        mkdir($curdir."/moduleresources/$moduleCode/$folder", 0777);
        
        //insert a db reference to the folder
        $insertFolder = "INSERT INTO vleModuleResourceFolders (moduleCode, folderName)
              VALUES ('$moduleCode', '$folder')";
        $insertResult = mysqli_query($conn, $insertFolder) or die (mysqli_error($conn));
        
        $_SESSION['success'] = 'Folder Added';
        header( 'Location: addmoduleresources.php' ) ;
        return;
    }
    


?>