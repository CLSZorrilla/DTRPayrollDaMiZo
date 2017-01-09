$(document).ready(function(){
	
	$("#login").click(function(e){
		$("#modal-login").slideToggle('slow');
		$("#uid").focus();
	});

	//close login modal
	$("#close-v").click(function(e){
		$("#modal-login").slideToggle('slow');
		$(".m-error1").fadeOut('slow');
		$("#uid").val('');
		$("#upass").val('');
	});


	$("#close").click(function(e){
		$("#modal-login").slideToggle('slow');
		$(".m-error1").fadeOut('slow');
		$("#uid").val('');
		$("#upass").val('');
	});

	//hide error
	$("#logform").click(function(e){
		$(".error1").fadeOut('slow');
	});

});


// trigger submit when enter
$('#uid').keypress(function(e){
	var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $('#close').click();   
    }
});


$('#upass').keypress(function(e){
	var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $('#l-submit').click();   
    }
});