function sendform () {
	var selected = ''; 
	$('#guardaform input[type=checkbox]').each(function(){
            if (this.checked) {
                selected += $(this).val()+', ';
            }
     }); 
	if(selected != '')
	{		
		 $.ajax({
            type: "POST",
            url:  "/solicitudes/registrar",
            data: $("#guardaform").serialize(),
            success: function(data) {
            }
         });
         window.location="/pagos";
	}
	else
	{
		$('#myModal').modal('show');
	}
}