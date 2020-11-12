

const 
$submit__BUT = $('#submit__BUT');


$submit__BUT.click(function() {
    sendRequest__POST();
});



function sendRequest__POST(){
	const url = '//'+window.location.hostname+'/api/login';
	var data = $('#login__FORM').serializeArray();
	//console.log(data);

	$.post(url, data, function(result){
		//console.log(result);

		if(result.error != null){
			setError(result.error.property, result.error.message);
		}else{
			console.log(result.login);
			if(result.login == 'successful'){
				const url_admin_panel = '//'+window.location.hostname+'/admin_panel';
				window.location.replace(url_admin_panel);
			}
		}
	});	
	
}


$('#login__INPUT,#password__INPUT').on('input', function(e){
    clearError(e.target);
});


function setError(id, message){
	$('#'+id).addClass("is-invalid");
	$('#'+id).next().text(message);
}

function clearError(id){
	$(id).removeClass("is-invalid");
	$(id).next().text("");
}



















/* ================================= */
/*  Login Panel 
/* ================================= */	
setMeasureLoginPanel(window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight, document.getElementById("conteiner-2"), document.getElementById("conteiner-1"));

window.addEventListener("resize", function(){
	setMeasureLoginPanel(window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight, document.getElementById("conteiner-2"), document.getElementById("conteiner-1"));
});

function setMeasureLoginPanel(height_win, $conteiner_2, $conteiner_1){
	if(height_win >= $conteiner_2.offsetHeight + 10){
		$conteiner_2.style.marginTop = "-"+$conteiner_2.offsetHeight / 2+"px";

		$conteiner_1.style.position = "absolute";
		$conteiner_1.style.height = "0px";
		$conteiner_1.style.padding = "0px";

		document.getElementById("background__").style.height = "100%";
	}else{
		$conteiner_2.style.marginTop = "0px";

		$conteiner_1.style.position = "relative";
		$conteiner_1.style.height = "auto";
		$conteiner_1.style.padding = "10px";

		document.getElementById("background__").style.height = document.body.scrollHeight+"px";
	}	
}
/* ================================= */	