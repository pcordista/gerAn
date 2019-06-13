$(document).ready(function(){

	// Chama função 
	contador();
	var numItens=1;
	filter_data(pagina,numItens);

	function filter_data(pag, max)
	{	
		var pagina=1;
		var contador=1;
		maximo = max;
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
			data:{contador: contador, pagina: pagina, maximo: numItens, action:action, categoria:categoria, cidade:cidade, pesquisa:pesquisa, getIndex:getIndex},
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
		var contador = "1";
		maximo = "1";
		var pagina=1;
		// Chama o Ajax
		$.ajax({
			// Seta URL
			url:"assets/php/filter_post.php",
			// Metodo
			method:"POST",
			// Dados
			data:{maximo: maximo, pagina: pagina, zerar:zerar},
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

	function contador(){
		$.ajax({
			type: 'GET',
			data: 'tipo='+1,
			url:'assets/php/filter_post.php',
			success: function(retorno_pg){
				paginador(retorno_pg)
			}
		})
	}

	function paginador(cont){
		if(cont<=numItens){
			$('#paginador').html('<tr><td>Apenas uma Página<td><tr>')
		}else{

			$('#paginador').html('<tr></tr>');
			if(pagina!=1){
				$('#paginador tr').append('<td><a href="#" onclick="filter_data('+(pagina-1)+', '+numItens+')">Página Anterior</a></td>')
			}
			var qtdpaginas=Math.ceil(cont/numItens)
			for(var i=1;i<=qtdpaginas;i++){
				if(pagina==i){
					$('#paginador tr').append('<td  style="background: red"><a href="#" onclick="getitens('+i+', '+numitens+')">'+i+'</a></td>')
				}else{
					$('#paginador tr').append('<td><a href="#" onclick="filter_data('+i+', '+numItens+')">'+i+'</a></td>')
				}
			}
			if(pagina!=qtdpaginas){
				$('#paginador tr').append('<td><a href="#" onclick="filter_data('+(pagina+1)+', '+numItens+')">Próxima Página</a></td>')
			}
		}
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


var numItens=1;
var pagina=1;

function filter_data(pag, max)
{	
	pagina = pag;
	maximo = max;
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
			data:{pagina: pagina, maximo: max, action:action, categoria:categoria, cidade:cidade, pesquisa:pesquisa, getIndex:getIndex},
			// Retorno do Ajax
			success:function(data){

				// Funcao resultado
				$('.filter_data').html(data);
				contador();
				console.log('contador');
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

	function contador(){
		$.ajax({
			type: 'GET',
			data: 'tipo=contador',
			url:'assets/php/filter_post.php',
			success: function(retorno_pg){
				paginador(retorno_pg)
			}
		})
	}

	function paginador(cont){
		if(cont<=numItens){
			$('#paginador').html('<tr><td>Apenas uma Página<td><tr>')
		}else{

			console.log("cont");
			$('#paginador').html('<tr></tr>');
			if(pagina!=1){
				$('#paginador tr').append('<td><a href="#" onclick="filter_data('+(pagina-1)+', '+numItens+')">Página Anterior</a></td>')
			}
			var qtdpaginas=Math.ceil(cont/numItens)
			for(var i=1;i<=qtdpaginas;i++){
				if(pagina==i){
					$('#paginador tr').append('<td  style="background: red"><a href="#" onclick="getitens('+i+', '+numitens+')">'+i+'</a></td>')
				}else{
					$('#paginador tr').append('<td><a href="#" onclick="filter_data('+i+', '+numItens+')">'+i+'</a></td>')
				}
			}
			if(pagina!=qtdpaginas){
				$('#paginador tr').append('<td><a href="#" onclick="filter_data('+(pagina+1)+', '+numItens+')">Próxima Página</a></td>')
			}
		}
	}