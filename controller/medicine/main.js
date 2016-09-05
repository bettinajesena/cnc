	populate_table_main();


  var table_main = $('#table_main').dataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [] } ],
    "aaSorting": []
  });  //Initialize the datatable

function populate_table_main(){ 
	//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/medicine/populate_table_main.php",
	  dataType: 'json',      
	  cache: false,
	  success: function(s)
	  {
		populate_category_dropdown();
		populate_packaging_dropdown();
		populate_dosage_dropdown();		
		populate_unit_dropdown();


	    table_main.fnClearTable();      
	    for(var i = 0; i < s.length; i++) 
	    { 
	      table_main.fnAddData
	      ([
	        s[i][1],s[i][2],s[i][3],s[i][4],s[i][5],s[i][6],s[i][7],comma(s[i][8]),s[i][9],
	        '<button data-toggle="tooltip" onclick="client_row_view(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-warning " title="VIEW /Edit"> <i class="fa fa-eye"></i></button>',      	        
	        '<button data-toggle="tooltip" onclick="client_row_del(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>',      
	      ],false); 
	      table_main.fnDraw();

	    }       
	  }  
	}); 
	//ajax end  
} //


function populate_category_dropdown(){ 
  //ajax now
  $.ajax ({
    type: "POST",
    url: "../../model/category/populate_table_main_med.php",
    dataType: 'json',      
    cache: false,
    success: function(s)
    {
      $('#f_category').empty();
      $('#f_category').html('<option selected="selected" value="none">--SELECT CATEGORY--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_category').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
      }       
    }  
  }); 
  //ajax end  
} //

function populate_packaging_dropdown(){ 
  //ajax now
  $.ajax ({
    type: "POST",
    url: "../../model/packaging/populate_table_main.php",
    dataType: 'json',      
    cache: false,
    success: function(s)
    {
      $('#f_packaging').empty();
      $('#f_packaging').html('<option selected="selected" value="none">--SELECT PACKAGING--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_packaging').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
      }       
    }  
  }); 
  //ajax end  
} //

function populate_dosage_dropdown(){ 
  //ajax now
  $.ajax ({
    type: "POST",
    url: "../../model/dosage/populate_table_main.php",
    dataType: 'json',      
    cache: false,
    success: function(s)
    {
      $('#f_dosage').empty();
      $('#f_dosage').html('<option selected="selected" value="none">--SELECT DOSAGE--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_dosage').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
      }       
    }  
  }); 
  //ajax end  
} //

// function populate_brand_dropdown(){ 
//   //ajax now
//   $.ajax ({
//     type: "POST",
//     url: "../../model/brand/populate_table_main.php",
//     dataType: 'json',      
//     cache: false,
//     success: function(s)
//     {
//       $('#f_brand').empty();
//       $('#f_brand').html('<option selected="selected" value="none">--SELECT BRAND--</option>');
//       for(var i = 0; i < s.length; i++) { 
//         $('#f_brand').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
//       }       
//     }  
//   }); 
//   //ajax end  
// } //


function populate_unit_dropdown(){ 
  //ajax now
  $.ajax ({
    type: "POST",
    url: "../../model/unit/populate_table_main.php",
    dataType: 'json',      
    cache: false,
    success: function(s)
    {
      $('#f_unit').empty();
      $('#f_unit').html('<option selected="selected" value="none">--SELECT--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_unit').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+"("+s[i][1]+") "+s[i][2]+'</option>');
      }       
    }  
  }); 
  //ajax end  
} //


function reset(){
	$('#btn_save').val('create');
	$('#f_medicine').val('');
	$('#f_content').val('');
	$('#f_price').val('');
	$('#f_desc').val('');

	$('#f_medicine_div').removeClass('has-error');     
	$('#f_category_div').removeClass('has-error');     
	$('#f_packaging_div').removeClass('has-error');     
	$('#f_dosage_div').removeClass('has-error');
	$('#f_generic_div').removeClass('has-error'); 
	$('#f_brand_div').removeClass('has-error');  
	$('#f_content_div').removeClass('has-error');     
	$('#f_unit_div').removeClass('has-error');     
	$('#f_price_div').removeClass('has-error');     
	$('#f_desc_div').removeClass('has-error');     

}

