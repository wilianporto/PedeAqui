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

        function listaCat() {
            $.ajax({
                url: 'vendedor/listaCatVendedor.php',
                success: function (data) {
                    $(".listaCat").html(data);
                    $('select').material_select();
                }
            });
        }

        function listaVend() {
            $.ajax({
                url: 'vendedor/listaVendedor.php',
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
            var situ = $('#situacao').prop('checked');
            var fone = $('#fone').val();
            var rua = $('#rua').val();
            var numero = $('#numero').val();
            var cidade = $('#cidade').val();
            var estado = $('#estado').val();
            var categ = $('#categora_vendedor').val();
            var senha = $('#senha').val();
            var login = $('#login').val();
            var info = {"nome": nome, "doc": cnpjCpf, "txtSituacao": situ, "fone": fone, "rua": rua, "numero": numero, "cidade": cidade, "estado": estado, "categ": categ, "login":login, "senha":senha};
            $.ajax({
                type: 'post',
                url: 'vendedor/cadastraVendedor.php',
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
        function modalAltera(cod_vendedor, cod_telefone, cod_cat_vendedor, cod_endereco, nome, descri, categoria, telefone, situacao, cidade, estado) {
            var form = $('#modal1 form_altera').get(0);
            $(form.cod_vendedor).attr('value', cod_vendedor);
            $(form.cod_telefone).attr('value', cod_telefone);
            $(form.cod_cat_vendedor).attr('value', cod_cat_vendedor);
            $(form.cod_endereco).attr('value', cod_endereco);
            $(form.nome).attr('placeholder', nome);
            $(form.descri).attr('placeholder', descri);
            $(form.categoria).attr('placeholder', categoria);
            $(form.telefone).attr('placeholder', telefone);
            $(form.situacao).attr('placeholder', situacao);
            $(form.cidade).attr('placeholder', cidade);
            $(form.estado).attr('placeholder', estado);
            lista();
        }
    </script>
    <div class="container">
        <form id="formulario">
            <div class="container">
                <br><br>
                <div class="listaCat">
                </div>
                <div class="input-field col s6">
                    <input require id="nome" type="text" class="validate">
                    <label for="nome">Nome da empresa/Vendedor</label>
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
                <div class="switch">
                    <div class="input-field col s6">
                        <label>
                            Inativo
                            <input require id="situacao" type="checkbox" name="situacao">
                            <span class="lever"></span>
                            Ativo
                        </label>
                        <br><br>
                    </div>
                </div>
                <a onclick="envia()" class="waves-effect green darken-1t btn  modal-action modal-close">Cadastrar</a>
            </div>
        </form>
        <div class="listaVend">
        </div>
    </div>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Alterar</h4>
            <form id="frm_altera">
                <div class="container">
                    Codigo Vendedor: <input disabled id="disable" type="text" name="cod_vendedor" value="" class="validate"/>
                    <label for="disabled"></label>
                    Codigo categoria: <inpute disabled  id="disable" type="text" name="cod_cat_vendedor" value="" class="validate"/>
                    <label for="disabled"></label>
                    Codigo Telefone: <input  disabled  id="disable" type="text" name="cod_telefone" value="" class="validate"/>
                    <label for="disabled"></label>
                    Codigo Endereco: <input  disabled id="disable" type="text" name="cod_endereco" value="" class="validate"/>
                    <label for="disabled"></label>
                    <label>Nome: <input require type="text" name="nome"/></label>
                    <label>Descrição: <input require type="text" name="descri"/></label>
                    <label>categoria: <input require type="text" name="categoria"/></label>
                    <label>Telefone: <input require type="text" name="telefone"/></label>
                    <label>Situacao: <input require type="text" name="situacao"/></label>
                    <label>Cidade: <input require type="text" name="cidade"/></label>
                    <label>Estado: <input require type="text" name="estado"/></label>
                    <a onclick="altera()" class="waves-effect waves-light btn  modal-action modal-close">Alterar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="resposta">
    </div>
</body>