
const 
$modal__email = $('#modal__email'),
$modal__Username = $('#modal__Username'),
$modal__Status = $('#modal__Status'),
$modal__Description = $('#modal__Description'),
$modal__edit_status = $('#modal__edit_status');


function updata_modal_onClick(){
	$('.table_data').click(function(e) {

	    const 
	    status_last_edit = $(this).attr('data-status_last_edit');
	    email = $(this).children('td').eq(1).text(),
	    username = $(this).children('td').eq(2).text(),
	    status = $(this).children('td').eq(3).text(),
	    description = $(this).children('td').eq(4).text();


	    $modal__email.text(email);
	    $modal__Username.text(username);
	    $modal__Status.text(status);
	    $modal__Description.text(description);

	    if(status_last_edit == 1){
	    	$modal__edit_status.show();
	    }else{
	    	$modal__edit_status.hide();
	    }
	    
	});	
}

