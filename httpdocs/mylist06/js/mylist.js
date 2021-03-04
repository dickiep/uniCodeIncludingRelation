//alert("before load");


jQuery(document).ready(function(){

	jQuery('#datepick').datepicker();
			
			
});	


window.onload=init;


function init(){
	var button =document.getElementById("addButton");
	button.onclick=addList;
	
	//var item = localStorage.getItem("mylist");
	//alert(item);
	
	//add a test localstorage
	localStorage.setItem("another site data", "this is another sites data example");
	
	myListText.innerHTML = '';
	
	//cycle through data in local storage
	for (var i = 0; i < localStorage.length; i++) {
			
			var temp=localStorage.key(i);
			
			if (temp.match("mytodolist")) {
     		   startList(temp);
			}    		
	}
	
}


function startList(myItem){
		//get the value from the unique key
	   var item = localStorage.getItem(myItem);
	   //create a new <li> tag
	  var newli=document.createElement("li");	
	   //insert the new tag into the top of list    
       myListText.insertBefore(newli, myListText.firstChild);
       //populate the new tag with the data from the localstorage (line33)
        newli.innerHTML=item;
}



function addList(){

	
	var textInput=document.getElementById("myItemInput");
	var myItem = textInput.value;
	
	//date data
    var dateInput=document.getElementById("duedate");
	var myDuedate = dateInput.value;


	if(myItem=="" || myDuedate ==""){
		alert("please enter some text and/or date");
	}
	else
	{
	//get the date	
	var date = new Date();
	//get the time
	var newtime = date.getTime();
	//add the time to the string 'mytodolist' so you get a unique key(identifier)
	var stamp= "mytodolist"+newtime;
	
	var newstamp=JSON.stringify(stamp);

	
	var vli = document.createElement("li"); 		
	myListText.insertBefore(vli, myListText.firstChild);
    vli.innerHTML="<span>"+myItem+"</span>"+"<span style='float:right;'>"+myDuedate+"&nbsp;<a href='#' onclick='deleteme("+newstamp+")'>delete</a></span>";	
    
	textInput.value="";	
	dateInput.value="";
	
	
	
	
	myItem="<span>"+myItem+"</span>"+"<span style='float:right;'>"+myDuedate+"&nbsp;<a href='#' onclick='deleteme("+newstamp+")'>delete</a></span>";
	//store the unique key and value in localstorage
	localStorage.setItem(stamp, myItem);

	}
	
}

function deleteme(item){
 	alert(item);
	localStorage.removeItem(item);
	init();
}



