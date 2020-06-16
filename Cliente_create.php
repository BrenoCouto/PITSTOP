<?php include "inc/header_adm.php"; ?>





<br><br><br><br><br>
<div class="container-login100-form-btn-cadastro">

<div><h2>Visualização de CLiente</h2>

<br>
<br>

        <form method="POST" action="?classe=Cliente&acao=create">
            <label class="label">Nome: </label>
            <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome da empresa" ><br>

            <label class="label">Data de Nascimento: </label>
            <input class="form-control" type="date" id="nascimento" name="nascimento" placeholder="Data de Nascimento" ><br>
            
            <label class="label">CPF: </label><br>
            <input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF" ><br>
            


            <button class="login100-form-btn-novo-view" type="submit">Novo</button>
            <br>




</div>
            
            
            <script>

    // selecionando o documento inteiro, aguarda o carregamento completo da pagina
    $(document).ready(function () {


        $("#cpf").mask("999.999.999-99");
		





//ESSE CÓDIGO AQUI É PARA AJUDAR NO BANCO DE DADOS, ELE MUDA O VALOR DA MÁSCARA PARA O ORIGINAL DO BANCO DE DADOS
        $('#cep').change(function () {

            var cep = $("#cep").val().replace(/\D/g,''); //BEM AQUI NESSE REPLACE QUE ELE MUDA...

            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/", function(dados) {

                if (!("erro" in dados)) {
                    $("#rua").val(dados.logradouro);
                    $("#bairro").val(dados.bairro);
                    $("#cidade").val(dados.localidade);
                    $("#uf").val(dados.uf);
                }
            });

        });
		
		
		
		 $('#celular').change(function () {

            var celular = $("#celular").val().replace(/\D/g,'');

            $.getJSON("http://localhost/pelomundo/api.php?celular="+ celular , function(dados) {

                if (!("erro" in dados)) {
                    $("#nome").val(dados.nome);
                    $("#cpf").val(dados.cpf);
                   
                }
            });

        });

    });



</script>











            
</form>

</div>

<br>
<br>
<br>

<?php include 'inc/footer.php'; ?>