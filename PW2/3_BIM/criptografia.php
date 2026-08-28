<?php

$texto = $_POST['texto'] ?? '';
$senha = $_POST['senha'] ?? '';
$executar = ($_SERVER['REQUEST_METHOD'] === 'POST' && $texto !== '');

function e($valor)
{
    return htmlspecialchars($valor);
}

if ($executar) {
    $hashSenha = $senha !== '' ? password_hash($senha, PASSWORD_DEFAULT) : '';

    $hmac = hash_hmac('sha256', $texto, 'chave-do-hmac');

    $chave = hash('sha256', 'minha-chave-secreta', true);
    $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $cifrado = openssl_encrypt($texto, 'aes-256-cbc', $chave, 0, $iv);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tipos de criptografia no PHP</title>
    <style>
        :root {
            --fundo: #f6f7f9;
            --papel: #ffffff;
            --texto: #1f2430;
            --apagado: #5b6472;
            --borda: #dce0e6;
            --destaque: #2f6feb;
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --fundo: #16191f;
                --papel: #1e222a;
                --texto: #e7e9ee;
                --apagado: #a3abb8;
                --borda: #333944;
                --destaque: #6ea0ff;
            }
        }

        body {
            max-width: 820px;
            margin: 0 auto;
            padding: 2rem 1.2rem 4rem;
            background: var(--fundo);
            color: var(--texto);
            font-family: system-ui, -apple-system, "Segoe UI", Arial, sans-serif;
            line-height: 1.6;
        }

        h1 {
            font-size: 1.6rem;
            padding-bottom: .6rem;
            border-bottom: 2px solid var(--destaque);
        }

        h2 {
            font-size: 1.15rem;
            margin-top: 2.2rem;
            color: var(--destaque);
        }

        p {
            color: var(--apagado);
        }

        ul {
            padding-left: 1.2rem;
        }

        li {
            margin-bottom: .4rem;
            overflow-wrap: anywhere;
        }

        code {
            font-family: ui-monospace, Consolas, monospace;
            font-size: .9em;
            background: var(--fundo);
            border: 1px solid var(--borda);
            border-radius: 4px;
            padding: .1em .35em;
        }

        form,
        h2+ul,
        h2+p+ul {
            background: var(--papel);
            border: 1px solid var(--borda);
            border-radius: 8px;
            padding: 1rem 1.2rem;
        }

        form p {
            margin: 0 0 .8rem;
        }

        input {
            display: block;
            width: 100%;
            box-sizing: border-box;
            margin-top: .3rem;
            padding: .5rem .6rem;
            font: inherit;
            color: var(--texto);
            background: var(--fundo);
            border: 1px solid var(--borda);
            border-radius: 6px;
        }

        button {
            padding: .55rem 1.4rem;
            font: inherit;
            color: #fff;
            background: var(--destaque);
            border: 0;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            filter: brightness(1.1);
        }

        hr {
            margin: 2.5rem 0;
            border: 0;
            border-top: 1px solid var(--borda);
        }
    </style>
</head>

<body>

    <h1>Tipos de criptografia no PHP</h1>

    <ul>
        <li><strong>Hash</strong>: resumo de tamanho fixo de qualquer dado. O mesmo texto gera
            sempre o mesmo resumo, e trocar um caractere muda o resultado inteiro. Serve para
            conferir integridade, não para esconder informação.</li>
        <li><strong>Hash de senha</strong>: um hash propositalmente lento e com salt aleatório,
            feito só para guardar senha. Como o salt muda a cada vez, não se compara hash com
            hash: usa-se <code>password_verify()</code>.</li>
        <li><strong>Via única</strong>: hash e HMAC. Só vão para frente — não existe função que
            desfaça. Para conferir, refaz-se a conta e compara-se o resultado.</li>
        <li><strong>Via dupla</strong>: criptografia propriamente dita. A mesma chave cifra e
            decifra, então o dado pode ser lido de volta. É o que se usa quando a informação
            precisa ser recuperada depois.</li>
    </ul>

    <form method="post">
        <p>
            <label>Texto:
                <input type="text" name="texto" value="<?= e($texto) ?>">
            </label>
        </p>
        <p>
            <label>Senha (opcional):
                <input type="password" name="senha">
            </label>
        </p>
        <p><button type="submit">Executar</button></p>
    </form>

    <hr>

    <?php if (!$executar): ?>

        <p>Digite um texto e clique em Executar.</p>

    <?php else: ?>

        <h2>1. Hash — via única, sem chave</h2>
        <ul>
            <?php foreach (['sha256', 'sha512'] as $algoritmo): ?>
                <li><?= $algoritmo ?>: <?= hash($algoritmo, $texto) ?></li>
            <?php endforeach; ?>
        </ul>
        <h2>2. Hash de senha — via única, com salt automático</h2>
        <?php if ($senha === ''): ?>
            <p>Preencha o campo de senha para ver esta seção.</p>
        <?php else: ?>
            <p>Recarregue a página com a mesma senha: o hash sai diferente, porque o salt é sorteado
                a cada chamada. Mesmo assim a verificação funciona, pois o salt fica guardado dentro
                do próprio hash.</p>
            <ul>
                <li>Hash gerado: <?= e($hashSenha) ?></li>
                <li>Senha correta: <?= password_verify($senha, $hashSenha) ? 'aceita' : 'recusada' ?></li>
                <li>Senha errada: <?= password_verify($senha . 'x', $hashSenha) ? 'aceita' : 'recusada' ?></li>
            </ul>
        <?php endif; ?>

        <h2>3. HMAC — via única, com chave</h2>
        <p>Hash misturado com uma chave secreta: além da integridade, prova que a mensagem veio
            de quem conhece a chave.</p>
        <ul>
            <li>HMAC-SHA256: <?= $hmac ?></li>
            <li>Conferindo com a chave certa:
                <?= hash_equals($hmac, hash_hmac('sha256', $texto, 'chave-do-hmac')) ? 'confere' : 'não confere' ?>
            </li>
            <li>Conferindo com a chave errada:
                <?= hash_equals($hmac, hash_hmac('sha256', $texto, 'chave-errada')) ? 'confere' : 'não confere' ?>
            </li>
        </ul>

        <h2>4. Criptografia simétrica (AES-256-CBC) — via dupla</h2>
        <p>A mesma chave cifra e decifra. O IV é sorteado a cada cifragem, então o mesmo texto
            gera um resultado diferente toda vez.</p>
        <ul>
            <li>IV usado: <?= bin2hex($iv) ?></li>
            <li>Texto cifrado: <?= e($cifrado) ?></li>
            <li>Texto decifrado: <?= e(openssl_decrypt($cifrado, 'aes-256-cbc', $chave, 0, $iv)) ?></li>
            <li>Mesmo texto, outro IV:
                <?= e(openssl_encrypt($texto, 'aes-256-cbc', $chave, 0, random_bytes(16))) ?>
            </li>
        </ul>

    <?php endif; ?>

</body>

</html>