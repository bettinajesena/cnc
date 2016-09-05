	populate_table_main();




  var table_main = $('#table_main').dataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [2,3] } ],
    "aaSorting": []
  });  //Initialize the datatable

function populate_table_main(){ 
	//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/unit/populate_table_main.php",
	  dataType: 'json',      
	  cache: false,
	  success: function(s)
	  {

	    table_main.fnClearTable();      
	    for(var i = 0; i < s.length; i++) 
	    { 
	      table_main.fnAddData
	      ([
	        s[i][1],s[i][2],
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

	$('#f_unit_name').val('');
	$('#f_abbreviation').val('');


	$('#f_unit_name_div').removeClass('has-error');     
	$('#f_abbreviation_div').removeClass('has-error');     
	$('#f_unit_type_div').removeClass('has-error');     

}

function validate_form(){
	err = false;



	if($('#f_unit_name').val()==''){
		err = true;
		$('#f_unit_name_div').addClass('has-error');
	}
	else
		$('#f_unit_name_div').removeClass('has-error');	

	if($('#f_abbreviation').val()==''){
		err = true;
		$('#f_abbreviation_div').addClass('has-error');
	}
	else
		$('#f_abbreviation_div').removeClass('has-error');	

	// if($('#f_unit_type').val()=='' || $('#f_unit_type').val()=='none'){
	// 	err = true;
	// 	$('#f_unit_type_div').addClass('has-error');
	// }
	// else
	// 	$('#f_unit_type_div').removeClass('has-error');		

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

function showSpouse(get){
	$('#f_spouse_div').removeClass('has-error');     
	$('#f_dependents_div').removeClass('has-error');  	
	if(get=='married'){$('#spouse_div').css('display','block');}
	else{ $('#spouse_div').css('display','none'); }
}

function client_row_del(id){

  var choice = confirm("Are you sure you want to Delete?");
  if(choice==true){
  			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/unit/delete.php",
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
	  url: "../../model/unit/fetch.php",
	  data: 'id='+id,
	  dataType: 'json',      
	  cache: false,
	  success: function(s){		
	  	$('#btn_save').val(id);

	  	$('#f_unit_name').val(s[0][0]);	 // fetch name to field
	  	$('#f_abbreviation').val(s[0][1]);	 // fetch name to field
	  	$('#f_unit_type').val(s[0][2]);	 // fetch name to field
			  			  		
  			  		
	  	
	  }  
	}); 
	//ajax end
}

$('#btn_reset').click(function(){ reset(); })

$('#btn_save').click(function(){

	if(validate_form()==true){}
	else{

		var unit_name = $('#f_unit_name').val();
		var abbreviation = $('#f_abbreviation').val();
	

		var dataString = 'unit_name='+unit_name+'&abbreviation='+abbreviation;

		if(this.value=='create'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/unit/create.php",
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
			  url: "../../model/unit/update.php",
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
