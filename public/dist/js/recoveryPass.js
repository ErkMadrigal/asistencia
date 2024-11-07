$(document).ready(function(){
  
  $("#passUpdate").click(function(){
    $("#spin").addClass( "spinner-border" );
    var formData = new FormData($("form#data")[0]);
  
    $.ajax({
      url: base_url + '/recoveryPass',
      type: 'POST',
      dataType: 'json',
      data: formData,
      cache:false,
      async:true,
      contentType: false,
      processData: false,
      success:function(response){
        $('.error').remove();
        if (response.succes.succes == 'succes') {
          toastr.success(response.succes.mensaje);

          var count = 5;
          setInterval(function(){
            count--;
            if (count == 0) {
              window.location = base_url + '/ingresar'; 
            }
          },1000);

        } else if (response.dontsucces.error == 'error'){
          toastr.error(response.dontsucces.mensaje);                             
        } else if (Object.keys(response.error).length > 0 ){

            for (var clave in response.error){
                  
              $( "<div class='error input-group text-danger'>&nbsp;" + response.error[clave] + "</div>" ).insertAfter( '#lbl' + clave  );
                
            }
            toastr.error('Todos los campos son obligatorios');
        } 
      $("#spin").removeClass( "spinner-border" );
      },
      error: function(jqXHR, textStatus, errorThrown){
      toastr.error('Error , intente nuevamemte');
      $("#spin").removeClass( "spinner-border" );
      }
    });     
  });


});