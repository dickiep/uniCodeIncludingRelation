<?php
session_start();

include 'connections/conn.php';

if (isset($_SESSION["student"])){
    $email = $_SESSION["student"];
    $query = "select firstName from vleUsers where emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $first=$row['firstName'];
        }
    }
    
    
} else if (isset($_SESSION["admin"])){
    $email = $_SESSION["admin"];
   $query = "select firstName from vleUsers where emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $first=$row['firstName'];
        }
    }
    
} else if (isset($_SESSION["instructor"])){
    $email = $_SESSION["instructor"];
    $query = "select firstName from vleUsers where emailAddress = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0) {
        while($row=mysqli_fetch_assoc($result)) {
            $first=$row['firstName'];
        }
}
    } else {
    
    header('Location: login.php');
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang ="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src=https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js></script>
    <link rel="stylesheet" href="css/mystyle.css">
    
    
</head>

<body>
    
    <div class="fixed-top">
        <div class = "col-lg-12 myhead">
    </div>
    
        <div class = "col-lg-12 mynav">
            
        <nav class = "navbar navbar-inverse navbar-toggleable-sm mynav fixed-top" id="vlenav">
            <div class="container-fluid">
                <a href = "#" class="btn mybtn" id="menu-toggle">&#9776;</a>
                <a class = "owlfavicon" href = "index.php" >
                <img src="img/owl_favicon.png" alt="owl favicon" class = "owlfavicon">
                </a> 
                <a href="logout.php" id="logout">Logout</a>
            </div> 
        </nav>
    </div>
    </div>

    <div id ="wrapper">
        
        <!--sidemenu-->
        <div id = "sidemenu-wrapper">
            <ul class="sidemenu-nav">
                <h3>&nbsp;&nbsp;Main Menu</h3>
                <li><a href="#">Resources</a></li>
                <li><a href="messenger.php">Messenger</a></li>
                <li><a href="admin.php">Admin</a></li>
            </ul>
        </div>
        
        
        <!--page content-->
        
        <div id="content-wrapper">
            <div class = "container-fluid">
                <div class ="row">
                    <div class = "col-lg-12">
                        
                        <h1>Welcome to vl<i>it</i>e <?php echo"$first"?></h1>
                        <ol class="breadcrumb" id="mybreadcrumb">
                            <li>
                                <a href="index.php">home</a>
                            </li>
                        </ol>
                        
                        <form method="post" action="#" class="inlineForm" enctype="multipart/form-data">
                            <div class="repeatingSection">
                                <a href="#" class="buttonGray buttonRight deleteFight">Delete</a>
                                <input type="hidden" name="fighter_a_id_1" id="fighter_a_id_1" value="" />
                                <input type="hidden" name="fighter_b_id_1" id="fighter_b_id_1" value="" />
                                <input type="hidden" name="winner_id_1" id="winner_id_1" value="" />
                                <div class="formRow">
                                    <label for="fighter_a_1">Fighters</label>
                                    <input type="text" name="fighter_a_1" id="fighter_a_1" value="" /> <span class="formTextExtraCenter">vs</span> <input type="text" name="fighter_b_1" id="fighter_b_1" value="" />
                                </div>
                                <div class="formRow">
                                    <label for="fighter_a_pay_1">Fighter Pay $</label>
                                    <input type="text" name="fighter_a_pay_1" id="fighter_a_pay_1" value="" /> <span class="formTextExtraCenter">vs</span> <input type="text" name="fighter_b_pay_1" id="fighter_b_pay_1" value="" />
                                </div>
                                <div class="formRow">
                                    <label for="winner_1">Winner</label>
                                    <input type="text" name="winner_1" id="winner_1" value="" />
                                </div>
                                <div class="formRow">
                                    <label for="method_1">Method</label>
                                    <input type="text" name="method_1" id="method_1" value="" />
                                </div>
                                <div class="formRow">
                                    <label for="method_type_1">Method Type</label>
                                    <input type="text" name="method_type_1" id="method_type_1" value="" />
                                </div>
                                <div class="formRow">
                                    <label for="round_1">Round</label>
                                    <input type="text" name="round_1" id="round_1" class="fieldSmall" value="" />
                                </div>
                                <div class="formRow">
                                    <label for="time_1">Time</label>
                                    <input type="text" name="time_1" id="time_1" class="fieldSmall" value="" />
                                </div>
                                <div class="formRow">
                                    <label for="fight_number_1">Fight #</label>
                                    <input type="text" name="fight_number_1" id="fight_number_1" class="fieldSmall" value="" />
                                </div>
                            </div>
                            <div class="formRowRepeatingSection">
                                    <button class="buttonGray buttonRight" id="addFight">Add Fight</button>
                                </div>
                            <div class="formRow">
                                <input type="submit" class="submitButton" value="Save Fights" />
                            </div>
                        </form>

                        <script>
                            // Add a new repeating section
                            $('#addFight').click(function(){
                                
                                var currentCount =  $('.repeatingSection').length;
                                var newCount = currentCount+1;
                                var lastRepeatingGroup = $('.repeatingSection').last();
                                var newSection = lastRepeatingGroup.clone();
                                newSection.insertAfter(lastRepeatingGroup);
                                newSection.find("input").each(function (index, input) {
                                    input.id = input.id.replace("_" + currentCount, "_" + newCount);
                                    input.name = input.name.replace("_" + currentCount, "_" + newCount);
                                });
                                newSection.find("label").each(function (index, label) {
                                    var l = $(label);
                                    l.attr('for', l.attr('for').replace("_" + currentCount, "_" + newCount));
                                });
                                return false;
                            });

                            // Delete a repeating section
                            $('.deleteFight').live('click',function(){
                                $(this).parent('div').remove();
                                return false;
                            });

                            //I changed the delete handler, to use .live() instead, so that the handler would also be attached to newly created copies of //that button. Now, if you're using jquery > 1.7 you should use .on()

                            The on() version would be:

                            // Delete a repeating section
                            $(document).on('click','.deleteFight',function(){
                                $(this).parent('div').remove();
                                return false;
                            });
                        </script> 
                        
                    </div>     
                </div>
            </div>
        </div>
    </div>
    
    <!--script to toggle the side menu-->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            
            $("#wrapper").toggleClass("menuDisplayed");
        });
    </script>
    
 

</body>
</html>