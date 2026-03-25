# Exercício 1

## Explique a diferença entre cookies e sessions no PHP
### Cookies e Sessions são formas de armazenar dados que podem ser usados em páginas web, com os Cookies guardando dados pequenos no navegador do usuário, o que não é tão seguro, e os Sessions guardando dados importantes no servidor, sendo um método mais seguro.
### Os Cookies são mais adequados para armazenar preferências do usuário (como tema ou idioma), e os Sessions são mais adequados para armazenar informações sensiveis, como as de login



# Exercício 3

## Etapa 1)
### A mensagem "Cookie ainda não dispponível" é exibida 

## Etapa 2) 
### A mensagem "Valor do cookie: 1" é exibida

## Etapa 3) 
### Ferramentas do Navegador -> Application -> Cookies -> http://localhost -> contador um cookie chamado "contador" com o valor "1" é exibido.

## Etapa 4) 
### A mensagem "Cookie ainda não dispponível" é exibida.

## Pergunta 2:
### O cookie não aparece na mesma execução porque o setcookie() manda o cookie pro navegador, mas ele só volta pro php depois, fazendo ele aparecer só na segunda execução.
