/*
	This is the CONTROLLER for USER
	this will control the logic, controls, flows. actions, in the page/module of USER
*/	


	//onload, will call function populate_table_main(), so that it will
	//populate/load/fill_up the Table of USER with data/contents
	populate_table_main();



// Initialize the Table User to become a DataTabe using gem DataTables
// with configuration,  setting/targeting column 3, (starting count with 0) to remove the sort key
  var table_main = $('#table_main').dataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [3] } ],
    "aaSorting": []
  });  //Initialize the datatable


// function of populating,loading,filling up the table with data of Users
// this is called at the first/on-load of controller so that when opening the page, 
// so that it's been called already and populated the table
function populate_table_main(){ 
	//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/users/populate_table_main.php",
	  dataType: 'json',      
	  cache: false,
	  success: function(s)
	  {
	    table_main.fnClearTable();      
	    var enability='enabled';  
	    for(var i = 0; i < s.length; i++) 
	    { 
	    	if(s[i][2]=='inactive'){enability='disabled'}
	      table_main.fnAddData
	      ([
	        s[i][0],s[i][1],s[i][2],
	        '<button data-toggle="tooltip" onclick="user_row_del(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn btn-danger" title="Delete" '+enability+'> <i class="fa fa-trash"></i> Delete </button>',      
	      ],false); 
	      table_main.fnDraw();

	    }       
	  }  
	}); 
	//ajax end  
} //



//will clear all fields and revert back the save type if (Create Mode or Update Mode)
function reset(){
	$('#btn_save').val('create');
	$('#modal_user_name').val('');
	$('#modal_user_password').val('');
	$('#modal_user_type').val('none');		
	$('#modal_user_name_div').removeClass('has-error');
	$('#modal_user_password_div').removeClass('has-error');
	$('#modal_user_type_div').removeClass('has-error');		
}

// validates the form, edit it for own validation
// when validate triggers,  use bootsrap class to change the color of fields using
// using the id tag of the div, change class to make it's color differnt
// finally return the value if whether TRUE or FALSE for the function of saving record
function validate_form(){
	err = false;

	if($('#modal_user_name').val()==''){
		err = true;
		$('#modal_user_name_div').addClass('has-error');
	}
	else
		$('#modal_user_name_div').removeClass('has-error');		

	if($('#modal_user_password').val()==''){
		err = true;
		$('#modal_user_password_div').addClass('has-error');
	}
	else
		$('#modal_user_password_div').removeClass('has-error');		

	if($('#modal_user_type').val()=='none'){
		err = true;
		$('#modal_user_type_div').addClass('has-error');
	}
	else
		$('#modal_user_type_div').removeClass('has-error');	

	return err;				
}

// Will Remove Record
function user_row_del(id){
	// choice is confirmation dialog
  var choice = confirm("Are you sure you want to Delete?");
  if(choice==true){	
		//ajax now
		$.ajax ({
		  type: "POST",
		  url: "../../model/users/delete.php",
		  data: 'id='+id,
		  dataType: 'json',      
		  cache: false,
		  success: function(s){}  
		}); 
		//ajax end  
	  	alert('Success: Deleted ');
	  	reset();
	  	populate_table_main();		
	}
}

// will call reset function
$('#btn_reset').click(function(){ reset(); })

$('#btn_save').click(function(){

	if(validate_form()==true){}
	else{

		var user_name = $('#modal_user_name').val();
		var user_password = $('#modal_user_password').val();
		var user_type = $('#modal_user_type').val();	
		var dataString = 'user_name='+user_name+'&user_password='+user_password+'&user_type='+user_type;
		if(this.value!='update'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/users/create.php",
			  data: dataString,
			  dataType: 'json',      
			  cache: false,
			  success: function(s){}  
			}); 
			//ajax end  
		  	alert('Saved');
		  	reset();
		  	populate_table_main();			
		}
		else if(this.value=='update'){ //UPDATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/users/update.php",
			  data: dataString,
			  dataType: 'json',      
			  cache: false,
			  success: function(s){}  
			}); 
			//ajax end  
		  	alert('Updated');
		  	reset();
		  	populate_table_main();						
		}
	}

})