# Command Injection Tutorial

**Injeção de comando** é um ataque no qual o objetivo é a execução de comandos arbitrários no sistema operacional do servidor por meio de uma aplicação vulnerável. Os ataques de injeção de comando são possíveis quando um aplicativo passa dados inseguros fornecidos pelo usuário (formulários, cookies, cabeçalhos HTTP etc.) para um shell do sistema. Nesse ataque, os comandos do sistema operacional fornecidos pelo invasor geralmente são executados com os privilégios do aplicativo vulnerável. Ataques de injeção de comando são possíveis em grande parte devido à validação de entrada insuficiente.

Esse ataque difere do **Code Injection**, pois a **injeção de código** permite que o atacante adicione seu próprio código que é executado pelo aplicativo. No Code Injection, o invasor estende a funcionalidade padrão do aplicativo sem a necessidade de executar comandos do sistema.

## Exemplos: possíveis vunerabilidades

### C++

- system
- exec
- shellExecute

```cpp
// Example program
#include <iostream>
#include <string>

using namespace std;

int main() {
  string folder;
  getline(cin, folder);
  cout << folder << endl;

  string command = "ls -la " + folder;
  const char *cstr = command.c_str();
  system(cstr);
}

```

### Python

- exec
- eval
- os.system
- os.popen

```python
import os
folder = raw_input('Enter a folder name: ')
os.system("ls -la %s" % folder)
```

### Java

- runtime.exec()

```java
BufferedReader br = new BufferedReader(new InputStreamReader(System.in));
String folder = br.readLine();

Runtime rt = Runtime.getRuntime();
Process pr = rt.exec("ls -la " + folder);
```

#### PHP

- system
- exec
- eval
- shel_exec
- proc_open

### Porquer efetuar chamadas ao Sistema Operacional? 

Comandos de sistema pode ajudar fazer grandes coisas com pouco código, como por exemplo, criar ou abrir uma pasta, exibir o horário do sistema, verificar em que sistema operacional o seu programa está rodando e etc. Para efetuar uma linha de comando ao sistema basta usar a função **SYSTEM** em códigos C ou C++ que está respectivamente nas bibliotecas **stdlib.h** e **cstdlib**, em Python é necessario importar a biblioteca **os** e novamente executar a função SYSTEM.

## Como se previnir

Para evitar que um atacante seja capaz de inserir caracteres especiais no comando, você deve tentar **evitar as chamadas de sistema** sempre que possível. Em todas as circunstâncias, evite qualquer tipo de usar **entradas do usuário**, a menos que seja absolutamente necessário. **Desative a chamada de funções diretamente no sistema**. Em algumas linguagens de programação, você pode separar a execução do processo dos parâmetros de entrada. Você também pode criar uma **lista de possíveis entradas e validar seu formato**. Por exemplo, inteiro para um ID numérico.

### Permissões

Na máquina onde a aplicação está hospedada, as permissões dos diretórios e arquivos devem estar bem definidas, para que apenas usuários autorizados possam modificar os arquivos.

No linux, o comando para definir as permissões de arquivos e diretórios é o `chmod`. Esse comando espera um argumento com três dígitos, que são:

1. Owner (você)
2. Group (seu grupo de usuários)
3. World (qualquer outra pessoa navegando pelo sistema de arquivos)

Cada dígito desse código envia as permissões para cada um desses grupos como o seguinte: Leitura é 4; Escrita é 2; Execução é 1.

As somas desses números fornecem combinações dessas permissões:

- 0 = sem permissão alguma; essa pessoa não pode ler, gravar ou executar o arquivo
- 1 = executar apenas
- 2 = somente escrita
- 3 = escrever e executar (1 + 2)
- 4 = somente leitura
- 5 = ler e executar (4 + 1)
- 6 = ler e escrever (4 + 2)
- 7 = ler, escrever e executar (4 + 2 + 1)

#### Exemplos

Comandos `chmod` no arquivo apple.txt

| Comando             | Propósito                                                                    |
|---------------------|------------------------------------------------------------------------------|
| chmod 700 apple.txt | Só você pode ler, escrever ou executar apple.txt                             |
| chmod 777 apple.txt | Todos podem ler, escrever ou executar apple.txt                              |
| chmod 744 apple.txt | Só você pode ler, escrever ou executar apple.txt; Todos podem ler apple.txt; |
| chmod 444 apple.txt | Todos podem apenas ler apple.txt                                             |

- Recuperar as permissões de um arquivo/diretório: `stat -c %a [filename]`.

### Teste de entradas

Substitua ou barre argumentos que contenham `;`, `|`, `&`, `&&` ou outros escapes disponíveis.

### Boa prática em python

Módulo `subprocess`: substitudo de `os.system()` e outros.
- Funções inadequadas para iniciar processos podem significar um risco de segurança: se o programa for iniciado através do shell e os argumentos contiverem meta-caracteres do shell, o resultado poderá ser desastroso.
- Isso faz do Python uma linguagem de substituição ainda melhor para scripts de shell complicados.

#### Exemplo

```python
from subprocess import call
folder = raw_input('Enter a folder name: ')
call(["ls", "-la", folder])
```

## Injeção de comandos nos servidores gratuitos

### Heroku

- Recursos limitados e temporários.
- Pode ser taestado em: http://commandinjection.herokuapp.com

### Hostinger

- Hospedagem compartilhada
- Chamadas de sistema bloqueadas por padrão.
- Pode ser testado em: http://jordao.pe.hu/

## Referências

- https://www.owasp.org/index.php/Command_Injection
- https://www.netsparker.com/blog/web-security/command-injection-vulnerability/
- http://www.december.com/unix/ref/chmod.html
