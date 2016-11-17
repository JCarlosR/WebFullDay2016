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
            url: $("#guardaform").attr("action"),
            data: $("#guardaform").serialize(),
            success: function(data) {
              
            }
         });
       sleep(500);
       window.location="/pagos";             
	}
	else
	{
		$('#myModal').modal('show');
	}
}
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}