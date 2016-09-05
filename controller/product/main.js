	populate_table_main();




  var table_main = $('#table_main').dataTable({
    "aoColumnDefs": [ { "bSortable": false, "aTargets": [] } ],
    "aaSorting": []
  });  //Initialize the datatable

function populate_table_main(){ 
	//ajax now
	$.ajax ({
	  type: "POST",
	  url: "../../model/product/populate_table_main.php",
	  dataType: 'json',      
	  cache: false,
	  success: function(s)
	  {
		populate_category_dropdown();
		populate_packaging_dropdown();
		populate_unit_dropdown();
		
	    table_main.fnClearTable();      
	    for(var i = 0; i < s.length; i++) 
	    { 
	      table_main.fnAddData
	      ([
	        s[i][1],s[i][2],s[i][3],s[i][4],s[i][5],s[i][6],
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
    url: "../../model/category/populate_table_main_prod.php",
    dataType: 'json',      
    cache: false,
    success: function(s)
    {
      $('#f_category').empty();
      $('#f_category').html('<option selected="selected" value="none">--SEARCH CATEGORY--</option>');
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
      $('#f_packaging').html('<option selected="selected" value="1">--SEARCH PACKAGING--</option>');
      for(var i = 0; i < s.length; i++) { 
        $('#f_packaging').append('<option id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');
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
	$('#f_product').val('');
	$('#f_weight').val('');
	$('#f_price').val('');
	$('#f_desc').val('');

	$('#f_product_div').removeClass('has-error');     
	$('#f_category_div').removeClass('has-error');     
	$('#f_packaging_div').removeClass('has-error');     
	$('#f_weight_div').removeClass('has-error');
	$('#f_unit_div').removeClass('has-error');  
	$('#f_price_div').removeClass('has-error');     
	$('#f_desc_div').removeClass('has-error');     	
}

function validate_form(){
	err = false;

	if($('#f_product').val()==''){
		err = true;
		$('#f_product_div').addClass('has-error');
	}
	else
		$('#f_product_div').removeClass('has-error');	

	if($('#f_category').val()=='' || $('#f_category').val()=='none'){
		err = true;
		$('#f_category_div').addClass('has-error');
	}
	else
		$('#f_category_div').removeClass('has-error');		



	if($('#f_unit').val()=='' || $('#f_unit').val()=='none'){
		err = true;
		$('#f_unit_div').addClass('has-error');
	}
	else
		$('#f_unit_div').removeClass('has-error');	

	if($('#f_weight').val()==''){
		err = true;
		$('#f_weight_div').addClass('has-error');
	}
	else
		$('#f_weight_div').removeClass('has-error');	

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
			  url: "../../model/product/delete.php",
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
	  url: "../../model/product/fetch.php",
	  data: 'id='+id,
	  dataType: 'json',      
	  cache: false,
	  success: function(s){		
	  	$('#btn_save').val(id);

	  	$('#f_product').val(s[0][0]);			  			  	
	    $('#opt'+s[0][1]).prop('selected',true); //selected dropdown
	    $('#opt'+s[0][2]).prop('selected',true); //selected dropdown
	  	$('#f_weight').val(s[0][3]);			  			  	
	    $('#opt'+s[0][4]).prop('selected',true); //selected dropdown
	  	$('#f_price').val(s[0][5]);			  			  	
	  	$('#f_desc').val(s[0][6]);			  			  	

	  }  
	}); 
	//ajax end
}

$('#btn_reset').click(function(){ reset(); })

$('#btn_save').click(function(){

	if(validate_form()==true){}
	else{

		var product = $('#f_product').val();
		var category = $('#f_category').val();
		var packaging = $('#f_packaging').val();
		var weight = $('#f_weight').val();
		var unit = $('#f_unit').val();
		var price = $('#f_price').val();
		var desc = $('#f_desc').val();

		var dataString = 'product='+product+'&category='+category+'&packaging='+packaging+'&weight='+weight+'&unit='+unit+'&price='+price+'&desc='+desc;

		if(this.value=='create'){ //CREATE MODE
			//ajax now
			$.ajax ({
			  type: "POST",
			  url: "../../model/product/create.php",
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
			  url: "../../model/product/update.php",
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
