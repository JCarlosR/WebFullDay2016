function sendform () {
	var check = document.getElementById('SiSoli');

	if(check.checked==true)
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