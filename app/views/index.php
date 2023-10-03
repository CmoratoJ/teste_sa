<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Language" content="pt-br">
    <link rel="stylesheet" type="text/css" href="../../app/assets/css/style.css">
    <title>Formulário</title>
</head>
<body onload="onLoadPage()">
<div class="panel">
    <div class="header">
        <div class="title">Formulário de teste</div>
        <div class="container">
            <div class="box">
                <div id="conteudo">
                    <?php
                    use App\controllers\UI_Comp_Formulario;

                    $compFormulario = new UI_Comp_Formulario(true);

                    if (!empty($_POST)) {
                        echo $compFormulario->renderer($_POST);
                        if ($compFormulario->validate()) {
                            echo 'Formulário válido';
                        } else {
                            echo 'Formulário inválido';
                        }
                    } else {
                        echo $compFormulario->renderer();
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        Teste de Formulário
    </div>
</div>
</body>
<script src="../../app/assets/js/index.js"></script>
</html>