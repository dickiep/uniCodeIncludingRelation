<?php

session_start();

include('connections/conn.php');

if (isset($_POST['upload'])) {

    $student = $_POST['student'];
    $module = mysqli_real_escape_string($conn, $_POST['module']);


    if ((!empty($student)) && (!empty($module))) {
        
            foreach ($student as $s) {
           
            $query = "insert into vleStudentTakes(moduleCode, studentID) values ('$module', '".mysqli_real_escape_string($conn,$s)."')";

            $result = mysqli_query($conn, $query) or $problem = mysqli_error($conn);
            
            if(isset($problem)) {
                $issue = $s.' is already a studying '.$module;
                $_SESSION['error'] = $issue;
                header('Location: createamodule.php');
                return;
                
            }

        }
        
        $_SESSION['success'] = "Great those student(s) have been added to ".$module;
            header('Location: createamodule.php');
            return;
        
    } else {
        $_SESSION['error'] = 'There has been a problem, please try again';
            header('Location: createamodule.php');
            return;
        
    }
      mysqli_close($conn);

}
?>