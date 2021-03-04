<html>
	<head>
		<title>Webslesson Demo - Dynamically Add or Remove input fields in PHP with JQuery</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<br />
			<br />
			<h2 align="center"><a href="http://www.webslesson.info/2016/02/dynamically-add-remove-input-fields-in-php-with-jquery-ajax.html" title="Dynamically Add or Remove input fields in PHP with JQuery">Dynamically Add or Remove input fields in PHP with JQuery</a></h2><br />
			<div class="form-group">
				<form name="add_name" id="add_name">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<!--<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>-->
                                
                                <td>
                                 <div class="form-group name_list">
                                    <label for="q1">Question:</label>
                                    <input type='text' class='form-control quiztitle' maxlength='50' placeholder='What would you like the first question to be?'
                                    name='q1' required='required' size='55'/>
                                <br/>
                                <label>Please enter potential answers and select which one is correct</label>
                                <div class="row">
                                    <input type='text' class='form-control quizchoice' maxlength='30' placeholder='Choice 1'
                                    name='c1a' required='required' size='12'/>
                                <br/>
                                    <input type='text' class='form-control quizchoice' maxlength='30' placeholder='Choice 2'
                                    name='c1b' required='required' size='12'/>
                                <br/>
                                    <select name="a1" class="form-control quizchoice">
                                        <option value="c1a">choice 1</option>
                                        <option value="c1b">choice 2</option>
                                    </select>
                                </div>
                            </div>
                            </td>
                                
								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
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
        $('#dynamic_field').append('<tr id="row'.+i+.'"><td><div class="form-group"><label for="q1">Question:</label><input type='text' class="form-control quiztitle" maxlength="50" placeholder="What would you like the first question to be?"name="q1" required="required" size="55"/><br/><label>Please enter potential answers and select which one is correct</label><div class="row"><input type="text" class="form-control quizchoice" maxlength="30" placeholder="Choice 1"name="c1a" required="required" size="12"/><br/><input type="text" class="form-control quizchoice" maxlength="30" placeholder="Choice 2"name="c1b" required="required" size="12"/><br/><select name="a1" class="form-control quizchoice"><option value="c1a">choice 1</option><option value="c1b">choice 2</option></select></div></div></td><td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"name.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
	
});
</script>




