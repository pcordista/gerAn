$(document).ready(function() {
    //variavel que recebe os checkbox
    var check = $(".checkboxfilter input:checkbox");
    var msg = $("#Resultado");
    //evento de change
    check.on("change", function(e) { //abertura da função on()
        //previne erros
        e.preventDefault();
 
        //função ajax()
        $.ajax({
            url : "assets/php/filtro.php",
            type : "POST",
            dataType : "html",
            data : $('.checks:checked').serialize()
        }).done(function(data) {
            msg.html(data);
        })
 
    });// finaliza a função on()
});