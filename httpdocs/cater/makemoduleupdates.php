<?php

session_start();

include'connections/conn.php';

$moduleid = mysqli_real_escape_string($conn, $_POST['moduleid']);
$moduleCode = mysqli_real_escape_string($conn, $_POST['moduleCode']);
$moduleName = mysqli_real_escape_string($conn, $_POST['moduleName']);
$moduleInfo = mysqli_real_escape_string($conn, $_POST['moduleInfo']);

if(strcmp($moduleid,$moduleCode)==0) {

    $updateInfoQuery = "UPDATE vleModuleInfo SET description = '$moduleInfo' WHERE moduleCode = '$moduleid'";
    $updateInfoResult = mysqli_query($conn, $updateInfoQuery) or die(mysqli_error($conn));

    $updateModuleQuery = "UPDATE vleModules SET moduleName = '$moduleName' WHERE moduleCode = '$moduleid'";
    $updateResult = mysqli_query($conn, $updateModuleQuery) or die(mysqli_error($conn));
    
} else {
    
    $updateModuleCodeQuery = "UPDATE vleModules SET moduleCode = '$moduleCode' WHERE moduleCode = '$moduleid'";
    $updateModuleCodeResult = mysqli_query($conn, $updateModuleCodeQuery) or die(mysqli_error($conn));
    
    $updateInfoQueryAlt = "UPDATE vleModuleInfo SET description = '$moduleInfo' WHERE moduleCode = '$moduleCode'";
    $updateInfoResultAlt = mysqli_query($conn, $updateInfoQueryAlt) or die(mysqli_error($conn));

    $updateModuleQueryAlt = "UPDATE vleModules SET moduleName = '$moduleName' WHERE moduleCode = '$moduleCode'";
    $updateResultAlt = mysqli_query($conn, $updateModuleQueryAlt) or die(mysqli_error($conn));
}

mysqli_close($conn);

$_SESSION['updateSuccess'] = "That is everything updated for $moduleid.";
header('Location: editamodule.php');
return;







?>