function validate_form(){
	err = false;

	if($('#f_medicine').val()==''){
		err = true;
		$('#f_medicine_div').addClass('has-error');
	}
	else
		$('#f_medicine_div').removeClass('has-error');	

	if($('#f_category').val()=='' || $('#f_category').val()=='none'){
		err = true;
		$('#f_category_div').addClass('has-error');
	}
	else
		$('#f_category_div').removeClass('has-error');		

	if($('#f_packaging').val()=='' || $('#f_packaging').val()=='none'){
		err = true;
		$('#f_packaging_div').addClass('has-error');
	}
	else
		$('#f_packaging_div').removeClass('has-error');	

	if($('#f_dosage').val()=='' || $('#f_dosage').val()=='none'){
		err = true;
		$('#f_dosage_div').addClass('has-error');
	}
	else
		$('#f_dosage_div').removeClass('has-error');	

	if($('#f_unit').val()=='' || $('#f_unit').val()=='none'){
		err = true;
		$('#f_unit_div').addClass('has-error');
	}
	else
		$('#f_unit_div').removeClass('has-error');	

	if($('#f_generic').val()=='' || $('#f_generic').val()=='none'){
		err = true;
		$('#f_generic_div').addClass('has-error');
	}
	else	
		$('#f_generic_div').removeClass('has-error');	

	if($('#f_brand').val()=='' || $('#f_brand').val()=='none'){
		err = true;
		$('#f_brand_div').addClass('has-error');
	}
	else	
		$('#f_brand_div').removeClass('has-error');	

	if($('#f_content').val()=='' || $('#f_content').val()<=0 ){
		err = true;
		$('#f_content_div').addClass('has-error');
	}
	else
		$('#f_content_div').removeClass('has-error');	

	if($('#f_price').val()=='' || $('#f_price').val()<=0){
		err = true;
		$('#f_price_div').addClass('has-error');
	}
	else
		$('#f_price_div').removeClass('has-error');	


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
			  url: "../../model/medicine/delete.php",
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
	  url: "../../model/medicine/fetch.php",
	  data: 'id='+id,
	  dataType: 'json',      
	  cache: false,
	  success: function(s){		
	  	$('#btn_save').val(id);

	  	$('#f_medicine').val(s[0][0]);			  			  	
	    $('#opt'+s[0][1]).prop('selected',true); //selected dropdown
	    $('#opt'+s[0][2]).prop('selected',true); //selected dropdown
	    $('#opt'+s[0][3]).prop('selected',true); //selected dropdown	
	  	$('#f_generic').val(s[0][4]);
	  	$('#f_brand').val(s[0][5]);			  		  			  	        
	  	$('#f_content').val(s[0][6]);			  		  			  	
	    $('#opt'+s[0][7]).prop('selected',true); //selected dropdown
	  	$('#f_price').val(s[0][8]);			  			  	
	  	$('#f_desc').val(s[0][9]);			  			  	

	  }  
	}); 
	//ajax end
}

$('#btn_reset').click(function(){ reset(); })

$('#btn_save').click(function(){

	if(validate_form()==true){}
	else{

		var medicine = $('#f_medicine').val();
		var category = $('#f_category').val();
		var packaging = $('#f_packaging').val();
		var dosage = $('#f_dosage').val();
		var generic = $('#f_generic').val();
		var brand = $('#f_brand').val();
		var content = $('#f_content').val();
		var unit = $('#f_unit').val();
		var price = $('#f_price').val();
		var desc = $('#f_desc').val();

		var dataString = 'medicine='+medicine+'&category='+category+'&packaging='+packaging+'&dosage='+dosage;
		dataString+='&generic='+generic+'&brand='+brand+'&content='+content+'&unit='+unit+'&price='+price+'&desc='+desc;

		if(this.value=='create'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/medicine/create.php",
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
			  url: "../../model/medicine/update.php",
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
