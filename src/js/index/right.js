
const 
$right_table__index = $('#right_table__index');

var number_page = 1, 
	sort_property = 'email',
	sort_type = 'ASC';

// GET data
function sendRequest__GET(num_page, sort_p, sort_t){
	const url = '//'+window.location.hostname+'/api/task';
	const data = {};
	data.number_page = num_page;
	data.sort_property = sort_p;
	data.sort_type = sort_t;

	$.get(url, data, function(result){	
		number_page = num_page;
		setData(result.data.elements);
		setDataPagination(result.data.coutRows);
		setSort(sort_p, sort_t);
		updata_modal_onClick();
	});	
}

sendRequest__GET(number_page, sort_property, sort_type);


function setData(arr){
	var el_html = "";
	Object.keys(arr).forEach(function(i){
	    el_html = el_html + templateTable(arr[i].email, arr[i].user_name, arr[i].description, arr[i].status, arr[i].status_last_edit);
	});

	$('.table_data').remove();
	$right_table__index.append(el_html);

}


function templateTable(email, user_name, description, status, status_last_edit){
	var el = '<tr data-status_last_edit='+status_last_edit+' data-toggle="modal" data-target="#exampleModal" class="table_data"><td>'+escapeHtml(email)+'</td><td>'+escapeHtml(user_name);

	if(status == 0){
		status = 'In process';
	}else{
		status = 'Done';
	}

	return el+'</td><td>'+status+'</td><td>'+escapeHtml(description)+'</td></tr>';
}



var entityMap = {
  '&': '&amp;',
  '<': '&lt;',
  '>': '&gt;',
  '"': '&quot;',
  "'": '&#39;',
  '/': '&#x2F;',
  '`': '&#x60;',
  '=': '&#x3D;'
};

function escapeHtml(string) {
  return String(string).replace(/[&<>"'`=\/]/g, function (s) {
    return entityMap[s];
  });
}

