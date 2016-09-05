	populate_table_main();
	populate_species_dropdown();	

  var table_main = $('#table_main').dataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [] } ],
    "aaSorting": []
  });  //Initialize the datatable

function populate_table_main(){ 
	//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/pet/populate_table_main.php",
	  dataType: 'json',      
	  cache: false,
	  success: function(s)
	  {
		populate_owner_dropdown();

		

	    table_main.fnClearTable();      
	    for(var i = 0; i < s.length; i++) 
	    { 
	      table_main.fnAddData
	      ([
	        s[i][1],s[i][2],s[i][3],s[i][4],s[i][5],s[i][6],s[i][7],s[i][8],s[i][9],
	        '<button data-toggle="tooltip" onclick="client_row_view(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-warning " title="VIEW /Edit"> <i class="fa fa-eye"></i></button>',      	        
	        '<button data-toggle="tooltip" onclick="client_row_del(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>',      
	      ],false); 
	      table_main.fnDraw();

	    }       
	  }  
	}); 
	//ajax end  
} //

function populate_owner_dropdown(){ 
  //ajax now
  $.ajax ({
    type: "POST",
    url: "../../model/client/populate_table_main.php",
    dataType: 'json',      
    cache: false,
    success: function(s)
    {
      $('#f_owner').empty();
      $('#f_owner').html('<option selected="selected" value="none">--SEARCH OWNER--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_owner').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
      }       
    }  
  }); 
  //ajax end  
} 

	function populate_species_dropdown(){
			  //ajax now
	  $.ajax ({
	    type: "POST",
	    url: "../../model/species/populate_table_main.php",
	    dataType: 'json',      
	    cache: false,
	    success: function(s)
	    {
	      $('#f_species').empty();
	      $('#f_species').html('<option selected="selected" value="none">--SEARCH SPECIES--</option>');
	      for(var i = 0; i < s.length; i++) { 
	        $('#f_species').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
	      }       
	    }  
	  });
	  //ajax end
	} //


function getBreed(species_id){
var species_id = species_id; 
$('#f_breed').empty();
  //ajax now
  $.ajax ({
    type: "POST",
    url: "../../model/breed/getBreed.php",
    data: 'species_id='+species_id,
    dataType: 'json',      
    cache: false,
    success: function(s)
    {
      $('#f_breed').empty();
      $('#f_breed').html('<option selected="selected" value="none">--SEARCH BREED--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_breed').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
      }       
    }  
  });
  //ajax end
} //


// function getState(val) {

//   $.ajax({
//   type: "POST",
//   url: "../../model/breed/populate_table_main_2.php",
//   data:'species_id='+val,
//   success: function(data){
//     $("#breed").html(data);
//     console.log(val);
//   }
//   });
// }		

function reset(){
	
	$('#btn_save').val('create');
	$('#f_petname').val('');
	$('#f_breed').val('none');
	$('#f_owner').val('none');
	$('#f_species').val('none');
	$('#f_color').val('');
	$('#f_markings').val('');
	$('#f_birthdate').val('');
	$('#f_sex').val('');

	$('#f_petname_div').removeClass('has-error');     
	$('#f_breed_div').removeClass('has-error');     
	$('#f_owner_div').removeClass('has-error');     
	$('#f_species_div').removeClass('has-error');    
	$('#f_color_div').removeClass('has-error');     
	$('#f_markings_div').removeClass('has-error');
	$('#f_birthdate_div').removeClass('has-error');  
	$('#f_sex_div').removeClass('has-error');     
}

function validate_form(){
	err = false;

	if($('#f_owner').val()=='' || $('#f_owner').val()=='none'){
		err = true;
		$('#f_owner_div').addClass('has-error');
	}
	else
		$('#f_owner_div').removeClass('has-error');	


	if($('#f_petname').val()==''){
		err = true;
		$('#f_petname_div').addClass('has-error');
	}
	else
		$('#f_petname_div').removeClass('has-error');	


	if($('#f_species').val()=='' || $('#f_species').val()=='none'){
		err = true;
		$('#f_species_div').addClass('has-error');
	}
	else
		$('#f_species_div').removeClass('has-error');		


	if($('#f_breed').val()=='' || $('#f_breed').val()=='none'){
		err = true;
		$('#f_breed_div').addClass('has-error');
	}
	else
		$('#f_breed_div').removeClass('has-error');		

	if($('#f_color').val()==''){
		err = true;
		$('#f_color_div').addClass('has-error');
	}
	else
		$('#f_color_div').removeClass('has-error');	

	if($('#f_markings').val()==''){
		err = true;
		$('#f_markings_div').addClass('has-error');
	}
	else
		$('#f_markings_div').removeClass('has-error');	

	if($('#f_birthdate').val()==''){
		err = true;
		$('#f_birthdate_div').addClass('has-error');
	}
	else
		$('#f_birthdate_div').removeClass('has-error');	


	if($('#f_sex').val()=='' || $('#f_sex').val()=='none'){
		err = true;
		$('#f_sex_div').addClass('has-error');
	}
	else
		$('#f_sex_div').removeClass('has-error');	
	
	return err;				
}


function client_row_del(id){

  var choice = confirm("Are you sure you want to Delete?");
  if(choice==true){
  			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/pet/delete.php",
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
	  url: "../../model/pet/fetch.php",
	  data: 'id='+id,
	  dataType: 'json',      
	  cache: false,
	  success: function(s){		
	  	$('#btn_save').val(id);

	  	$('#opt'+s[0][0]).prop('selected',true);
	  	$('#f_petname').val(s[0][1]);	 // fetch name to breedname			  			  	
	    $('#opt'+s[0][2]).prop('selected',true); 
	    $('#opt'+s[0][3]).prop('selected',true); //selected dropdown
	  	$('#f_color').val(s[0][4]);	 // fetch name to breedname			  			  	
	  	$('#f_markings').val(s[0][5]);	 // fetch name to breedname			  			  	
	  	$('#f_birthdate').val(s[0][6]);	 // fetch name to breedname			  			  	
	  	$('#f_sex').val(s[0][7]);	 // fetch name to breedname			  			  	  			  		  
	  }  
	}); 
	//ajax end
}

$('#btn_reset').click(function(){ reset(); })

$('#btn_save').click(function(){

	if(validate_form()==true){}
	else{

		var owner = $('#f_owner').val();
		var pet_name = $('#f_petname').val();
		var species = $('#f_species').val();
		var breed = $('#f_breed').val();
		var color = $('#f_color').val();
		var markings = $('#f_markings').val();
		var birthdate = $('#f_birthdate').val();
		var sex = $('#f_sex').val();

		var dataString = 'owner='+owner+'&pet_name='+pet_name+'&species='+species+'&breed='+breed+'&color='+color+'&markings='+markings+'&birthdate='+birthdate+'&sex='+sex;

		if(this.value=='create'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/pet/create.php",
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
			  url: "../../model/pet/update.php",
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
