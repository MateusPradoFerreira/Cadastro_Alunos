<?php
include('conection.php');

if (!isset($_GET['busca'])) {
    $DadosRcebidos = "select *  from alunos order by nome_aluno";
} else {
    $pesquisa = $_GET['busca'];
    $DadosRcebidos = "select * from alunos where nome_aluno like '%$pesquisa%' order by nome_aluno";
}

$result_query = mysqli_query($conexaoSQL, $DadosRcebidos);

if (!isset($_POST['delt'])) {
} else {
    $idEX = $_POST['delt'];

    $DadosExcluidos = "delete from alunos where matricula = '$idEX'";
    mysqli_query($conexaoSQL, $DadosExcluidos);
    header("Refresh: 0");
}

if (!isset($_POST['edd_matricula'])) {
} else {
    $matricula = $_POST['edd_matricula'];
    $CPF = $_POST['CPF'];
    $RG = $_POST['RG'];
    $nome_aluno = $_POST['nome_aluno'];
    $data_nas = $_POST['data_nas'];
    $curso = $_POST['curso'];
    $sexo = $_POST['sexo'];
    $turno = $_POST['turno'];
    $ano = $_POST['ano'];

    $DadosEditados = "UPDATE alunos
    SET CPF = '$CPF', RG = '$RG', nome_aluno = '$nome_aluno', data_nas = '$data_nas',  curso = '$curso', sexo = '$sexo', turno = '$turno', ano = '$ano'
    WHERE matricula = '$matricula';";
    mysqli_query($conexaoSQL, $DadosEditados);
    header("Refresh: 0");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 col-xs-9 col-sm-12 col-md-12 col-lg-10 col-xl-10">
                <div class="box-principal">
                    <div class="row">
                        <div class="col-12">
                            <h2>Listagem de Alunos</h2>
                        </div>
                    </div>

                    <div class="row">
                        <form action="">
                            <div class="barra-pesquisa">
                                <input value="<?php if (!isset($_GET['busca'])) {
                                                } else {
                                                    echo $pesquisa;
                                                }
                                                ?>" name="busca" type="text" placeholder="Digite o nome de um aluno">
                                <button type="submit">P</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="cont-scrol">
                            <table>
                                <tr>
                                    <th>
                                        <h6>Nome do Aluno</h6>
                                    </th>
                                    <th>
                                        <div class="bx-azul" id="bx">
                                            CPF
                                        </div>
                                    </th>
                                    <th>
                                        <div class="bx-azulclaro" id="bx">
                                            RG
                                        </div>
                                    </th>
                                    <th>
                                        <div class="bx-rosa" id="bx">
                                            Data Nas.
                                        </div>
                                    </th>
                                    <th>
                                        <div class="bx-amarela" id="bx">
                                            Curso
                                        </div>
                                    </th>
                                    <th>
                                        <div class="bx-vermelha" id="bx">
                                            Turno
                                        </div>
                                    </th>
                                    <th>
                                        <div class="bx-roxa" id="bx">
                                            Ano
                                        </div>
                                    </th>
                                </tr>

                                <?php
                                if (mysqli_num_rows($result_query) > 0) {
                                    $i = 1;
                                    while ($linha = mysqli_fetch_assoc($result_query)) {
                                        $i = $i + 1;
                                ?>
                                        <tr class="<?php if ($i % 2 == 1) {
                                                        echo "linha-colorida";
                                                    } else {
                                                    }

                                                    ?>">
                                            <td data-title='Nome do Aluno'>
                                                <?= $linha['nome_aluno'] ?>
                                            </td>
                                            <td data-title='CPF'>
                                                <?= $linha['CPF'] ?>
                                            </td>
                                            <td data-title='RG'>
                                                <?= $linha['RG'] ?>
                                            </td>
                                            <td data-title='Data de Nascimento'>
                                                <?= $linha['data_nas'] ?>
                                            </td>
                                            <td data-title='Curso'>
                                                <?= $linha['curso'] ?>
                                            </td>
                                            <td data-title='Turno'>
                                                <?= $linha['turno'] ?>
                                            </td>
                                            <td data-title='Ano'>
                                                <?= $linha['ano'] ?>
                                            </td>

                                            <td>
                                                <form action="editar.php" method="post"><button class="bnt-edit" value="<?= $linha['matricula'] ?>" name="edit">Editar</button></form>
                                            </td>
                                            <td>
                                                <form action="" method="post"><button class="bnt-excl" type="submit" value="<?= $linha['matricula'] ?>" name="delt">Deletar</button></form>
                                            </td>

                                        </tr>



                                    <?php
                                    }
                                } else {
                                    ?>

                                    <tr>
                                        <td colspan="10">
                                            <h4 class="falha">Nenhum(a) Aluno(a) encontrado(a)!!</h4>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>

                                <tr>
                                    <td colspan="10"><a href="registra.php"><button class="bnt-add">ADICIONAR</button></a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel='stylesheet' href="style.css">

</body>

</html>