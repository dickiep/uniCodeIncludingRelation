<?php
include('connect.php');
?>
<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>plume UI</title>

<!-- Import siimple jquery UI libaray--> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 
 

<!-- Import siimple plume CSS framework-->
<link rel="stylesheet" href="siimple/plume.css">
<script type="text/javascript" src="siimple/plume.js"></script>

<!-- Import siimple CSS framework-->
<link rel="stylesheet" href="siimple/siimple.min.css">

<!-- Import custom CSS framework-->
<link rel="stylesheet" href="styles/myplume.css" >
<script>

jQuery(document).ready(function(){

	jQuery('#datepick').datepicker({

	  showOn: "button",
      buttonImage: "img/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date",
      dateFormat:"yy-mm-dd"	
	  
	 } );
			
});	

</script>
<!-- Default style -->
<style>

</style>
		
    </head>
    <body>
        <div class="plume plume--js">
  <div class="plume-sidebar">
    <div class="plume-menu">
      <div class="plume-menu-group">GROUP 1</div>
      <div class="plume-menu-item">Link 1 in the group</div>
      <div class="plume-menu-item">Link 2 in the group</div>
      <div class="plume-menu-item">Link 3 in the group</div>
      <div class="plume-menu-item">Link 4 in the group</div>
      <div class="plume-menu-group">GROUP 2</div>
      <div class="plume-menu-item">Link 1 in the group</div>
      <div class="plume-menu-item">Link 2 in the group</div>
      <div class="plume-menu-item">Link 3 in the group</div>
      <div class="plume-menu-item">Link 4 in the group</div>
    </div>
  </div>
  <div class="plume-toggle"><span></span></div>
  <div class="plume-header">
    <div class="plume-header-title">This is the title</div>
    <div class="plume-header-subtitle">This is the subtitle</div>
  </div>
  <div class="plume-content">
    <div class="plume-heading1">Heading 1</div>
	<p class="siimple-p">
					<div>
					<label for="due date">Date due:</label> 
					<input type="text" id="datepick" class="siimple-input" name="duedate" readonly/>
				</div>	
	</p>			
    <p class="siimple-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut accumsan turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id enim sit amet tortor euismod fermentum in ut sem. Etiam fringilla nibh maximus molestie tempor. Fusce varius erat ac eros tristique feugiat. Ut quam velit, interdum in vehicula et, rhoncus sit amet erat. Maecenas vitae orci sed tellus aliquam finibus. Fusce pulvinar sem nec justo tincidunt gravida. Fusce nibh orci, tempor nec pharetra at, malesuada vitae tellus. Suspendisse sed rhoncus orci. Proin tempor velit vitae libero vulputate porttitor. Duis nec porta risus. Nam consectetur nisi gravida justo molestie pulvinar. Duis quis hendrerit tellus.</p>

    <div class="plume-heading2">Heading 2</div>
    
    <p class="siimple-p">Ut justo ante, pellentesque in volutpat a, porta sit amet odio. Cras et neque gravida nisl volutpat placerat sed bibendum nibh. Pellentesque felis sapien, venenatis eget ex eget, mattis volutpat tellus. Cras augue erat, bibendum ac mi sed, elementum congue urna. Sed id lectus nec diam aliquam malesuada. Donec ut porta dolor, sit amet vulputate leo. Morbi maximus pellentesque congue. Nunc pulvinar sodales quam eu congue. Curabitur eu commodo metus. Aliquam porttitor at sapien vel malesuada. Quisque gravida, nisl dignissim faucibus finibus, purus neque sagittis leo, vitae ullamcorper dui magna at turpis. Nulla sed ante tortor. Aenean aliquam neque dolor, sed posuere tortor malesuada in.</p>

    <div class="plume-heading3">Heading 3</div>
   
    <p class="siimple-p">Ut eu diam sollicitudin, blandit eros nec, fermentum turpis. Praesent blandit elit non ante pulvinar venenatis. Integer sodales elit dictum, vulputate orci et, iaculis magna. Vestibulum sed dignissim quam. Vivamus ultrices libero in sapien egestas finibus. Phasellus eget faucibus mauris. Aliquam pretium diam at turpis sagittis, quis faucibus nulla pulvinar. Maecenas sit amet nibh non velit tempor sollicitudin. Suspendisse potenti. Aliquam erat volutpat. Aliquam sodales interdum orci. Nam id sollicitudin ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque elementum id nibh ut blandit. Vestibulum finibus quis turpis at tempus. Curabitur et ex egestas, aliquam est a, convallis leo.</p>
   
    <div class="plume-heading3">Heading 3</div>
    <p class="siimple-p">Ut justo ante, pellentesque in volutpat a, porta sit amet odio. Cras et neque gravida nisl volutpat placerat sed bibendum nibh. Pellentesque felis sapien, venenatis eget ex eget, mattis volutpat tellus. Cras augue erat, bibendum ac mi sed, elementum congue urna. Sed id lectus nec diam aliquam malesuada. Donec ut porta dolor, sit amet vulputate leo. Morbi maximus pellentesque congue. Nunc pulvinar sodales quam eu congue. Curabitur eu commodo metus. Aliquam porttitor at sapien vel malesuada. Quisque gravida, nisl dignissim faucibus finibus, purus neque sagittis leo, vitae ullamcorper dui magna at turpis. Nulla sed ante tortor. Aenean aliquam neque dolor, sed posuere tortor malesuada in.</p>
	
	<div class="siimple-grid">
	  <div class="siimple-grid-row">
		<div class="cus-grid siimple-grid-col siimple-grid-col--12">TWELVE</div>
	  </div>
	  <div class="siimple-grid-row">
		<div class="cus-grid siimple-grid-col siimple-grid-col--1">ONE</div>
		<div class="cus-grid siimple-grid-col siimple-grid-col--11">ELEVEN</div>
	  </div>
	  <div class="siimple-grid-row">
		<div class="cus-grid siimple-grid-col siimple-grid-col--8">eight</div>
		<div class="cus-grid siimple-grid-col siimple-grid-col--4">four</div>
	  </div>
	</div>
	
	
  </div>
  
  <div class="plume-navigation">
    <div class="plume-navigation-prev">Prev chapter</div>
    <div class="plume-navigation-next">Next chapter</div>
  </div>
  
  <div class="plume-footer" align="center">
    Built using plume.
  </div>
  
</div>			
    </body>
</html>
