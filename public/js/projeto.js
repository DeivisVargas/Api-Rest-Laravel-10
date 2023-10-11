


//utilizando come se fosse uma api a chamada
function deletarRegistro(rotaUrl , id){
    if (confirm('Deseja excluir o Id '+id)){
        //enviar a rota de delete
        let token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url : rotaUrl ,
            method : 'DELETE' ,
            headers: {
                'X-CSRF-TOKEN': token
            },
            data : {
                id : id
            },
            beforeSend: function (){
                $.blockUI({
                    message : 'Carregando' ,
                    timeout : 200
                })
            }
        }).done( function (data){

            if(data.success){
                window.location.reload();
            }else{
                alert('Não foi possivel excluir o produto');

            }

            $.unblockUI();
            console.log(data)
        }).fail( function (data){

            $.unblockUI();
            console.log(data)
            alert('Problemas ao excluir produto');
        });

    }
}


$("#cep").blur(function () {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            $("#logradouro").val("");
            $("#bairro").val(" ");
            $("#endereco").val(" ");
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                if (!("erro" in dados)) {
                    $("#logradouro").val(dados.logradouro.toUpperCase());
                    $("#bairro").val(dados.bairro.toUpperCase());
                    $("#endereco").val(dados.localidade.toUpperCase());
                }
                else {
                    alert("CEP não encontrado de forma automatizado digite manualmente ou tente novamente.");
                }
            });
        }
    }
});

//mascaras de validação para dinheiro
$('#valor').mask('#.##0,00' , {reverse : true});

