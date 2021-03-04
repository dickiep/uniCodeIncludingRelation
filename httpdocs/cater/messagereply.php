<!--php to send a reply-->
                        
                        <?php
 
                                session_start();

                                
                                include 'connections/conn.php';

                                if (isset($_SESSION["student"])){
                                    $emailStudent = $_SESSION["student"];
                                    
                                    $query = "select id from vleUsers where emailAddress = '$emailStudent'";
                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                    if(mysqli_num_rows($result)>0) {
                                        while($row=mysqli_fetch_assoc($result)) {
                                            $messageFrom = $row['id'];
                                        }
                                    }


                                } else if (isset($_SESSION["admin"])){
                                    $emailAdmin = $_SESSION["admin"];
                                    
                                   $query = "select id from vleUsers where emailAddress = '$emailAdmin'";
                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                    if(mysqli_num_rows($result)>0) {
                                        while($row=mysqli_fetch_assoc($result)) {
                                            $messageFrom = $row['id'];
                                        }
                                    }

                                } else if (isset($_SESSION["instructor"])){
                                    $emailInstructor = $_SESSION["instructor"];
                                    
                                    $query = "select id from vleUsers where emailAddress = '$emailInstructor'";
                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                    if(mysqli_num_rows($result)>0) {
                                        while($row=mysqli_fetch_assoc($result)) {
                                            $messageFrom = $row['id'];
                                        }
                                }
                                    }
                                
                                $postMessage = mysqli_real_escape_string($conn, $_POST['reply']);
                                $postReplyThreadID = mysqli_real_escape_string($conn, $_POST['threadID']);
                                
                                $_SESSION['reply'] = $postMessage;
                                $_SESSION['threadID'] = $postReplyThreadID;
                                
                                $replyThreadID = $_SESSION['threadID'];
                                $messageReply = $_SESSION['reply'];
                                    
                                $dateTime = strtotime("now");
                                $time = date("Y-m-d h:i:s A T",$dateTime);
                                
                                
                                if ( (!empty($postMessage)) ) {
                                    $messagereplyquery="insert into vleDBMessages (messageFrom, threadID, message, timeSent) values ($messageFrom, $replyThreadID, '$messageReply', '$time')";
                                    
                                    $messagereplyresult = mysqli_query($conn, $messagereplyquery) or die(mysqli_error($conn));
                                    mysqli_close($conn);
                                    header('Location: modulediscussionboard.php');
                                    return;

                                   
                                }
                                
                            
                            
                            
                           
                        ?>