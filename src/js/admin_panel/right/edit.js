

$edit__BUT.click(function(e) {
    visableForm(true);
    setDataForm();
});


function setDataForm(){

	$('.form-check-input').each(function(index) {
		const data_id = $(this).attr('data-id');

		if($(this).prop('checked') === true && data_id === arr_checked[0]){
			
			const 
			$td_checkbox = $(this).parent().parent(),
			email = $td_checkbox.next().text(),
			user_name = $td_checkbox.next().next().text(),
			//status = $td_checkbox.next().next().next().text(),
			description = $td_checkbox.next().next().next().next().text();

			$edit_task__FORM.attr('data-id', data_id);
			$email__INPUT.val(reescapeHtml(email));
			$user_name__INPUT.val(reescapeHtml(user_name));
			$description__TEXTAR.val(reescapeHtml(description));
			//console.log(description);
		}
	});

}
