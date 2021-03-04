<?php
include("conn.php");
?>
<!DOCTYPE HTML>
<html> 
	<head>
		<title>wildlife</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,600|Source+Code+Pro" rel="stylesheet" />
		<!--[if lte IE 8]><script src="html5shiv.js" type="text/javascript"></script><![endif]-->
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>		
		<script src="skel.min.js">
            
            <?php
        include("conn.php");
        ?>
		{
			prefix: 'css/style',
			preloadStyleSheets: true,
			resetCSS: true,
			boxModel: 'border',
			grid: { gutters: 30 },
			breakpoints: {
				wide: { range: '1200-', containers: 1140, grid: { gutters: 50 } },
				narrow: { range: '481-1199', containers: 960 },
				mobile: { range: '-480', containers: 'fluid', lockViewport: true, grid: { collapse: true } }
			}
		}
		</script>
		<script>
			$(function() {

				// Note: make sure you call dropotron on the top level <ul>
				$('#main-nav > ul').dropotron({ 
					offsetY: -10 // Nudge up submenus by 10px to account for padding
				});

			});
		</script>
		<script>
			// DOM ready
			$(function() {
    
			// Create the dropdown base
			$("<select />").appendTo("nav");
   
			// Create default option "Go to..."
			$("<option />", {
				"selected": "selected",
				"value"   : "",
				"text"    : "Menu"
			}).appendTo("nav select");
   
			// Populate dropdown with menu items
			$("nav a").each(function() {
			var el = $(this);
			$("<option />", {
				"value"   : el.attr("href"),
				"text"    : el.text()
			}).appendTo("nav select");
			});
   
			// To make dropdown actually work
			// To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
			$("nav select").change(function() {
				window.location = $(this).find("option:selected").val();
			});
  
			});
		</script>	
	</head>
	<body>
		<div id="header_container">		
		    <div class="container">
			<!-- Header -->
				<div id="header" class="row">
					<div class="4u">
						<div class="transparent">
							<h1><a href="index.html">Wildlife<span class="header_colour">_skies</span></a></h1>
							<h2>learning about wildlife</h2>
					    </div>
					</div>
					
					<nav id="main-nav" class="8u">
						<ul>
							<li><a href="index.php">home</a></li>
							<li><a href="#">about</a></li>
							<li><a href="#">support</a></li>							
							<li>
								<a href="#" class="active" >Learning Topics</a>			
									<ul>
										<li><a href="">Europe</a></li>
										<li><a href="#">North America</a></li>
										<li>
											<a href="#">Africa</a>
												<ul>
													<li><a href="#">Mountains</a></li>
													<li><a class="active" href="plains.php">Plains</a></li>
													<li><a href="#">Jungles</a></li>
													<li><a href="#">Sea</a></li>
													<li><a href="#">River</a></li>
												</ul>
										</li>
									</ul>
							</li>
							<li><a href="#">contact</a></li>
						</ul>
					</nav>
				</div>
			</div>	
        </div>		

		<div id="site_content">
			<div class="container">			
			
				<!-- Features -->			
				<div class="row">									
					<section class="8u">				
						
						<!-- Banner -->								
						<div id="banner">
                         
                                

                            
                            
                            
                            
						</div>
						
						<h1>QUIZ ON AFRICA PLAINS RESULTS</h1>
                        
                  
                         <?php
                         $postname = $_POST['name'];
                         $postemail = $_POST['email'];
                         $postq1 = $_POST['q1'];
                         $postq2 = $_POST['q2'];
                         $postq3 = $_POST['q3'];
                         $postq4 = $_POST['q4'];
                         $postq5 = $_POST['q5'];
                        
                        echo "<h2>$postname results</h2>";
                         
                        $score=0;
                         //judging whether or not the user got the question 1 correct or incorrect
                         if ($postq1 == "African Elephant") {
                         $score++;
                         }
                         if ($postq2 == "cheetah") {
                         $score++;
                         }

                         if ($postq3 == "giraffe") {
                         $score++;
                         }

                         if ($postq4 == "zebra") {
                         $score++;
                         }

                         if ($postq5 == "Elephant") {
                         $score++;
                         }
                         echo 'You scored '.$score.'.';
                        $create_date = date("Y-m-d H:i:s");

                         $insert = "INSERT INTO quizresults06(name,score,submit,email) VALUES
                        ('$postname', $score, '$create_date', '$postemail') ";

                         $result = mysqli_query($conn,$insert) or die(mysqli_error($conn));

                        ?>

                        
                        
                        <?php
                            $query = "SELECT * FROM quizresults";
                            $display = mysqli_query($conn, $query);
                            $num = mysqli_num_rows($display);
                            if ($num > 0){
                             //echo "stuff in table"
                            while($row = mysqli_fetch_assoc($display)){
                             $name = $row['name'];
                             echo "<p>Name: $name</p>";
                            $score = $row['score'];
                                echo "<p>Score: $score</p>";
                                $submit = $row['submit'];
                                echo "<p>Submit time: $submit</p>";

                             }
                            }else{
                             echo "stuff not in table";
                            }
                        
                        

						$name = $_POST['name'];
						$q1 = $_POST['q1'];
						$q2 = $_POST['q2'];
						$q3 = $_POST['q3'];
						$q4 = $_POST['q4'];
						$q5 = $_POST['q5'];



						echo  "<h2>$name results</h2>";
                        
                        $score=0;

						//judging whether or not the user got the question 1 correct or incorrect
						if ($q1 == "African Elephant") {
								
                            $score++;
                                
							}

							if ($q2 == "cheetah") {
								$score++;
							}
							
						if ($q3 == "giraffe") {
							$score++;
							}
					  
						if ($q4 == "zebra") {
							$score++;
							}
						
						if ($q5 == "Elephant") {
							$score++;
						}

						echo 'You scored '.$score.'.';

					?>
		<br/>
		<div class="my">
		<p>Want to see how other student <a href="plainsquizscores.php">scores</a>?</p>	
		</div>
					
						<ul>
							<li></li>
							<li></li>
							<li></li>
						</ul>						
					</section>
					
					<section class="4u">
						<div id="sidebar">
							<section class="12u">
								<h3>Plains</h3>
								<ul>
									<li><a  href="#">Start</a></li>
									<li><a href="#">Wildlife</a></li>
									<li><a href="#">Struggle</a></li>
									<li><a href="#">Early life</a></li>
									<li><a class="active" href="plainsquiz.php">Assessment</a></li>
								</ul>
							</section>
							<section class="12u">
								<h3>Africa</h3>
								<ul>
									<li><a href="#">mountains</a></li>
									<li><a href="#">plains</a></li>
									<li><a href="#">jungle</a></li>
									<li><a href="#">sea</a></li>
									<li><a href="#">river</a></li>
								</ul>
							</section>
							<section class="12u">
								<h3>More Useful Links</h3>
								<ul>
									<li><a href="#">First Link</a></li>
									<li><a href="#">Another Link</a></li>
									<li><a href="#">And Another</a></li>
									<li><a href="#">Last One</a></li>
								</ul>
							</section>
						</div>
					</section>			

				</div>
			</div>
        </div>		
		
			<div class="container">			
			<!-- Footer -->
				<footer>
					<p><img src="images/twitter.png" alt="twitter" />&nbsp;<img src="images/facebook.png" alt="facebook" />&nbsp;<img src="images/rss.png" alt="rss" /></p>
					<p><a href="index.html">Home</a> | <a href="#">Site map</a>  | <a href="#">Support</a> | <a href="#">Contact Us</a></p>
					
				</footer>		
			</div>		
			
	</body>
</html>
