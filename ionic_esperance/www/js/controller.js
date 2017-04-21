$(function(){

	$.ajax({
		url: 'http://yassinl.dijon.codeur.online/CodeIgniter-esperance/controller/getDep/',
		method: 'GET',
		data: 'dep'	
	}).done(function(dep){

		dep = JSON.parse(dep);
		$('select').html('');
		for(var i = 0; i < dep.numCode.length; i++){

			$('select').append('<option value="' + dep.numCode[i]['noms_departement'] + '">'+dep.numCode[i]['code_departement'] + " " + dep.numCode[i]['noms_departement']+'</option>');
		}
	})
})

$(function(){
	//je cible le form-esp-submit dans le body ;)
	$('body').on('click', '.form-esp-submit', function(event){
		//je block l'action par default
		event.preventDefault();

		var form = $(this).closest('form');
		var route = form.attr('action');
		//j'execute ce que je veux ;)
		$.ajax({
			url: route,
			method: 'POST',
			data: form.serialize(),
			success: function (data) {

				data = JSON.parse(data);
				if(data['erreur']){

					$('article').show().html(data["erreur"]);
				}else{

					$('article').show().html('Les statistiques démontrent qu\'il vous reste '+data["esperance"]);
				}
				console.log(data);
			}
		})
	})
})

$(function(){
	$('article').hide();
})

function titreAnce(){

	$('.ance').animate({marginTop: '4em'}, 3000);
	$('.ance').animate({marginTop: '0em'});
}
function ciel(){

	// $('.one').animate({marginLeft: '10em'}, 3000);
	// $('.one').animate({marginLeft: '0em'}, 5000);
	$('.second').animate({marginLeft: '10em'}, 7000);
	$('.second').animate({marginLeft: '0em'}, 7000);
	$('.three').animate({marginLeft: '15em'}, 7000);
	$('.three').animate({marginLeft: '0em'}, 7000);
	// $('img').animate({marginLeft: '5em'}, 2000);
}
setInterval(ciel, 1000);
setInterval(titreAnce, 5000);

// $(function(){
// 	$( "#ma_vie" ).animate({
//     opacity: 0.25,
//     width: '55%'
//   }, 1000);
// });