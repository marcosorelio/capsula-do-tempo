
$(document).ready(function () {

    let userToken = sessionStorage.getItem("user-token");
    
    $("#form-submit").submit(function (event) {
        event.preventDefault(); // Impede o envio padrão do formulário   

        var dados = $(this).serialize();
        console.log(dados);

        $.ajax({
            type: "POST",
            url: "app/controller/UsuarioController.php",
            data: dados,
            success: function (response) {
                sessionStorage.setItem("user-token", response);
                sessionStorage.setItem("user-token", response);
                // Código a ser executado após a resposta do PHP
                console.log(response); // Exibe a resposta do PHP no console
                //window.location.href = "./app-cadastro.html";
            }
        });
    });
});