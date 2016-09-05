	populate_table_main();


  var table_main = $('#table_main').dataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [] } ],
    "aaSorting": []
  });  //Initialize the datatable

function populate_table_main(){ 
	//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/vaccines/populate_table_main.php",
	  dataType: 'json',      
	  cache: false,
	  success: function(s)
	  {
	
		populate_unit_dropdown();


	    table_main.fnClearTable();      
	    for(var i = 0; i < s.length; i++) 
	    { 
	      table_main.fnAddData
	      ([
	        s[i][1],s[i][2],comma(s[i][3]),s[i][4],
	        '<button data-toggle="tooltip" onclick="client_row_view(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-warning " title="VIEW /Edit"> <i class="fa fa-eye"></i></button>',      	        
	        '<button data-toggle="tooltip" onclick="client_row_del(this.value)" value='+s[i][0]+' data-toggle="modal" class="btn  btn-danger" title="Delete"> <i class="fa fa-trash"></i> </button>',      
	      ],false); 
	      table_main.fnDraw();

	    }       
	  }  
	}); 
	//ajax end  
} //




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
	$('#f_vaccine').val('');
	$('#f_content').val('');
	$('#f_price').val('');
	$('#f_desc').val('');

	$('#f_vaccine_div').removeClass('has-error');     
	$('#f_content_div').removeClass('has-error');     
	$('#f_unit_div').removeClass('has-error');     
	$('#f_price_div').removeClass('has-error');     
	$('#f_desc_div').removeClass('has-error');     

}

function validate_form(){
	err = false;

	if($('#f_vaccine').val()==''){
		err = true;
		$('#f_vaccine_div').addClass('has-error');
	}
	else
		$('#f_vaccine_div').removeClass('has-error');	


	if($('#f_unit').val()=='' || $('#f_unit').val()=='none'){
		err = true;
		$('#f_unit_div').addClass('has-error');
	}
	else
		$('#f_unit_div').removeClass('has-error');	

	

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


	
	return err;				
}


function client_row_del(id){

  var choice = confirm("Are you sure you want to Delete?");
  if(choice==true){
  			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/vaccines/delete.php",
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
	  url: "../../model/vaccines/fetch.php",
	  data: 'id='+id,
	  dataType: 'json',      
	  cache: false,
	  success: function(s){		
	  	$('#btn_save').val(id);

	  	$('#f_vaccine').val(s[0][0]);			  			  			  		  			  	        
	  	$('#f_content').val(s[0][1]);			  		  			  	
	    $('#opt'+s[0][2]).prop('selected',true); //selected dropdown
	  	$('#f_price').val(s[0][3]);			  			  	
	  	$('#f_desc').val(s[0][4]);			  			  	

	  }  
	}); 
	//ajax end
}

$('#btn_reset').click(function(){ reset(); })

$('#btn_save').click(function(){

	if(validate_form()==true){}
	else{

		var vaccine = $('#f_vaccine').val();
		var content = $('#f_content').val();
		var unit = $('#f_unit').val();
		var price = $('#f_price').val();
		var desc = $('#f_desc').val();

		var dataString = 'vaccine='+vaccine+'&content='+content+'&unit='+unit+'&price='+price+'&desc='+desc;

		if(this.value=='create'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/vaccines/create.php",
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
			  url: "../../model/vaccines/update.php",
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
