<!DOCTYPE html>
<html>

    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <title>My to do list</title>
        <link href="styles/jquery-ui.css" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

        <link rel="stylesheet" href="styles/mylist.css" >



        <script>

            jQuery(document).ready(function () {

                jQuery('#datepick').datepicker({

                    showOn: "button",
                    buttonImage: "img/calendar.gif",
                    buttonImageOnly: true,
                    buttonText: "Select date"

                });

            });

        </script>

    </head>

    <body>
        <div id="container">
            <div id="top">
                <a href='display.php'><div class='addright'>View My 2 Do</div></a>
                <div id="title">My 2 DO List</div>

            </div>

            <div id="main">

                <article>
                    <fieldset id="instruct">
                        <legend>instructions</legend>
                        enter your details in the task field and date, press the 'add item' bar to store a task for you  :)
                    </fieldset>

                    <form name="mylist" method="POST" action="insert.php" enctype="multipart/form-data">
                        <fieldset>
                            <legend>2 DO list</legend>
                            <label for="task">Task:</label> 
                            <input type="text" id="myItemInput" name="myinput" placeholder="Things to do"/>

                            <div>
                                <label for="due date">Date due:</label>
                                <input type="text" id="datepick" name="duedate"/>
                            </div> 

                            <div style="clear:both;"></div>
                            <div>
                                <label for="item type">Type:</label>
                                <select name='itemtype'>
                                    <option value="work">work</option>
                                    <option value="family">family</option>
                                    <option value="misc">misc</option>
                                </select>
                            </div>

                            <div>
                                <label for="item details">Details:</label>
                                <textarea name="mydetails"></textarea>
                            </div>

                            <div>
                                <label for="imageup">image:</label>
                                <input class="button" type="file" name="imageup">
                            </div>
                            
                            <div>
                                <input type="submit" id="addButton" value="add item"
                                       name="newitem">
                            </div>

                        </fieldset>			
                    </form>

                </article> 



                <div style="clear:both;"></div>

            </div>


        </div>
    </body>

</html>
