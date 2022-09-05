<?php
include('conection.php');

if (!isset($_POST['edit'])) {
} else {
    $idED = $_POST['edit'];

    $DadosRcebidos = "select *  from alunos where matricula = '$idED'";
    $result_query = mysqli_query($conexaoSQL, $DadosRcebidos);
    $dados = mysqli_fetch_assoc($result_query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-6 col-xl-6">
                <div class="box-sec">
                    <form action="index.php" method="post">

                        <div class="row">
                            <div class="col-12">
                                <h2>Editar Aluno</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/do-utilizador.png" alt="">
                                    </div>
                                    <input value="<?= $dados['nome_aluno'] ?>" name="nome_aluno" type="text" placeholder="Nome completo do aluno" maxlength="45" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/carteira-de-motorista.png" alt="">
                                    </div>
                                    <input value="<?= $dados['CPF'] ?>" name="CPF" type="text" placeholder="CPF ( 00000000000 )" maxlength="11" required>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/identificacao.png" alt="">
                                    </div>
                                    <input value="<?= $dados['RG'] ?>" name="RG" type="text" placeholder="RG ( 000000000 )" maxlength="9" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/encontro.png" alt="">
                                    </div>
                                    <input value="<?= $dados['data_nas'] ?>" name="data_nas" type="date" required>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/sexos.png" alt="">
                                    </div>
                                    <select name="sexo" id="">
                                        <option value="<?= $dados['sexo'] ?>">Atual [ <?= $dados['sexo'] ?> ]</option>
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMININO">FEMININO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/curso-online.png" alt="">
                                    </div>
                                    <select name="curso" id="">
                                        <option value="<?= $dados['curso'] ?>">Atual [ <?= $dados['curso'] ?> ]</option>
                                        <option value="AGRONOMIA">AGRONOMIA</option>
                                        <option value="AGROPECUARI">AGROPECUARI</option>
                                        <option value="INFORMATICA">INFORMATICA</option>
                                        <option value="ZOOTECNIA">ZOOTECNIA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/algoritmo.png" alt="">
                                    </div>
                                    <select name="turno" id="">
                                        <option value="<?= $dados['turno'] ?>">Atual [ <?= $dados['turno'] ?> ]</option>
                                        <option value="VESPERTINO">VESPERTINO</option>
                                        <option value="MATUTINO">MATUTINO</option>
                                        <option value="INTEGRADO">INTEGRADO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/ano.png" alt="">
                                    </div>
                                    <select name="ano" id="">
                                        <option value="<?= $dados['ano'] ?>">Atual [ <?= $dados['ano'] ?> ]</option>
                                        <option value="1° ano">1° ano</option>
                                        <option value="2° ano">2° ano</option>
                                        <option value="3° ano">3° ano</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <div class="col-12">
                                <button class="bnt-confirm" type="submit" value="<?= $dados['matricula'] ?>" name="edd_matricula">CONFIRMAR ATUALIZÇÃO</button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-12">
                            <a href="index.php"><Button class="bnt-cancel">CANCELAR</Button></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</body>

</html>