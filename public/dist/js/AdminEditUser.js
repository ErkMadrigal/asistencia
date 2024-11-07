
$('.modulo').on('switchChange.bootstrapSwitch', function (event, state) {
    var id = $(this).attr("id");
    var name = $(this).attr("name");
    var val = 0;
    if($(this).is(':checked')) {
      val = 1;
    } else {
      val = 0;
    }
    
    document.getElementById("idEdit").value = id;
    document.getElementById("valEdit").value = val;
    document.getElementById("nameEdit").value = name;
    document.getElementById("type").value = 1;


    $('#exampleModal').modal('show');
});

$('.empresa').on('switchChange.bootstrapSwitch', function (event, state) {
    var id = $(this).attr("id");
    var name = $(this).attr("name");
    var val = 0;
    if($(this).is(':checked')) {
      val = 1;
    } else {
      val = 0;
    }
    
    document.getElementById("idEdit").value = id;
    document.getElementById("valEdit").value = val;
    document.getElementById("nameEdit").value = name;
    document.getElementById("type").value = 2;


    $('#exampleModal').modal('show');
});



$('#closeModal').click( function(){

	var valcheck = false;
	var val = $('#valEdit').val();
	var name = $('#nameEdit').val();
	if (val == 0) {
		valcheck = true;
	} else {
		valcheck = false;
	}

	$("[name='"+name+"']").bootstrapSwitch('state',  valcheck );

	$('#frmEditPermiso')[0].reset();
	$('#exampleModal').modal('hide');


})

