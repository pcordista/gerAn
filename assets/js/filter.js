$(document).ready(function() {
    //variavel que recebe os checkbox
    var check = $("select[name=empresa_destino]");
    var msg = $("#Resultado");
    //evento de change
    check.change(function() { //abertura da função on()

      var filterCategoria = $(this).val();
        //previne erros
        e.preventDefault();

        //função ajax()
        $.ajax({
            url : "assets/php/filtro.php",
            type : "POST",
            dataType : "html",
            data : $('filterCategoria': filterCategoria).serialize()
        }).done(function(data) {
            msg.html(data);
        })

    };// finaliza a função on()
});