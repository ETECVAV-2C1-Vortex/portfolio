<?php

$texto = $_POST['texto'] ?? '';
$senha = $_POST['senha'] ?? '';
$executar = ($_SERVER['REQUEST_METHOD'] === 'POST' && $texto !== '');

function e($valor)
{
    return htmlspecialchars($valor);
}

// Chaves e assinaturas são longas demais para a tela: mostra-se só o começo.
function cortar($valor, $limite = 100)
{
    return strlen($valor) > $limite ? substr($valor, 0, $limite) . '...' : $valor;
}

if ($executar) {
    $hashSenha = $senha !== '' ? password_hash($senha, PASSWORD_DEFAULT) : '';

    $hmac = hash_hmac('sha256', $texto, 'chave-do-hmac');

    $chave = hash('sha256', 'minha-chave-secreta', true);
    $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $cifrado = openssl_encrypt($texto, 'aes-256-cbc', $chave, 0, $iv);

    // Gerar o par leva algumas centenas de milissegundos, por isso ele é gerado uma
    // vez só e reaproveitado na cifragem e na assinatura. Em produção o par seria
    // gerado uma única vez e guardado em arquivo, nunca a cada requisição.
    $par = openssl_pkey_new([
        'private_key_bits' => 2048,
        'private_key_type' => OPENSSL_KEYTYPE_RSA,
    ]);

    // Em instalações sem openssl.cnf configurado a geração falha; a página avisa.
    $rsaOk = $par !== false;

    if ($rsaOk) {
        openssl_pkey_export($par, $chavePrivada);
        $chavePublica = openssl_pkey_get_details($par)['key'];

        // RSA cifra no máximo o tamanho da chave menos o padding. Conferir antes evita
        // que openssl_public_encrypt devolva false com um aviso na tela.
        $rsaCabe = strlen($texto) <= 190;

        if ($rsaCabe) {
            openssl_public_encrypt($texto, $rsaCifrado, $chavePublica, OPENSSL_PKCS1_OAEP_PADDING);
            openssl_private_decrypt($rsaCifrado, $rsaDecifrado, $chavePrivada, OPENSSL_PKCS1_OAEP_PADDING);
        }

        // Na assinatura os papéis se invertem: a privada assina, a pública confere.
        openssl_sign($texto, $assinatura, $chavePrivada, OPENSSL_ALGO_SHA256);
        $assinaturaConfere = openssl_verify($texto, $assinatura, $chavePublica, OPENSSL_ALGO_SHA256) === 1;
        $assinaturaAlterada = openssl_verify($texto . 'a', $assinatura, $chavePublica, OPENSSL_ALGO_SHA256) === 1;
    }
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
        <li><strong>Via única</strong>: não existe função que desfaça. Para conferir, refaz-se a
            conta e compara-se o resultado.
            <ul>
                <li><strong>Hash</strong>: resumo de tamanho fixo de qualquer dado. O mesmo texto
                    gera sempre o mesmo resumo, e trocar um caractere muda o resultado inteiro.
                    Serve para conferir integridade, não para esconder informação.</li>
                <li><strong>Hash de senha</strong>: um hash propositalmente lento e com salt
                    aleatório, feito só para guardar senha. Como o salt muda a cada vez, não se
                    compara hash com hash: usa-se <code>password_verify()</code>.</li>
                <li><strong>HMAC</strong>: um hash misturado com uma chave secreta. Além da
                    integridade, prova que a mensagem veio de quem conhece a chave.</li>
            </ul>
        </li>
        <li><strong>Via dupla</strong>: o dado pode ser lido de volta.
            <ul>
                <li><strong>Simétrica</strong>: uma única chave cifra e decifra. É rápida, mas a
                    mesma chave precisa chegar às duas pontas sem vazar.</li>
                <li><strong>Assimétrica</strong>: um par de chaves — uma pública, que pode
                    circular livremente, e uma privada, que fica só com o dono. O que uma cifra,
                    só a outra decifra.</li>
            </ul>
        </li>
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

        <h2>1. Via única</h2>

        <h2>1.1 Hash</h2>
        <ul>
            <?php foreach (['sha256', 'sha512'] as $algoritmo): ?>
                <li><?= $algoritmo ?>: <?= hash($algoritmo, $texto) ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>1.2 Hash de senha</h2>
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

        <h2>1.3 HMAC</h2>
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

        <h2>2. Via dupla</h2>

        <h2>2.1 Simétrica (AES-256-CBC)</h2>
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

        <h2>2.2 Assimétrica (RSA)</h2>
        <?php if (!$rsaOk): ?>
            <p>Não foi possível gerar o par de chaves RSA nesta instalação do PHP — normalmente
                falta configurar o <code>openssl.cnf</code>.</p>
        <?php else: ?>
            <p>Par de chaves gerado agora mesmo, só para esta demonstração — em produção ele
                seria gerado uma única vez e guardado. A pública pode circular livremente; a
                privada nunca aparece na tela.</p>
            <ul>
                <li>Chave pública (início): <?= e(cortar($chavePublica)) ?></li>
                <li>Chave privada: [omitida]</li>
                <li>Cifragem — a pública cifra, a privada decifra:
                    <?php if ($rsaCabe): ?>
                        cifrado <?= e(cortar(base64_encode($rsaCifrado))) ?>, decifrado de volta
                        para "<?= e($rsaDecifrado) ?>"
                    <?php else: ?>
                        texto grande demais — com essa chave e esse padding, o RSA cifra no
                        máximo ~190 bytes por vez. Por isso, na prática, ele cifra apenas uma
                        chave simétrica pequena, e é essa chave que cifra o resto dos dados.
                    <?php endif; ?>
                </li>
                <li>Assinatura — a privada assina, a pública verifica: <?= e(cortar(base64_encode($assinatura))) ?></li>
                <li>Verificação com o texto original: <?= $assinaturaConfere ? 'confere' : 'não confere' ?></li>
                <li>Verificação com o texto alterado: <?= $assinaturaAlterada ? 'confere' : 'não confere' ?></li>
            </ul>
        <?php endif; ?>

    <?php endif; ?>

</body>

</html>