<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/sidemenustyle.css">



    </head>
    <body>
        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
         <script>
            $(document).ready(function () {

                $("#sidemenu").mCustomScrollbar({
                    theme: "minimal"
                });

                // when opening the sidebar
                $('#sidemenuCollapse').on('click', function () {
                    // open sidebar
                    $('#sidemenu').addClass('active');
                    // fade in the overlay
                    //$('.overlay').fadeIn();
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });


                // if dismiss or overlay was clicked
                $('#close, .overlay').on('click', function () {
                    // hide the sidebar
                    $('#sidemenu').removeClass('active');
                    // fade out the overlay
                    //$('.overlay').fadeOut();
                });
            });


        </script>
        
        
        <div class ="wrapper">
            <nav id ="sidemenu">

                <!-- button to close the side menu -->
                <div id="close">
                    <i class="glyphicon glyphicon-arrow-left"></i>  
                </div>

                <div class="sidemenu-header">
                    <h3>Side Menu</h3>
                </div>

                <!-- Sidemenu Links -->
                <ul class="list-unstyled components">
                    <li><a href="#">View your personal details</a></li>
                    <li><a href="#">View your class resources</a></li>
                    <li><a href="#">Send a message</a></li>
                </ul>

                <div id="content">
                    <button type="button" id="sidemenuCollapse" class="btn btn-info navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                        Toggle Sidebar
                    </button>

                    <div>
                        <div class="overlay"></div>
                    </div>

            </nav>
        </div>

    </body>
</html>



