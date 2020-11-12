
const 
$right_table__index = $('#right_table__index'), 
$options_menu__BUT = $('#options_menu__BUT'),
$form_check_input = $('#form-check-input'),
$edit__BUT = $('#edit__BUT'),
$done__BUT = $('#done__BUT');

var number_page = 1, 
	sort_property = 'email',
	sort_type = 'ASC',
	arr_checked = [];

// GET data
function sendRequest__GET(num_page, sort_p, sort_t){
	const url = 'http://'+window.location.hostname+'/api/task';
	const data = {};
	data.number_page = num_page;
	data.sort_property = sort_p;
	data.sort_type = sort_t;

	$.get(url, data, function(result){	
		number_page = num_page;
		setData(result.data.elements);
		setDataPagination(result.data.coutRows);
		setSort(sort_p, sort_t);
		clear_checkbox();
	});	
}

sendRequest__GET(number_page, sort_property, sort_type);


function setData(arr){
	var el_html = "";
	Object.keys(arr).forEach(function(i){
	    el_html = el_html + templateTable(arr[i].id, arr[i].email, arr[i].user_name, arr[i].description, arr[i].status, arr[i].status_last_edit);
	});

	$('.table_data').remove();
	$right_table__index.append(el_html);

	checkbox_Change();
	updata_modal_onClick();
}


function templateTable(id, email, user_name, description, status, status_last_edit){

	if(status == 0){
		status = 'In process';
	}else{
		status = 'Done';
	}

	var 
	tr = '<tr data-status_last_edit='+status_last_edit+' class="table_data">',
	
	td_1 = '<td>'+templateCheckBox(id)+'</td>',
	td_2 = '<td data-toggle="modal" data-target="#exampleModal">'+escapeHtml(email)+'</td>',
	td_3 = '<td data-toggle="modal" data-target="#exampleModal">'+escapeHtml(user_name)+'</td>',
	td_4 = '<td data-toggle="modal" data-target="#exampleModal">'+status+'</td>',
	td_5 = '<td data-toggle="modal" data-target="#exampleModal">'+escapeHtml(description)+'</td>';

	return tr + td_1 + td_2 + td_3 + td_4 + td_5 + '</tr>';
}




function templateCheckBox(id){
	const check_box = '<input data-id='+id+' type="checkbox" class="form-check-input">';
	return '<div class="form-check">'+check_box+'</div>';
}





function checkbox_Change(){
	$('.form-check-input').change(function() {
	    //setChecked_checkbox();
		arr_checked = [];
		$('.form-check-input').each(function(index) {
			if($(this).prop('checked') === true){
				arr_checked.push($(this).attr('data-id'));
			}
		});

	    const count = arr_checked.length;

		if(count === 0){
			$options_menu__BUT.prop('disabled', true);
			visableForm(false);
			$edit_task__FORM.attr('data-id', '');
		}else 
		if(count === 1){
			$options_menu__BUT.prop('disabled', false);
			$edit__BUT.removeClass('disabled');
		}else 
		if(count > 1){
			$edit__BUT.addClass('disabled');
			visableForm(false);
			$edit_task__FORM.attr('data-id', '');
		}
	});
}


function clear_checkbox(){
	arr_checked = [];
	$options_menu__BUT.prop('disabled', true);
	$edit__BUT.removeClass('disabled');
	visableForm(false);
	$edit_task__FORM.attr('data-id', '');
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



var reentityMap = {
    '&amp;': '&',
    '&lt;': '<',
    '&gt;': '>',
    '&quot;': '"',
    '&#39;': "'",
    '&#x2F;': '/',
    '&#x60;': '`',
    '&#x3D;': '='
};


function reescapeHtml(string) {
	if(undefined === string){
		return '';
	}

    return String(string).replace(/(&amp;|&lt;|&gt;|&quot;|&#39;|&#x2F;|&#x60;|&#x3D;)/g, function (s) {
      return reentityMap[s];
    });
}