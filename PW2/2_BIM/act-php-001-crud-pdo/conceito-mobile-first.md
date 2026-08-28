# Aplicando conceito de Mobile First

Vamos aplicar o conceito de **Mobile-First**: primeiro estilizamos para o celular e depois usamos *Media Queries* para "esticar" o layout para telas maiores.

Aqui está a estrutura dividida em dois arquivos:

### 1. O Arquivo HTML (`index.html`)
Note o uso das tags semânticas e a meta tag `viewport`, que é essencial para que o navegador entenda que o site deve se ajustar ao tamanho da tela.

```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo Responsivo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav>
        <ul>
            <li><a href="#">Início</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </nav>

    <main>
        <h1>Bem-vindo ao meu site</h1>
        <p>Este conteúdo se ajusta a qualquer tela usando Mobile-First!</p>
    </main>

    <footer>
        <p>&copy; 2024 - Criado com HTML5 e CSS3</p>
    </footer>

</body>
</html>
```

---

### 2. O Arquivo CSS (`style.css`)
Este arquivo começa com o estilo para **iPhone (Mobile)/Android** e vai crescendo para **Tablet** e **PC**.



```css
/* --- ESTILO BASE (MOBILE-FIRST) --- */
/* Focado em telas pequenas (iPhone/Android) */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

nav {
    background-color: #333;
    padding: 10px;
}

nav ul {
    list-style: none;
    padding: 0;
    text-align: center; /* No mobile, menus centralizados são comuns */
}

nav a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
}

main {
    flex: 1; /* Faz o main ocupar o espaço restante, empurrando o rodapé */
    padding: 20px;
    text-align: center;
}

footer {
    background-color: #222;
    color: white;
    text-align: center;
    padding: 15px;
}

/* --- MEDIA QUERY: TABLETS (Telas acima de 600px) --- */
@media (min-width: 600px) {
    nav ul {
        display: flex;
        justify-content: center;
    }
    
    main {
        padding: 40px;
    }
}

/* --- MEDIA QUERY: COMPUTADOR (Telas acima de 1024px) --- */
@media (min-width: 1024px) {
    main {
        max-width: 1000px; /* Evita que o texto fique largo demais no PC */
        margin: 0 auto;    /* Centraliza o conteúdo no meio da tela */
        text-align: left;  /* Alinhamento padrão de leitura em desktop */
    }

    nav ul {
        justify-content: flex-start; /* Menu alinhado à esquerda no PC */
        padding-left: 50px;
    }
}
```

### Por que isso funciona?
1.  **Flexbox no Body:** Usamos `display: flex` com `flex-direction: column` e `min-height: 100vh` para garantir que o rodapé fique sempre no final da página, mesmo se houver pouco conteúdo.
2.  **Cascata Progressiva:** O navegador lê as regras de cima para baixo. O celular recebe o estilo básico. Se a tela for grande (Tablet ou PC), o CSS dentro da `@media` "sobrescreve" apenas o que for necessário.
3.  **Flexibilidade:** Usamos unidades relativas (como `padding: 20px`) e evitamos larguras fixas (como `width: 800px`), permitindo que os elementos se adaptem conforme a tela muda.

---