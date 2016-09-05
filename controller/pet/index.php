<!-- <script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#species').on('change',function(){
        var speciesID = $(this).val();
        if(speciesID){
            $.ajax({
                type:'POST',
                url:"../../model/breed/populate_table_main_2.php",
                data:'species='+speciesID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });

 </script> -->