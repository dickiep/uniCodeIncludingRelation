<!DOCTYPE html>

<HTML>

    
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css"/>
                 <link rel="stylesheet" href="css/myui.css">
        
                 
    <?php
        include ("conn.php");
            
        $query = "SELECT * FROM books";
            
        $result = mysqli_query($dbc,$query) or die(mysqli_error($dbc));    
    ?>     
        
        
    </head>
    
    
       
        
        <div class="container">
            <!-- nav -->
            
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <img src ="img/mybooks.jpg" alt="All My Books pic"/>
            </div>  
            </div>
			
	
			
            <!-- books -->
            <div class="row">
            <div class="col-sm-12 col-sm-last col-md-normal col-lg-8 col-lg-offset-2">
                
                <?php
                
                //print_r($result);
                
                if(mysqli_num_rows($result)>0) {
                    
                    while($row = mysqli_fetch_assoc($result)){
                        
                        //cycle through the rows of the returned table data
                        $mytitle = $row["title"];
                        echo "<p>$mytitle</p>";
                        
                    }
                    
                } else {
                    
                    echo "<p>no books</p>";
                    
                }
              
                
                ?>
                
                <div class='card'>
                    <div class='section'>
                        <h3>My Book</h3>
                        <p>Content Description</p>
                    </div>   
                </div>
                
                
		
		
                </div>
				
				 
            </div> 
        </div>
			
</HTML>
    
    

