
const 
$email__INPUT = $('#email__INPUT'), 
$user_name__INPUT = $('#user_name__INPUT'), 
$description__TEXTAR = $('#description__TEXTAR'), 
$task_submit__BUT = $('#task_submit__BUT');


$task_submit__BUT.click(function() {
    sendRequest__POST();
});


function sendRequest__POST(){
	const url = '//'+window.location.hostname+'/api/task';
	var data = $('#create_task__FORM').serializeArray();

	$.post(url, data, function(result){
		if(result.error != null){
			setError(result.error.property, result.error.message);
		}else{
			clearFields();
			// Update data page
			sendRequest__GET(number_page, sort_property, sort_type);
		}
	});	
}


function setError(id, message){
	$('#'+id).addClass("is-invalid");
	$('#'+id).next().text(message);
}

function clearError(id){
	$(id).removeClass("is-invalid");
	$(id).next().text("");
}

$('#email__INPUT,#user_name__INPUT,#description__TEXTAR').on('input', function(e){
    clearError(e.target);
});

function clearFields(){
	$email__INPUT.val("");
	$user_name__INPUT.val("");
	$description__TEXTAR.val("");
}




