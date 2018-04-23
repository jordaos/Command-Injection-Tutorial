# Prática: command injection

João era administrador de um site onde os usuários podiam guardar arquivos, esse site era meio que um concorrente do site [dontpad](http://dontpad.com/).  João aproveitou que estava pagando um servidor para armazenar alguns arquivos pessoais. O problema era que João manjava mais de _Shell Script_ do que de programação pra WEB. Então ele decidiu aprender o básico de PHP e usar o máximo de Shell que podia. O resultado foi uma aplicação altamente vunerável à __injeção de comandos__.

## Atividade I

### listar os arquivos do diretório onde está a página inicial dos site

### Deletar um arquivo

- Use seus conhecimentos em shell script para criar um arquivo com um conteúdo qualqer.
- Liste o conteúdo desse arquivo.
- Agora apague esse arquivo (ele está dentro da pasta "files").

### Guardar a lista de diretórios em um arquivo

## Atividade II

Usar Command Injection no sistema no heroku (http://commandinjection.herokuapp.com)

- Criar um arquivo (qualquer nome) dentro da pasta "folder"
- Escolher um diretório qualquer na raiz do servidor e listar seu conteúdo.

Na estrega deve ser dito o diretório escolhido e o conteúdo existente nele.