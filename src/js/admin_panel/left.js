
const 
$edit_task__FORM = $('#edit_task__FORM'), 
$email__INPUT = $('#email__INPUT'), 
$user_name__INPUT = $('#user_name__INPUT'), 
$description__TEXTAR = $('#description__TEXTAR'), 
$task_submit__BUT = $('#task_submit__BUT');


$task_submit__BUT.click(function() {
    sendRequest__PUT();
});


function sendRequest__PUT(){
	const 
		url = 'http://'+window.location.hostname+'/api/task',
		id = $edit_task__FORM.attr('data-id');
	var 
		data = $('#edit_task__FORM').serializeArray();
	
	data.push({name: "id", value: id});


	$.ajax({type: 'PUT', url: url, data: data})
	.done(function(result) {
    	//console.log(result);
		if(result.error != null){
			setError(result.error.property, result.error.message);
			return;
		}

    	if(result.status != 200){
    		console.log(result);
    		alert('Look log');
    		return;
    	}

    	if(result.status === 200){
    		clearFields();
			// Update data page
			sendRequest__GET(number_page, sort_property, sort_type);
    	}
  	})
  	.fail(function(error) {
    	alert(error);
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


function visableForm(v){
	clearError('#email__INPUT,#user_name__INPUT,#description__TEXTAR');

	if(v){
		$edit_task__FORM.show();
		return;
	}

	$edit_task__FORM.hide();
}

