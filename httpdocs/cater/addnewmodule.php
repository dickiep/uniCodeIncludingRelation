<?php

session_start();

include'connections/conn.php';

    if (isset($_POST['upload'])) {
        //upload the firstName, lastName, email and user type
            $moduleCode = mysqli_real_escape_string($conn, $_POST['moduleCode']);
            $moduleName = mysqli_real_escape_string($conn, $_POST['moduleName']);
            $moduleInfo = mysqli_real_escape_string($conn, $_POST['moduleInfo']);

        if ((!empty($moduleCode)) && (!empty($moduleName)) && (!empty($moduleInfo))) {


            mysqli_query($conn, "START TRANSACTION");

            $resultOne = mysqli_query($conn, "INSERT INTO vleModules (moduleCode, moduleName) VALUES ('$moduleCode', '$moduleName');") or die(mysqli_error($conn));

            $resultTwo = mysqli_query($conn, "INSERT INTO vleModuleInfo (moduleCode, description) VALUES ('$moduleCode', '$moduleInfo');") or die(mysqli_error($conn));

            mysqli_commit($conn);

            $curdir = getcwd();

            mkdir($curdir . "/moduleresources/$moduleCode", 0777);

            mysqli_close($conn);
            
            $_SESSION['moduleAdditionSuccess'] = "Great that module has been added.";
            header('Location: managemodules.php');
            return;

        } else {
        
            mysqli_close($conn);

            $_SESSION['moduleAdditionFailure'] = "Apologies, that module hasn't been added.";
            header('Location: managemodules.php');
            return;

        }
    }
        
?>