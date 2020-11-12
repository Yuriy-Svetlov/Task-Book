

$done__BUT.click(function(e) {
    visableForm(false);
    $edit_task__FORM.attr('data-id', '');

	sendRequest__Status__PUT(arr_checked);
});


function sendRequest__Status__PUT(){
	const 
		url = '//'+window.location.hostname+'/api/task/status';
	
	var data = {};
	data.id = arr_checked;
	data = JSON.stringify(data);
	//console.log(data);

	$.ajax({type: 'PUT', url: url, data: data})
	.done(function(result) {
    	console.log(result);
    	if(result.status === 200){
			// Update data page
			sendRequest__GET(number_page, sort_property, sort_type);
    	}
  	})
  	.fail(function(error) {
    	alert(error);
  	});
}


function getFormData(data) {
    var str = '';
    JSON.parse(JSON.stringify(data), function (key, value) {
        if(str === '' && key !== ''){
            str = encodeURIComponent(key)+'='+encodeURIComponent(value);
        }else if(key !== ''){
            str = str+'&'+encodeURIComponent(key)+'='+encodeURIComponent(value);
        }
    });
    return str;
}