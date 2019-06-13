$(document).ready(function(){
	

	// Chama função 
	filter_data();

	function filter_data()
	{	
		// Cria efeito de loading
		$('.filter_data').html('<div id="loading" style="" ></div>');
		// Pega ação do botão de pesquisa
		var action = 'fetch_data';
		// Pega valores do input de pesquisa
		var pesquisa = $('.searchinput').val();
		// Busca valores vindos da pesquisa da index
		var getIndex = $('.get').val();
		// Busca qual categoria foi filtrada 
		var categoria = get_filter('categoria');
		// Busca qual cidade foi filtrada
		var cidade = get_filter('cidade');
		// Chama o Ajax
		$.ajax({
			// Seta URL
			url:"assets/php/filter_post.php",
			// Metodo
			method:"POST",
			// Insere as variaveis e seus valores
			data:{action:action, categoria:categoria, cidade:cidade, pesquisa:pesquisa, getIndex:getIndex},
			// Retorno do Ajax
			success:function(data){

				// Funcao resultado
				$('.filter_data').html(data);
			}
		});
	}


	function filter_clean()
	{
		// Cria efeito loading
		$('.filter_data').html('<div id="loading" style="" ></div>');
		// Define de variavel que fara PHP zerar
		var zerar = '1';
		// Chama o Ajax
		$.ajax({
			// Seta URL
			url:"assets/php/filter_post.php",
			// Metodo
			method:"POST",
			// Dados
			data:{zerar:zerar},
			// Retorno
			success:function(data){
				$('.filter_data').html(data);
			}
		});
	}

	function get_filter(class_name)
	{
		var filter = [];
		$('.'+class_name+':checked').each(function(){
			filter.push($(this).val());
		});
		return filter;
	}

	$('.common_selector').click(function(){
		filter_data();
	});

	$('#cleanFilter').click(function () {
		filter_clean();
	})

	$('#btnsearch').click(function(){
		filter_data();
	});

	$("#search").submit(function(e) {
		e.preventDefault();
		filter_data();
	})


});