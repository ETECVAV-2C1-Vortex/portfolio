<?php

$texto = "";
$resultados = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $texto = $_POST["texto"] ?? "";

    /*
    ============================
    AES-256-GCM
    ============================
    */

    // Define o algoritmo
    $cipher = "aes-256-gcm";
    $chave = random_bytes(32);

    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = random_bytes($ivLength);
    $tag = "";

    // Criptografa o texto
    $criptografado = openssl_encrypt(
        $texto,
        $cipher,
        $chave,
        OPENSSL_RAW_DATA,
        $iv,
        $tag
    );

    $descriptografado = openssl_decrypt(
        $criptografado,
        $cipher,
        $chave,
        OPENSSL_RAW_DATA,
        $iv,
        $tag
    );


    /*
    ============================
    RESULTADOS
    ============================
    */

    $resultados = [

        "Password Hash (PASSWORD_DEFAULT)" =>
            password_hash($texto, PASSWORD_DEFAULT),

        "SHA-256" =>
            hash("sha256", $texto),

        "SHA-512" =>
            hash("sha512", $texto),

        "AES-256-GCM - Texto criptografado" =>
            base64_encode($criptografado),

        "AES-256-GCM - IV" =>
            base64_encode($iv),

        "AES-256-GCM - Tag de autenticação" =>
            base64_encode($tag),

        "AES-256-GCM - Texto descriptografado" =>
            $descriptografado
    ];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <title>Criptografia e Hash</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #111;
            color: white;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        input {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button {
            padding: 12px 25px;
            font-size: 16px;
            cursor: pointer;
        }

        .resultado {
            background: #222;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
        }

        .hash {
            font-family: monospace;
            color: #00ff88;
            word-break: break-all;
            margin-top: 10px;
        }

        .pratica {
            width: 70%;
            margin: 40px auto;
            background: #222;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Transformação Criptográfica de Strings</h1>

    <p>
        Digite qualquer texto para visualizar sua transformação
        através de diferentes algoritmos.
    </p>

    <form method="POST">

        <input
            type="text"
            name="texto"
            placeholder="Digite qualquer string..."
            value="<?= htmlspecialchars($texto) ?>"
            required
        >

        <button type="submit">
            Processar
        </button>

    </form>

    <?php if (!empty($resultados)): ?>

        <?php foreach ($resultados as $nome => $resultado): ?>

            <div class="resultado">

                <h2><?= htmlspecialchars($nome) ?></h2>

                <div class="hash">
                    <?= htmlspecialchars($resultado) ?>
                </div>

            </div>

        <?php endforeach; ?>

    <?php endif; ?>

</div>


<div class="pratica">

    <h1>Na prática</h1>

    <p>
        Como exemplo empírico do uso de criptografia, esta aplicação
        demonstra diferentes formas de transformar e proteger dados.
    </p>

    <p>
        O <strong>password_hash()</strong> é utilizado para gerar hashes
        seguros, especialmente para armazenamento de senhas.
    </p>

    <p>
        Os algoritmos <strong>SHA-256</strong> e <strong>SHA-512</strong>
        geram hashes determinísticos da string fornecida.
    </p>

    <p>
        Já o <strong>AES-256-GCM</strong> realiza criptografia reversível.
        O texto original é criptografado e pode ser recuperado utilizando
        a mesma chave, IV e tag de autenticação.
    </p>

</div>

</body>
</html>