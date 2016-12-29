<head>
    <title>Pede Aqui</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
</head>
<body>
    <form id="formulario">
        <div class="container">
            <label>Nome: <input type="text" name="nome" placeholder="Nome"/></label>
            <label>Descrição curta: <input type="text" name="descri" placeholder="Descrição curta"/></label>
            <a onclick="envia()" class="waves-effect green darken-1t btn  modal-action modal-close">Cadastrar</a>
        </div>
    </form>
    <div class="lista">
    </div>
    <div class="resposta container">
        <h5></h5>
    </div>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Alterar</h4>
            <form id="frm_altera">
                <div class="container">
                    Código: <input disabled type="text" id="disable" type="text" name="cod_cat_vendedor" value="" class="validate"/>
                    <label for="disabled"></label>
                    <label>Nome: <input type="text" name="nome"/></label>
                    <label>Descrição: <input type="text" name="descri"/></label>
                    <a onclick="altera()" class="waves-effect waves-light btn  modal-action modal-close">Alterar</a>
                </div>
            </form>
        </div>
    </div>
       <script type="text/javascript">
        $(document).ready(function () {
            lista();
        });

        function lista() {
            $.ajax({
                url: 'categoria_vendedor/listaCategoriaVendedor.php',
                success: function (data) {
                    $(".lista").html(data);
                    $('.modal-trigger').leanModal();
                }
            });
        }

        function exclui(cod_cat_vendedor) {
            var info = {"cod_cat_vendedor": cod_cat_vendedor};
            $.ajax({
                type: 'post',
                url: 'categoria_vendedor/excluiCategoriaVendedor.php',
                data: info,
            }).done(function (data) {
                Materialize.toast(data, 2000);
                lista();
            });
        }

        function envia() {
            var nome = $("input[name=nome]").val();
            var descri = $("input[name=descri]").val();
            var info = {"nNome": nome, "nDescri": descri};
            $.ajax({
                type: 'post',
                url: 'categoria_vendedor/cadastraCategoriaVendedor.php',
                data: info,
            }).done(function (data) {
                Materialize.toast(data, 2000);
                lista();
            });
        }
        function altera() {
            var form         = $('#frm_altera');
            var nome         = $("input[name=nome]", form).val();
            var cod_cat_vendedor = $("input[name=cod_cat_vendedor]", form).val();
            var descri       = $("input[name=descri]", form).val();
            var info = {"nNome": nome, "nDescri": descri, "cod_cat_vendedor": cod_cat_vendedor};
            $.ajax({
                type: 'post',
                url: 'categoria_vendedor/editaCategoriaVendedor.php',
                data: info,
                success: function (data) {
                    Materialize.toast(data, 2000);
                    lista();
                }
            });
        }

        function modalAltera(cod_cat_vendedor, nome, descri) {
            var form = $('#modal1 form').get(0);
            $(form.cod_cat_vendedor).attr('value', cod_cat_vendedor);
            $(form.nome).attr('placeholder', nome);
            $(form.descri).attr('placeholder', descri);
            lista();
        }
    </script>
</body>