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
						
						<h1>QUIZ ON AFRICA PLAINS</h1>

						<p>Complete the quiz and press the submit button.</p>
					
						
						<form action="plainsquizresults.php" method="post">
							<p>Username: <input type="text" name="name"></p>
							
							<p>1.) What animal is considered the most dangerous of the African big game mammals?<br>
							<input type="radio" name="q1" value="African Elephant"> African Elephant<br>
							<input type="radio" name="q1" value="Cape Buffalo"> Cape Buffalo</p>
							
							<p>2.) Which is the fastest animal on the plains?<br>
							<input type="radio" name="q2" value="hyena"> Hyena<br>
							<input type="radio" name="q2" value="cheetah"> cheetah</p>
							
							<p>3.) What is the tallest animal?<br>
							<input type="radio" name="q3" value="ostrich"> ostrich<br>
							<input type="radio" name="q3" value="giraffe"> giraffe</p>
							
							<p>4.) What animal lives in herds?<br>
							<input type="radio" name="q4" value="jackal"> jackal<br>
							<input type="radio" name="q4" value="zebra"> zebra</p>
							
							<p>5.) What is the only animal to have four knees? <br>
							<input type="radio" name="q5" value="Elephant"> Elephant<br>
							<input type="radio" name="q5" value="Giraffe"> Giraffe</p>
							
							<p><input type="submit" name="submit" value="Submit Quiz"></p>
							
							<p><input type="reset" value="Reset Quiz"></p>
						</form>
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
