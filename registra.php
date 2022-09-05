<?php
include('conection.php');

$confirmacao = 0;

function formatCnpjCpf($value)
{
    $CPF_LENGTH = 11;
    $cnpj_cpf = preg_replace("/\D/", '', $value);

    if (strlen($cnpj_cpf) === $CPF_LENGTH) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    }
}

if (!isset($_POST['confirmar'])) {
} else {
    $CPF = formatCnpjCpf($_POST['CPF']);
    $RG = $_POST['RG'];
    $nome_aluno = $_POST['nome_aluno'];
    $data_nas = $_POST['data_nas'];
    $curso = $_POST['curso'];
    $sexo = $_POST['sexo'];
    $turno = $_POST['turno'];
    $ano = $_POST['ano'];

    $DadosEnviados = "INSERT INTO alunos (CPF, RG, nome_aluno, data_nas, curso , sexo, turno, ano) 
    VALUES ('$CPF', '$RG', '$nome_aluno', '$data_nas', '$curso', '$sexo', '$turno', '$ano')";
    mysqli_query($conexaoSQL, $DadosEnviados);

    $confirmacao = 1;
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
                    <form action="" method="post">

                        <div class="row">
                            <div class="col-12">
                                <h2>Adicionar Aluno</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/do-utilizador.png" alt="">
                                    </div>
                                    <input name="nome_aluno" type="text" placeholder="Nome completo do aluno" maxlength="45" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/carteira-de-motorista.png" alt="">
                                    </div>
                                    <input name="CPF" type="text" placeholder="CPF ( 00000000000 )" maxlength="11" required>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/identificacao.png" alt="">
                                    </div>
                                    <input name="RG" type="text" placeholder="RG ( 000000000 )" maxlength="9" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/encontro.png" alt="">
                                    </div>
                                    <input name="data_nas" type="date" required>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="prenc">
                                    <div class="img-icon">
                                        <img src="imagens/sexos.png" alt="">
                                    </div>
                                    <select name="sexo" id="">
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
                                <button class="bnt-confirm" type="submit" name="confirmar">ADICIONAR</button>
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

    <?php
    if ($confirmacao == 1) {
        echo '
        <script>
        alert("Aluno ' . $nome_aluno . ' foi cadastrado com sucesso!!");
        </script>';
    }
    ?>
</body>

</html>