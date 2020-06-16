<?php include "inc/header_adm.php"; ?>



<br><br><br><br><br>



<div class="container-login100-form-btn-cadastro">

<div><h2>Visualização de Provedor</h2>

<br>
<br>

        <form method="POST" action="PAGINADEPROCESSO...">
            <label class="label">Nome da Empresa: </label>
            <input class="form-control" type="text" id="nome" name="nome" value="<?=$provedor->GetNome()?>" disabled placeholder="Nome da empresa" ><br>
            
            <label class="label">CNPJ: </label><br>
            <input class="form-control" type="text" name="cnpj" value="<?=$provedor->GetCnpj()?>" id="cnpj"  disabled placeholder="CNPJ" ><br>



</div>
            
            
            <script>

    // selecionando o documento inteiro, aguarda o carregamento completo da pagina
    $(document).ready(function () {

        //MÁSCARA DOS TEXT BOX!!!
        $("#cnpj").mask("AA.AAA.AAA/AAAAA-AA");
		





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


<?php include 'inc/footer.php'; ?>
