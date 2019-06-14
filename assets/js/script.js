//Materialize Parallax
$(document).ready(function(){
	$(".button-collapse").sideNav();

	Materialize.updateTextFields();

	$('select').material_select();


	$('.collapsible').collapsible();


	// masks Cadastro
	$('#cpf').mask('000.000.000-00');
	$('#telefone').mask('(00) 0000-0000');
  	$('#celular').mask('(00) 00000-0000');

});

