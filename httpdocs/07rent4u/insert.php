<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cutegrids</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/cutegrids.css">
        <link rel="stylesheet" href="css/mystyle.css">

        <!--  For IE8 support include the following Respond.js for support of media queiries and also download and include the REM pollyfill from https://github.com/chuckcarpenter/REM-unit-polyfill for REM support -->
        <!--[if lt IE 9]>
            <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
        <![endif]-->

        <!-- JQUERY CDN library -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <script>

            $(document).ready(function () {

            });

        </script>

    </head>

    <body>

        <div id='head'>
            Rent 4 U
        </div>
        (

        <div class='box myleft'> <p>beds</p> <p> <select name="bedsent"> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> </select> </p> </div>	<div class='box myleft'> <p>price per month</p> <p><input type="text" name="pricessent"/> </p> </div>

        <form method="POST" action="insertrent.php"


              <div class='row'>
                <div class='cute-8-tablet'>
                    <div class='box'>
                        <div class='box myleft'> 
                            <p>please enter address</p> 
                            <p><textarea name="addresssent" class="myaddress"></textarea> </p> 
                        </div>
                        <div class='box myleft'> 
                            <p>type</p> <p><input type="text" name="typesent"/> </p> 
                        </div>	
                        <div class='box myleft'> <p>town</p> <p><input type="text" name="townsent"/> </p>
                        </div>



                    </div>	
                </div>

                <div class='cute-4-tablet'>
                    <div class='house'>

                    </div>
                </div>
            </div>;

            <div class='row'> 
                <div class='cute-8-tablet'> 
                </div>
                <div class='cute-4-tablet'> 
                    <input type="submit" value="insert house" class="button"> 
                </div> 
            </div>
        </form>
        }
        }



    </body>
</html>

