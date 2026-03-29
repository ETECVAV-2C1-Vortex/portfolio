# Exercícios - Cookies e Sessions em PHP

## Exercício 1 - Autor: João Guilherme

### Explique a diferença entre cookies e sessions no PHP
### Cookies e Sessions são formas de armazenar dados que podem ser usados em páginas web, com os Cookies guardando dados pequenos no navegador do usuário, o que não é tão seguro, e os Sessions guardando dados importantes no servidor, sendo um método mais seguro.
### Os Cookies são mais adequados para armazenar preferências do usuário (como tema ou idioma), e os Sessions são mais adequados para armazenar informações sensiveis, como as de login

## Exercício 2 - Autor: Igor Daniel

### Explique como cookies e sessions poderiam ser utilizados para: manter o usuário logado; armazenar itens temporários no carrinho; registrar preferências do usuário.

### Normalmente, são utilizados sessions iniciadas com session_start() para manter o usuário logado em lojas virtuais, já que os dados são enviados direto para o servidor via $_SESSION, enquanto o navegador recebe apenas um identificador de sessão, garantindo mais segurança aos dados. No armazenamento de itens temporários do carrinho de compras, tanto os cookies quanto as sessions podem ser utilizados, mas as sessions são mais indicadas pelo fator segurança. Sobre o registro de preferências do usuário, como configurações de perfil e a lista de desejos, os cookies ciados com setcookie() são a melhor opção, já que guardam as informações diretamente no dispositivo de acesso e se lembram do cliente no futuro. Essas escolhas se justificam porque garantem que os dados sensíveis fiquem guardados em um local seguro (sessions), enquanto o que é apenas visual ou de preferência fique salvo no computador de quem está acessando (cookies).

## Exercício 3 - Autor: Igor Matheus

### Etapa 1)
### A mensagem "Cookie ainda não dispponível" é exibida 

### Etapa 2) 
### A mensagem "Valor do cookie: 1" é exibida

### Etapa 3) 
### Ferramentas do Navegador -> Application -> Cookies -> http://localhost -> contador um cookie chamado "contador" com o valor "1" é exibido.

### Etapa 4) 
### A mensagem "Cookie ainda não dispponível" é exibida.

### Pergunta 2:
### O cookie não aparece na mesma execução porque o setcookie() manda o cookie pro navegador, mas ele só volta pro php depois, fazendo ele aparecer só na segunda execução.

# Referências

- https://www.php.net/manual/en/features.cookies.php
- https://gitbook.ganeshicmc.com/web/semana-1/11_cookies_e_sessoes
- https://cursos.alura.com.br/forum/topico-diferenca-de-cookie-e-session-63600
- https://phpbrasil.com/phorum/read.php?1,1020,1021
