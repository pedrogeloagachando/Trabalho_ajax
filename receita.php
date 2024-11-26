<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD JS</title>

    <style>
        .topo {
            margin-top: 50px;
        }

        .gradient-nav {
            background: linear-gradient(to right, #e0e0e0, #ffffff);
        }
    </style>
</head>

<body class="#f5f5f5 grey lighten-4">

    <?php
    require_once "headerNav.php";
    ?>

    <main class="container topo">
        <div class="card-panel">

            <form onsubmit="return salvarReceita(event);">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="ID" id="id_receita" name="id_receita" type="text" disabled>
                        <label for="id_receita">ID :</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="tipo" type="text" class="validate" name="tipo" pattern="^(?!.*').+$" required>
                        <label for="tipo">Tipo :</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="nome" type="text" class="validate" name="nome" pattern="^(?!.*').+$" required>
                        <label for="nome">Nome :</label>
                    </div>

                    <div class="input-field col s12">
                        <textarea id="textarea1" name="pais" class="materialize-textarea"></textarea>
                        <label for="textarea1">País de origem :</label>
                    </div>

                    <button class="btn waves-effect waves-light blue" type="submit">
                        Salvar Ficção Científica
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <br>

            <table class="highlight">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Nome</th>
                        <th>País de origem</th>
                        <th colspan="2">Opções</th>
                    </tr>
                </thead>

                <tbody id="receitas"></tbody>
            </table>
        </div>
        <a href='relatorio.php' class="blue waves-effect waves-light btn">
            <i class="material-icons right">add</i>Gerar relatório
        </a>
    </main>

    <script src="script.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.sidenav');
            M.Sidenav.init(elems, { edge: 'left' });
        });

        $('#textarea1').val('New Text');
        M.textareaAutoResize($('#textarea1'));
    </script>

</body>
</html>
