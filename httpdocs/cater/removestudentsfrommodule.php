<?php

session_start();

include('connections/conn.php');

if (isset($_POST['upload'])) {

    $student = $_POST['student'];
    $module = mysqli_real_escape_string($conn, $_POST['module']);


    if ((!empty($student)) && (!empty($module))) {
        
            foreach ($student as $s) {

           
            $query = "DELETE FROM vleStudentTakes WHERE studentID = $s AND moduleCode = '$module'";
            

            $result = mysqli_query($conn, $query) or $problem = mysqli_error($conn);
            
            if(isset($problem)) {
                $issue = $s.' is already a studying '.$module;
                $_SESSION['error'] = $issue;
                header('Location: editamodule.php');
                return;
                
            }
            

        }
        
        $_SESSION['success'] = 'Record Removed';
            header('Location: editamodule.php');
            return;
        
    } else {
        $_SESSION['error'] = 'There has been a problem, please try again';
            header('Location: editamodule.php');
            return;
        
    }
      mysqli_close($conn);

}
?>