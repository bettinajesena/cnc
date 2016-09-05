
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
	  url: "../../model/registration/populate_table_main.php",
	  dataType: 'json',      
	  cache: false,
	  success: function(s)
	  {

	  	//populate_species_dropdown();
	  	//populate_breed_dropdown();
	    table_main.fnClearTable();      
	    for(var i = 0; i < s.length; i++) 
	    { 
	      table_main.fnAddData
	      ([
	        s[i][1],s[i][2],s[i][3],s[i][4],s[i][5],
	        '<button data-toggle="tooltip" onclick="registration_row_view(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-warning " title="VIEW /Edit"> <i class="fa fa-eye"></i></button>',      	        
	        '<button data-toggle="tooltip" onclick="registration_row_del(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>', 
	      ],false); 
	      table_main.fnDraw();

	    }       
	  }  
	}); 
	//ajax end  
} //

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

function populate_species1_dropdown(){ 
  //ajax now
  $.ajax ({
    type: "POST",
    url: "../../model/species/populate_table_main.php",
    dataType: 'json',      
    cache: false,
    success: function(s)
    {
      $('#f_species1').empty();
      $('#f_species1').html('<option selected="selected" value="none">--SEARCH SPECIES--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_species1').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
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

function getBreed1(species_id){
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
      $('#f_breed1').empty();
      $('#f_breed1').html('<option selected="selected" value="none">--SEARCH BREED--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_breed1').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
      }       
    }  
  });
  //ajax end
} //

/*function populate_breed_dropdown(){ 
  //ajax now
  $.ajax ({
    type: "POST",
    url: "../../model/breed/populate_table_main.php",
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
*/

function reset(){
	$('#btn_save').val('create');
	$('#f_name').val('');
	$('#f_contact').val('');
	$('#f_bdate').val('');
	$('#f_gender').val('none');
	$('#f_address').val('');

	$('#f_petname').val('');
	$('#f_species').val('');
	$('#f_breed').val('');
	$('#f_color').val('');
	$('#f_markings').val('');
	$('#f_birthdate').val('');
	$('#f_sex').val('');

	$('#f_name_div').removeClass('has-error');     
	$('#f_contact_div').removeClass('has-error');     
	$('#f_bdate_div').removeClass('has-error');     
	$('#f_gender_div').removeClass('has-error');
	$('#f_address_div').removeClass('has-error'); 

	$('#f_petname_div').removeClass('has-error'); 
	$('#f_species_div').removeClass('has-error'); 
	$('#f_breed_div').removeClass('has-error'); 
	$('#f_color_div').removeClass('has-error'); 
	$('#f_markings_div').removeClass('has-error'); 
	$('#f_birthdate_div').removeClass('has-error'); 
	$('#f_sex_div').removeClass('has-error');    
}

function reset1(){


	$('#f_petname1').val('');
	$('#f_species1').val('');
	$('#f_breed1').val('');
	$('#f_color1').val('');
	$('#f_markings1').val('');
	$('#f_birthdate1').val('');
	$('#f_sex1').val('');

	$('#f_petname1_div').removeClass('has-error'); 
	$('#f_species1_div').removeClass('has-error'); 
	$('#f_breed1_div').removeClass('has-error'); 
	$('#f_color1_div').removeClass('has-error'); 
	$('#f_markings1_div').removeClass('has-error'); 
	$('#f_birthdate1_div').removeClass('has-error'); 
	$('#f_sex1_div').removeClass('has-error');    
}

function validate_form(){
	err = false;
	var x= $('#f_contact').val();


	if($('#f_name').val()==''){
		err = true;
		$('#f_name_div').addClass('has-error');
	}
	else
		$('#f_name_div').removeClass('has-error');		

	if($('#f_contact').val()==''){
		err = true;
		$('#f_contact_div').addClass('has-error');
	}

	else if(! /^[0-9]{11}$/.test(x)){
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

	if($('#f_sex').val()=='none'){
		err = true;
		$('#f_sex_div').addClass('has-error');
	}
	else
		$('#f_sex_div').removeClass('has-error');		


	return err;				
}

function registration_row_del(id){

  var choice = confirm("Are you sure you want to Delete?");
  if(choice==true){
  			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/registration/delete.php",
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

function registration_row_view(id){
	reset();
		//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/registration/fetch.php",
	  data: 'id='+id,
	  dataType: 'json',      
	  cache: false,
	  success: function(s){		
	  	$('#btn_save').val(id);

	  	$('#f_name').val(s[0][0]);	$('#f_contact').val(s[0][1]);	$('#f_bdate').val(s[0][2]);
	  	$('#f_gender').val(s[0][3]);	$('#f_address').val(s[0][4]);

	  	$('#f_petname').val(s[0][5]); $('#f_species').val(s[0][6]); $('#f_breed').val(s[0][7]);
	  	$('#f_color').val(s[0][8]); $('#f_markings').val(s[0][9]); $('#f_birthdate').val(s[0][10]);
	  	$('#f_sex').val(s[0][11]);	

	  }  
	}); 
	//ajax end
}

$('#btn_reset').click(function(){ reset(); })

$('#btn_save').click(function(){

	if(validate_form()==true){}
	else{

		var ownerid=$('#client_id').val();
		var oname = $('#f_name').val();
		var ocontact = $('#f_contact').val();
		var obdate = $('#f_bdate').val();
		var ogender = $('#f_gender').val();
		var oaddress = $('#f_address').val();

		var pet_name = $('#f_petname').val();
		var species = $('#f_species').val();
		var breed = $('#f_breed').val();
		var color = $('#f_color').val();
		var markings = $('#f_markings').val();
		var birthdate = $('#f_birthdate').val();
		var sex = $('#f_sex').val();
		
		var dataString ='id='+ownerid+'&clients_name='+oname+'&client_contact='+ocontact+'&clients_bdate='+obdate;
		dataString+='&clients_gender='+ogender+'&clients_address='+oaddress+'&pet_name='+pet_name+'&species='+species+'&breed='+breed+'&color='+color+'&markings='+markings+'&birthdate='+birthdate+'&sex='+sex;

		if(this.value=='create'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/registration/create.php",
			  data: dataString,
			  dataType: 'json',      
			  cache: false,
			  success: function(s){}  
			}); 
			//ajax end 
			
		  	alert('Saved');
		  	populate_table_main();			
		}
		else{ //UPDATE MODE
			var id = this.value;
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/registration/update.php",
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


$('#btn_add').click(function(){
var myBookId = $('#f_name').val();
 $(".modal-body #bookId").val( myBookId );
 populate_species1_dropdown();
})

$('#btn_okay').click(function(){

		var ownerid=$('#client_id').val();
		var owner = $('#f_name').val();
		var pet_name = $('#f_petname1').val();
		var species = $('#f_species1').val();
		var breed = $('#f_breed1').val();
		var color = $('#f_color1').val();
		var markings = $('#f_markings1').val();
		var birthdate = $('#f_birthdate1').val();
		var sex = $('#f_sex1').val();
		
		var dataString = 'owner='+ownerid+'&pet_name='+pet_name+'&species='+species+'&breed='+breed+'&color='+color+'&markings='+markings+'&birthdate='+birthdate+'&sex='+sex;

		if(this.value=='add'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/pet/create1.php",
			  data: dataString,
			  dataType: 'json',      
			  cache: false,
			  success: function(s){}  
			}); 
			//ajax end 
		  	alert('Saved');	
		  	reset1();	
		
	}
})
