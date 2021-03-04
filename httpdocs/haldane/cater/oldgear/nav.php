        <!-- Thanks to the University of London Responsive Web Design course for their help with this code 
        https://www.coursera.org/learn/responsive-web-design/home/welcome -->

        <link href="css/bootstrap.css" rel="stylesheet">      
        <link href="css/3sectionpagestyle.css" rel="stylesheet">   
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <nav class = "navbar navbar-default" id="vlenav">
            <div class="container-fluid">
               
                <!-- start of collapsable nav bar -->
                <div class = "navbar-header" id="vlenavbar">                   
                    <button
                        type="button"
                        class="navbar-toggle collapsed"
                        data-toggle = "collapse"
                        data-target = "#vle_nav"
                        aria-expanded="false">
                        open sesame
                        
                    </button>     
                </div>
                <!-- end of collapsable nav bar -->
                
                <!-- start of uncollapsable nav bar -->
                <div class="collapse navbar-collapse" id="vle_nav">
                    <ul class = "nav navbar-nav">
                        <li><a href="index.php" id = "homelink"><img src="img/owl_favicon.jpg" alt="owl favicon" id="owlfavicon"></a>
                        <li><a href = "#">resources</a></li>
                        <li><a href = "#">messenger</a></li>
                        <li><a href = "#">admin</a></li>
                    </ul>
                </div>
                <!-- end of uncollapsable nav bar -->
            </div> 
        </nav>