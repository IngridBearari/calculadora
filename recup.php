<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Recuperação</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .result {
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .result p {
            font-size: 1.1em;
            margin: 10px 0;
        }
        .result .message {
            font-weight: bold;
        }
        .result.passed {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .result.failed {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }


        h3 {
            color: #d4edda;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Resultado da Recuperação</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $media = $_POST['media'];
            $recuperacao = $_POST['recuperacao'];

            $mediaFinal = ($media + $recuperacao) ;

            echo "<div class='result ";
            if ($mediaFinal >= 10) {
                echo "passed'>";
                echo "<p>Média Bimestral: <span>" . number_format($media, 2) . "</span></p>";
                echo "<p>Nota da Recuperação: <span>" . number_format($recuperacao, 2) . "</span></p>";
                echo "<p>Média Final: <span>" . number_format($mediaFinal, 2) . "</span></p>";
                echo "<p class='message'>Aluno Aprovado com Recuperação!</p>";
            } else {
                echo "failed'>";
                echo "<p>Média Bimestral: <span>" . number_format($media, 2) . "</span></p>";
                echo "<p>Nota da Recuperação: <span>" . number_format($recuperacao, 2) . "</span></p>";
                echo "<p>Média Final: <span>" . number_format($mediaFinal, 2) . "</span></p>";
                echo "<p class='message'>Aluno Reprovado, continue tentando!</p>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
