<?php

    // Exercícios 1
    $emails = "  ADMIN@EMPRESA.COM ,  contato@Site.COM  ,SUPORTE@dominio.com  ,   Vendas@Empresa.com "; // Entrada
    // Saída = E-mail principal: admin@empresa.com

    $emailsLimpos = trim($emails);
    $arrayEmails = explode(",", $emailsLimpos);
    $emailConvertido = strtolower($arrayEmails[0]);
    echo $emailConvertido;

    // Exercício 2
    $estadosBrasil = [
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins'
    ];

    // Exercício 3
    $alunos = [
        ["nome" => "Ana", "idade" => 18, "nota" => 8.5],
        ["nome" => "Bruno", "idade" => 20, "nota" => 7.0],
        ["nome" => "Carlos", "idade" => 19, "nota" => 9.2],
        ["nome" => "Daniela", "idade" => 21, "nota" => 6.8],
        ["nome" => "Eduardo", "idade" => 22, "nota" => 5.9],
        ["nome" => "Fernanda", "idade" => 18, "nota" => 7.8],
        ["nome" => "Gabriel", "idade" => 20, "nota" => 8.1],
        ["nome" => "Helena", "idade" => 19, "nota" => 9.0],
        ["nome" => "Igor", "idade" => 23, "nota" => 6.4],
        ["nome" => "Juliana", "idade" => 21, "nota" => 7.5],
        ["nome" => "Lucas", "idade" => 20, "nota" => 8.9],
        ["nome" => "Mariana", "idade" => 18, "nota" => 9.4],
    ];

    // Ordenar as notas dos alunos do maior para o menor.
    usort($alunos, function($a, $b) {
        return $b['nota'] <=> $a['nota'];
    });

    $somaNotas = 0;
    $totalAlunos = count($alunos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios</title>
    <style>
        table{width: 25%; border-collapse: collapse; font-family: sans-serif;}
        thead{background-color: #F2F2F2;}
        tr, td{border: 1px solid #CCC; padding: 5px;}
        .reprovado { background-color: #ffcccc; }
        .status-aprovado { color: green; font-weight: bold; }
        .status-reprovado { background-color: #FFCCCC; color: red; font-weight: bold; }
    </style>
</head>

<body>
    <!-- Exercício 1 -->
    <h1>Exercícios em sala de aula</h1>
    <h2>Estados do Brasil</h2>

    <label for="estados">Escolhe o seu estado:</label>
    <select name="estados" id="estados">
        <option value = "">Selecione um estado: </option>
            <?php foreach ($estadosBrasil as $sigla => $nome): ?>
        <option value= "<?= $sigla ?>">
            <?= $nome ?>
        </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" onclick="">Enviar</button>

    <!-- Exercício 2 -->
    <h2>Lista de Alunos</h2>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Nota</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($alunos as $aluno):
                $somaNotas += $aluno["nota"];
                $status = ($aluno["nota"] >= 7) ? "Aprovado" : "Reprovado";
                $cssStatus = ($aluno['nota'] >= 7) ? 'status-aprovado' : 'status-reprovado';
            ?>
            
            <tr>
                <td> <?php echo $aluno["nome"];?> </td>
                <td> <?php echo $aluno["idade"];?> </td>
                <td> <?php echo $aluno["nota"];?> </td> 
                <td class="<?= $cssStatus ?>"><?= $status ?></td>
            </tr>
            
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php $mediaTurma = $somaNotas / $totalAlunos ?>
    <p> <strong>A média geral da turma:</strong> <?php echo number_format($mediaTurma, 1)?> </p>
</body>
</html>
