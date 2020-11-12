
const 
$sort_con = $('.sort_con');


var $sort_email = $('#sort_email'),
	$sort_username = $('#sort_username'),
	$sort_status = $('#sort_status');

// Init
$sort_email.children().addClass('sort-active');


$sort_email.click(function(e) {
    if(sort_type == 'DESC'){
    	sort_t = 'ASC';
    }else{
    	sort_t = 'DESC';
    }
    sendRequest__GET(number_page, 'email', sort_t);
});	

$sort_username.click(function(e) {
    if(sort_type == 'DESC'){
    	sort_t = 'ASC';
    }else{
    	sort_t = 'DESC';
    }
    sendRequest__GET(number_page, 'user_name', sort_t);
});	

$sort_status.click(function(e) {
    if(sort_type == 'DESC'){
    	sort_t = 'ASC';
    }else{
    	sort_t = 'DESC';
    }
    sendRequest__GET(number_page, 'status', sort_t);
});	


function setSort(sort_p, sort_t){
	sort_property = sort_p; 
	sort_type = sort_t;

	let $el;

	if(sort_property == 'email'){
		$el = $sort_email;
		$sort_username.children().removeClass('sort-active');
		$sort_status.children().removeClass('sort-active');		
	}else 
	if(sort_property == 'user_name'){
		$el = $sort_username;
		$sort_email.children().removeClass('sort-active');
		$sort_status.children().removeClass('sort-active');		
	}else 
	if(sort_property == 'status'){
		$el = $sort_status;
		$sort_email.children().removeClass('sort-active');
		$sort_username.children().removeClass('sort-active');
	}

	$el.children().addClass('sort-active');

	if(sort_type == 'DESC'){
		$el.children().removeClass('sort-by-asc');
		$el.children().addClass('sort-by-desc');
	}else{
		$el.children().removeClass('sort-by-desc');
		$el.children().addClass('sort-by-asc')
	}
}	

