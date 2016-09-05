	populate_table_main();




  var table_main = $('#table_main').dataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [3,4] } ],
    "aaSorting": []
  });  //Initialize the datatable

function populate_table_main(){ 
	//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/cage/populate_table_main.php",
	  dataType: 'json',      
	  cache: false,
	  success: function(s)
	  {

	    table_main.fnClearTable();      
	    for(var i = 0; i < s.length; i++) 
	    { 
	      table_main.fnAddData
	      ([
	        s[i][1],s[i][2],comma(s[i][3]),
	        '<button data-toggle="tooltip" onclick="client_row_view(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-warning " title="VIEW /Edit"> <i class="fa fa-eye"></i></button>',      	        
	        '<button data-toggle="tooltip" onclick="client_row_del(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>',      
	      ],false); 
	      table_main.fnDraw();

	    }       
	  }  
	}); 
	//ajax end  
} //





function reset(){
	$('#btn_save').val('create');

	$('#f_cage_name').val('');
	$('#f_cage_size').val('');	
	$('#f_price').val('');


	$('#f_cage_name_div').removeClass('has-error');     
	$('#f_cage_size_div').removeClass('has-error');     
	$('#f_price_div').removeClass('has-error');     

}

function validate_form(){
	err = false;



	if($('#f_cage_name').val()==''){
		err = true;
		$('#f_cage_name_div').addClass('has-error');
	}
	else
		$('#f_cage_name_div').removeClass('has-error');	

	if($('#f_price').val()=='' || $('#f_price').val()<=0){
		err = true;
		$('#f_price_div').addClass('has-error');
	}
	else
		$('#f_price_div').removeClass('has-error');	

	if($('#f_cage_size').val()==''){
		err = true;
		$('#f_cage_size_div').addClass('has-error');
	}
	else
		$('#f_cage_size_div').removeClass('has-error');		

	/*if($('#f_contact').val()==''){
		err = true;
		$('#f_contact_div').addClass('has-error');
	}
	else
		$('#f_contact_div').removeClass('has-error');	

	if($('#f_bdate').val()==''){
		err = true;
		$('#f_bdate_div').addClass('has-error');
	}
	else if($('#f_bdate').val()!=''){
		var today = new Date();
		var today = today.getFullYear();
		var f_bdate = $('#f_bdate').val().slice(0,4);
		if( (today-f_bdate) < 18){
			err = true;
			$('#f_bdate_div').addClass('has-error');
			alert('Must be 18 or Above');
		}
	}
	else
		$('#f_bdate_div').removeClass('has-error');	

	if($('#f_gender').val()=='none'){
		err = true;
		$('#f_gender_div').addClass('has-error');
	}
	else
		$('#f_gender_div').removeClass('has-error');	

	if($('#f_address').val()==''){
		err = true;
		$('#f_address_div').addClass('has-error');
	}
	else
		$('#f_address_div').removeClass('has-error');	

	if($('#f_job').val()==''){
		err = true;
		$('#f_job_div').addClass('has-error');
	}
	else
		$('#f_job_div').removeClass('has-error');	

	if( $('#f_mstatus').val()=='married' ){
		if($('#f_spouse').val()==''){
			err = true;
			$('#f_spouse_div').addClass('has-error');
		}
		else
			$('#f_spouse_div').removeClass('has-error');	

		if($('#f_dependents').val()=='' || $('#f_dependents').val()<0){
			err = true;
			$('#f_dependents_div').addClass('has-error');
		}
		else
			$('#f_dependents_div').removeClass('has-error');	

	}
*/


	return err;				
}


function client_row_del(id){

  var choice = confirm("Are you sure you want to Delete?");
  if(choice==true){
  			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/cage/delete.php",
			  data: 'id='+id,
			  dataType: 'json',      
			  cache: false,
			  success: function(s){	}  
			}); 
		  	alert('Success: Deleted ');
		  	reset();
		  	populate_table_main();			
  }		
}

function client_row_view(id){
	reset();
		//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/cage/fetch.php",
	  data: 'id='+id,
	  dataType: 'json',      
	  cache: false,
	  success: function(s){		
	  	$('#btn_save').val(id);

	  	$('#f_cage_name').val(s[0][0]);	 // fetch name to field
	  	$('#f_cage_size').val(s[0][1]);	 // fetch name to field
	  	$('#f_price').val(s[0][2]);	 // fetch name to field			  			  		  			  		  	
	  }  
	}); 
	//ajax end
}

$('#btn_reset').click(function(){ reset(); })

$('#btn_save').click(function(){

	if(validate_form()==true){}
	else{

		var cage_name = $('#f_cage_name').val();
		var cage_size = $('#f_cage_size').val();
		var price = $('#f_price').val();

		var dataString = 'cage_name='+cage_name+'&cage_size='+cage_size+'&price='+price;

		if(this.value=='create'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/cage/create.php",
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
		else{ //UPDATE MODE
			var id = this.value;
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/cage/update.php",
			  data: dataString+'&id='+id,
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
