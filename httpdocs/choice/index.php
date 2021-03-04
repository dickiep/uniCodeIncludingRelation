<html>
	<head>
		<title>Webslesson Demo - Dynamically Add or Remove input fields in PHP with JQuery</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="choice.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<br />
			<br />
			<h2 align="center"><a href="http://www.webslesson.info/2016/02/dynamically-add-remove-input-fields-in-php-with-jquery-ajax.html" title="Dynamically Add or Remove input fields in PHP with JQuery">Dynamically Add or Remove input fields in PHP with JQuery</a></h2><br />
			<div class="form-group">
				<form name="add_choice" id="add_choice">
					<div class="table-responsive">
						<div id="dynamic_field">
							<div class="row">
                                <label>Please enter as many answer choices as you would like and remember to check the correct answer</label>
								<div class="col-md-9 col-12"><input type="text" name="choice[]" placeholder="Choice #1" class="form-control choice_list enterchoice" size="55"/>
                                <input class="form-check-input correctanswer" type="checkbox" value="1" id="check1">
								<button type="button" name="add" id="add" class="btn btn-success addanother">Add Another Choice</button>
                                </div>
                            </div>
							
						</div>
						<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
					</div>
				</form>
			</div>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-9 col-12"><input type="text" name="choice[]" placeholder="Choice #'+i+'" class="form-control choice_list enterchoice" size="55"/><input class="form-check-input correctanswer" type="checkbox" value="'+i+'" id="check'+i+'"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove addanother">X</button></div></div>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"choice.php",
			method:"POST",
			data:$('#add_choice').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_choice')[0].reset();
			}
		});
	});
	
});
</script>




