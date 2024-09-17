<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Notas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #00FFFF;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #00CED1;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #007bff;
        }
        .form-control {
            border-color: #00CED1;
            color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .result {
            background: #e9ecef;
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Formulário de Notas</h2>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="nota1">Nota um:</label>
                <input type="number" step="0.01" class="form-control" id="nota1" name="nota1" required>
            </div>
            <div class="form-group">
                <label for="nota2">Nota dois:</label>
                <input type="number" step="0.01" class="form-control" id="nota2" name="nota2" required>
            </div>
            <div class="form-group">
                <label for="nota3">Nota três:</label>
                <input type="number" step="0.01" class="form-control" id="nota3" name="nota3" required>
            </div>
            <div class="form-group">
                <label for="nota4">Nota quatro:</label>
                <input type="number" step="0.01" class="form-control" id="nota4" name="nota4" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular Média</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];
            $nota4 = $_POST['nota4'];

            $media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;

            echo "<div class='result'>";
            echo "<h3>Resultado</h3>";
            echo "<p>Média: <span style='color: #007bff;'>" . number_format($media, 2) . "</span></p>";

            if ($media >= 9) {
                $conceito = "A";
                $mensagem = "Aprovado com Louvor";
            } elseif ($media >= 7) {
                $conceito = "B";
                $mensagem = "Aluno Aprovado";
            } elseif ($media >= 4) {
                $conceito = "C";
                $mensagem = "Recuperação, sua chance de passar";
                echo "<form action='recup.php' method='post'>
                        <input type='hidden' name='media' value='" . number_format($media, 2) . "'>
                        <div class='form-group'>
                            <label for='recuperacao'>Nota da Recuperação:</label>
                            <input type='number' step='0.01' class='form-control' id='recuperacao' name='recuperacao' required>
                        </div>
                        <button type='submit' class='btn btn-primary'>Verificar Recuperação</button>
                      </form>";
            } else {
                $conceito = "D";
                $mensagem = "Poxa vida, vamos tentar novamente ano que vem";
            }

            echo "<p>Conceito: <span style='color: #ff5733;'>$conceito</span></p>";
            echo "<p class='message'>$mensagem</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
