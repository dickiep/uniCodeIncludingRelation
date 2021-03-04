<?php         
if (isset($_POST['upload'])) {
    
    session_start();
    
    include'connections/conn.php';
                
    $instructor = mysqli_real_escape_string($conn, $_POST['instructor']);
    $module =  $_POST['module'];        
                    
         if ((!empty($instructor)) && (!empty($module))) {
                        
              foreach ($module as $m) {
                            
                  $query = "insert into vleTeacherTeaches(moduleCode, teacherID) values ('".mysqli_real_escape_string($conn,$m)."', '$instructor')";

                  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                            
                    }
                        $_SESSION['successInstructor'] = "Great the instructor has been added to the selected module(s)";
                        header('Location: createamodule.php');
                        return;
                    } else {
                        $_SESSION['errorInstructor'] =  "Sorry that one hasn't worked, please try it again."; 
                        header('Location: createamodule.php');
                        return;
                    }
        mysqli_close($conn);
    } ?>