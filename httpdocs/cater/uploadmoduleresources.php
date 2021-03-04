<?php
include'connections/conn.php';
session_start();

if (isset($_POST['upload'])) {

    // upload the user file
    // Get file name
    $file = $_FILES['file']['name'];

    //get the temporary location
    $tmp_file = $_FILES['file']['tmp_name'];

    if (isset($file)) {
        if (!empty($file)) {

            $urlEncodedFile = urlencode($file);
            $module = mysqli_real_escape_string($conn, $_POST['module']);
            $folder = $_POST['folder'];
            $fileUpload = mysqli_real_escape_string($conn, $file);            

            if (isset($module) && isset($folder)) {
                echo"$module,";
                echo"$folder";
             
                
                $fileQuery = "SELECT id FROM vleModuleResourceFolders WHERE moduleCode = '$module' AND folderName = '$folder'";

                $fileResult = mysqli_query($conn, $fileQuery) or die(mysqli_error($conn));

                if (mysqli_num_rows($fileResult) > 0) {
                    while ($row = mysqli_fetch_assoc($fileResult)) {
                        $fileID = $row['id'];
                        
                    }
                }

                $path = "moduleresources/{$module}/";

                if (move_uploaded_file($tmp_file, $path . $urlEncodedFile)) {
                    $locationInsertQuery = "INSERT into vleModuleResources (folderID, fileName) VALUES ($fileID,'$fileUpload')";
                    $locationInsertResult = mysqli_query($conn, $locationInsertQuery) or die(mysqli_error($conn));
                    $_SESSION['uploadsuccess'] = "Great that's been uploaded to the following location: '$path$file'";
                    header("Location: addmoduleresources.php");
                    return;
                } else {

                    $_SESSION['uploaderror'] = 'Failed to Upload Module Resources';
                    header("Location: addmoduleresources.php");
                    return;
                }
            } else {
                $_SESSION['uploaderror'] = 'Please choose a module and folder to upload to';
                header("Location: addmoduleresources.php");
                return;
            }
        }
    } else {
        $_SESSION['uploaderror'] = 'Please choose a file';
        header("Location: addmoduleresources.php");
        return;
    }
}

mysqli_close($conn);
?>