<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>


        <meta charset="utf-8">
        <title>QUB Job Listing</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="skeleton/normalize.css">
        <link rel="stylesheet" href="skeleton/skeleton.css">
        <link rel="stylesheet" href="css/custom.css">

        <!-- JQUERY CDN library -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script>

            $(document).ready(function () {


            }

        </script>

    </head>

    <body>



        <!-- Primary Page Layout
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        
            <div class="row">
            <div class="one-full column title"> 
                <div>

                    <h3 style="margin: 15px;">QUB Jobs</h3> 

                </div>
            </div>
        </div>

        <div class ="row jobinfo">
            <div class ="one-full column" style="height: 30px;">
                <?php
                 $displayid = $_GET['jobid'];
                 echo "<h3>Ref : $displayid</h3>";
                 ?>
            </div>
        </div>
        
        
            <div class="one-half column jobinfo" style="display: inline-block; float: left;"> 
                <article>
                    <div id ="content">
                    <?php
                    //$displayid = $_GET['jobid'];
                    //echo "<p>$displayid</p>";

                    $query = "SELECT * FROM jobs WHERE id = $displayid";
                    $display = mysqli_query($conn, $query);
                    $num = mysqli_num_rows($display);

                   $queryresponsibilities = "select * from jobresponsibilities where jobid = $displayid";
                   $result = mysqli_query($conn, $queryresponsibilities);
                   $rows = mysqli_num_rows($result);
                   

                    if ($num > 0) {
                        //echo "stuff in table";

                        while ($row = mysqli_fetch_assoc($display)) {
                            $title = $row['title'];
                            $department = $row["department"];
                            $description = $row["description"];
                            $salary = $row['salary'];
                            echo " <div class=''>
                                <div>
                            <h4 style = 'margin-bottom: 5px'>$title</h4>
                                <a class='button info' style = 'position: relative; left: 250px; bottom: 40px;' href=#>Apply</a>
                                </div>
                            <div><p>Dept : $department</p>
                            <p>Salary : &pound$salary</p>
                                </div>
                            <div class = 'description'><p style = 'margin: 0px'><strong>Description : </strong></p>
                            $description
                            </div>
                            
                          
                            
                        </div>";
                            
                            
                        }
                    } else {
                        echo "stuff not in table";
                    }
                    
                    if ($rows > 0) {
                        while ($rowres = mysqli_fetch_assoc($result)) {
                            $res1 = $rowres['description'];
                            $res2 = $rowres['description'];
                        }
                        
                        echo "<div class = 'description'><p style = 'margin: 0px'><strong>Responsibilities : </strong></p>
                            <ul>
                            <li>$res1</li>
                            <li>$res2</li>
                            </ul>
                            </div>";
                    
                    }
                     mysqli_close($conn);
                    ?>
                    </div>
                </article>
                
                
            </div>
        
        



    </body>
</html>