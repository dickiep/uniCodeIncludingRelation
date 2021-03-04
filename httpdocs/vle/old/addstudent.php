<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css">
        <link rel="stylesheet" href ="styles/mystyles.css">

        
         <!-- JQUERY CDN library -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script>

            $(document).ready(function () {
                //if the firts or second name variables are blank then let the user know this and don't post the for
                
                document.addstudentform.onsubmit=function() {
                  if(document.addstudentform.firstName.value==='') {
                      alert("Please enter your first name");
                      document.addstudentform.firstName.focus();
                      return false;
                }  
                else if(document.addstudentform.lastName.value==='') {
                      alert("Please enter your last name");
                      document.addstudentform.lastName.focus();
                      return false;
                }  
                }
               

            }

        </script>
    </head>
    <body>

        <header>
            <a href="index.php" class="logo">The Priv</a>
            <a href="index.php" class="button">Home</a>
            <span>|</span>
            <a href="liststudents.php" class="button">Students</a>
            <span>|</span>
            <button>Contact</button>
        </header>

        <div class='container'>
            <div class='row'>
                <div class='col-sm-6'>

                    <form action = 'insertstudent.php' method="POST" name = 'addstudentform' id="addstudentform">
                        <fieldset>
                            <legend>Add a Student</legend>
                            <div class='input-group fluid'>
                                <label for='firstName'>First Name</label>
                                <input type='text' value='' id='firstName' name ='firstName'>
                            </div>
                            <div class='input-group fluid'>
                                <label for='lastName'>Last Name</label>
                                <input type='text' value='' id='lastName' name ='lastName'>
                            </div>
                            <div class='input-group fluid'>
                                <label for='email'>Email Address</label>
                                <input type='email' value='' id='email' name ='email'>
                            </div>
                           
                            
                            <div class='input-group fluid'style="display: block;">
                                <label for='startYear'>Start Year</label>
                                <input type='text area' value='' id='startYear' name ='startYear' rows='8' cols='20'>
                            </div>
                            <div class='input-group fluid'style="display: block;">
                                <label for='finishYear'>Finish Year</label>
                                <input type='text' value='' id='finishYear' name ='finishYear'>
                            </div>
                            
                             <div class='input-group fluid' style="float: left; display: block;">
                                <label for='department'>Department</label>
                                <select id = 'department' name='department'>
                                    <option value='Economics'>Economics</option>
                                    <option value='Maths'>Maths</option>
                                </select>
                            </div>

                        </fieldset>

                        <input type='submit' class='tertiary' value='Submit'>

                    </form>

                </div>
            </div>   
        </div>

    </body>
</html>
