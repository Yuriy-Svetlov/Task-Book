

const 
$pagination_left__LI = $('#pagination_left__LI'),
$pagination_right__LI = $('#pagination_right__LI'),
$pagination_1__LI = $('#pagination_1__LI'),
$pagination_2__LI = $('#pagination_2__LI'),
$pagination_3__LI = $('#pagination_3__LI');

/**
* coutRows
* number_page
*/
function setDataPagination(coutRows){
	const pages_number = Math.ceil(coutRows / 3);
	const state = state_pagination(number_page, coutRows);
	// console.log(state);	
	tunrON_pagination_left(state, parseInt(number_page), pages_number);
	tunrON_pagination_right(state, parseInt(number_page), pages_number);

	tunrON_pagination_1(state, parseInt(number_page), pages_number);
	tunrON_pagination_2(state, parseInt(number_page), pages_number);
	tunrON_pagination_3(state, parseInt(number_page), pages_number);
}


const $els_pagination = 
'#pagination_1__LI' +
',#pagination_2__LI' +
',#pagination_3__LI' +
',#pagination_left__LI' +
',#pagination_right__LI';

$($els_pagination).click(function(e) {
    const number_page = $(this).attr('data-page');
    sendRequest__GET(number_page, sort_property, sort_type);
});	




function state_pagination(number_page, coutRows){
	const pages_number = Math.ceil(coutRows / 3);

	if(number_page == 1){
		// 1 button
		return 'state-1';
	}else
		if(number_page > 1){
			// 2 button
 		if(pages_number == number_page && pages_number < 3){
 			return 'state-2-end';
 		}else 
 		if(pages_number != number_page && pages_number > 2){
 			return 'state-2';
 		}else
			// 3 button
 		if(pages_number == number_page && pages_number >= 3){
 			return 'state-3';
 		}	 		
	}
}



function tunrON_pagination_left(state, number_page, pages_number){
	if(pages_number > 1){
		$pagination_left__LI.show();
	}else{
		$pagination_left__LI.hide();
	}

	if(number_page > 3){
		$pagination_left__LI.removeClass('disabled');
		$pagination_left__LI.removeClass('pagination_disabled__index');
	}else{
		$pagination_left__LI.addClass('disabled');
		$pagination_left__LI.addClass('pagination_disabled__index');		
	}
}


function tunrON_pagination_right(state, number_page, pages_number){
	if(pages_number > 1){
		$pagination_right__LI.show();
	}else{
		$pagination_right__LI.hide();
	}

	if(pages_number > 3 && pages_number - 1 > number_page){
		$pagination_right__LI.attr('data-page', pages_number);
		$pagination_right__LI.removeClass('disabled');
		$pagination_right__LI.removeClass('pagination_disabled__index');
	}else{
		$pagination_right__LI.addClass('disabled');
		$pagination_right__LI.addClass('pagination_disabled__index');		
	}
}

function tunrON_pagination_1(state, number_page, pages_number){
	if(pages_number < 2){
		$pagination_1__LI.children().text('1');
		$pagination_1__LI.attr('data-page', '1');
		$pagination_1__LI.addClass('pagination_hidden');
		$pagination_1__LI.removeClass('paginator_active');
		return;
	}

	if(state == 'state-1'){
		$pagination_1__LI.addClass('paginator_active');
	}else 
	if(state == 'state-2' || state == 'state-2-end'){
		$pagination_1__LI.removeClass('paginator_active');
		number_page = number_page - 1;
	}else 
	if(state == 'state-3'){
		$pagination_1__LI.removeClass('paginator_active');
		number_page = number_page - 2;
	}

	$pagination_1__LI.removeClass('pagination_hidden');
	$pagination_1__LI.attr('data-page', number_page);
	$pagination_1__LI.children().text(number_page);
}


function tunrON_pagination_2(state, number_page, pages_number){
	if(pages_number < 2){
		$pagination_2__LI.removeClass('paginator_active');
		$pagination_2__LI.children().text('2');
		$pagination_2__LI.attr('data-page', '2');
		$pagination_2__LI.addClass('pagination_hidden');
		return;
	}

	if(state == 'state-1'){
		number_page++;
		$pagination_2__LI.removeClass('paginator_active');
	}else 
	if(state == 'state-2' || state == 'state-2-end'){
		$pagination_2__LI.addClass('paginator_active');
	}else 
	if(state == 'state-3'){
		$pagination_2__LI.removeClass('paginator_active');
		number_page = number_page - 1;
	}		

	$pagination_2__LI.removeClass('pagination_hidden');
	$pagination_2__LI.attr('data-page', number_page);
	$pagination_2__LI.children().text(number_page);
}


function tunrON_pagination_3(state, number_page, pages_number){
	if(pages_number < 3){
		$pagination_3__LI.removeClass('paginator_active');
		$pagination_3__LI.children().text('2');
		$pagination_3__LI.attr('data-page', '2');
		$pagination_3__LI.addClass('pagination_hidden');
		return;
	}

	if(state == 'state-1'){
		number_page = number_page + 2;
		$pagination_3__LI.removeClass('paginator_active');
	}else 
	if(state == 'state-2'){
		$pagination_3__LI.removeClass('paginator_active');
		number_page = number_page + 1;
	}else 
	if(state == 'state-3'){
		$pagination_3__LI.addClass('paginator_active');
	}		

	$pagination_3__LI.removeClass('pagination_hidden');
	$pagination_3__LI.attr('data-page', number_page);
	$pagination_3__LI.children().text(number_page);
}