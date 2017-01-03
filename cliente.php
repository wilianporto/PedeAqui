<head>
    <title>Pede Aqui</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="js/js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <script src="js/igorescobar-jQuery-Mask-Plugin-535b4e4/jquery.mask.min.js"></script>
</head>
<body>
    <script type="text/javascript">
        $(document).ready(function () {
            listaCat();
            listaVend();
            $("#fone").mask("(00) 0000-0000");
        });


        function listaVend() {
            $.ajax({
                url: 'cliente/listaCliente.php',
                success: function (data) {
                    $(".listaVend").html(data);
                }
            });
        }

        function exclui(nome) {
            var info = {"cod_vende": nome};
            $.ajax({
                type: 'post',
                url: 'vendedor/excluiVendedor.php',
                data: info,
            }).done(function (data) {
                Materialize.toast(data, 2000);
                listaVend();
            });
        }
        function envia() {
            var nome = $('#nome').val();
            var cnpjCpf = $('#cnpjCpf').val();
            var fone = $('#fone').val();
            var rua = $('#rua').val();
            var numero = $('#numero').val();
            var cidade = $('#cidade').val();
            var estado = $('#estado').val();
            var senha = $('#senha').val();
            var login = $('#login').val();
            var info = {"nome": nome, "doc": cnpjCpf, "fone": fone, "rua": rua, "numero": numero, "cidade": cidade, "estado": estado, "login":login, "senha":senha};
            $.ajax({
                type: 'post',
                url: 'cliente/cadastraCliente.php',
                data: info
            }).done(function (data) {
                Materialize.toast(data, 3000);
                listaVend();
                
            });
        }
        function altera() {
            var form             = $('#frm_altera');
            var cod_vendedor     = $("input[name=cod_vendedor]", form).val();
            var cod_telefone     = $("input[name=cod_telefone]", form).val();
            var cod_cat_vendedor = $("input[name=cod_cat_vendedor]", form).val();
            var cod_endereco     = $("input[name=cod_endereco]", form).val();
            var nome             = $("input[name=nome]", form).val();
            var descri           = $("input[name=descri]", form).val();
            var categoria        = $("input[name=categoria]", form).val();
            var telefone         = $("input[name=telefone]", form).val();
            var estado           = $("input[name=estado]", form).val();
            var situacao         = $("input[name=situacao]", form).val();
            var cidade           = $("input[name=cidade]", form).val();
            var login            = $("input[name=login]", form).val();
            var senha            = $("input[name=senha]", form).val();
            var info = {"nome": nome, "descricao": descri, "cod_vendedor": cod_vendedor, 
                "cod_cat_telefone": cod_cat_vendedor, "cod_telefone": cod_telefone, "cod_endereco":cod_endereco,
                "categoria": categoria, "telefone": telefone, "estado":estado, "situacao": situacao, "cidade":cidade, "login":login, "senha":senha};
            $.ajax({
                type: 'post',
                url: 'categoria_vendedor/editaVendedor.php',
                data: info,
                success: function (data) {
                    Materialize.toast(data, 2000);
                    listaCat();
                }
            });
        }
    </script>
    <div class="container">
        <form id="formulario">
            <div class="container">
                <br><br>
                
                <div class="input-field col s6">
                    <input require id="nome" type="text" class="validate">
                    <label for="nome">Nome cliente</label>
                </div>
                <div class="input-field col s6">
                    <input require type="text" id="rua"/>
                    <label for="rua">Rua</label>
                </div>
                <div class="input-field col s6">
                    <input require type="number" id="numero"/>
                    <label for="numero">Número</label>
                </div>
                <div class="input-field col s12">
                    <select id="estado">
                        <option value="" name="estado" disabled selected>Selecione um estado</option>
                        <option value="ac">Acre</option> 
                        <option value="al">Alagoas</option> 
                        <option value="am">Amazonas</option> 
                        <option value="ap">Amapá</option> 
                        <option value="ba">Bahia</option> 
                        <option value="ce">Ceará</option> 
                        <option value="df">Distrito Federal</option> 
                        <option value="es">Espírito Santo</option> 
                        <option value="go">Goiás</option> 
                        <option value="ma">Maranhão</option> 
                        <option value="mt">Mato Grosso</option> 
                        <option value="ms">Mato Grosso do Sul</option> 
                        <option value="mg">Minas Gerais</option> 
                        <option value="pa">Pará</option> 
                        <option value="pb">Paraíba</option> 
                        <option value="pr">Paraná</option> 
                        <option value="pe">Pernambuco</option> 
                        <option value="pi">Piauí</option> 
                        <option value="rj">Rio de Janeiro</option> 
                        <option value="rn">Rio Grande do Norte</option> 
                        <option value="ro">Rondônia</option> 
                        <option value="rs">Rio Grande do Sul</option> 
                        <option value="rr">Roraima</option> 
                        <option value="sc">Santa Catarina</option> 
                        <option value="se">Sergipe</option> 
                        <option value="sp">São Paulo</option> 
                        <option value="to">Tocantins</option> 
                    </select>
                    <label>Estado</label>
                </div>
                <div class="input-field col s6">
                    <input require type="text" id="cidade"/>
                    <label for="cidade">Cidade</label>
                </div>
                <div class="input-field col s6">
                    <input require type="text" id="cnpjCpf"/>
                    <label for="cnpjCpf">CNPJ/CPF</label>
                </div>
                <div class="input-field col s6">
                    <input require type="text" id="fone"/>
                    <label for="fone">Fone</label>
                </div>
                <div class="input-field col s6">
                    <input require type="email" id="login"/>
                    <label for="login">login</label>
                </div>
                <div class="input-field col s6">
                    <input require type="password" class="validate" id="senha"/>
                    <label for="senha">Senha</label>
                </div>
                <a onclick="envia()" class="waves-effect green darken-1t btn  modal-action modal-close">Cadastrar</a>
            </div>
        </form>
        <div class="listaVend">
        </div>
    </div>
    
    <div class="resposta">
    </div>
</body>