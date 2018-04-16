# Command Injection Tutorial

**Injeção de comando** é um ataque no qual o objetivo é a execução de comandos arbitrários no sistema operacional do servidor por meio de uma aplicação vulnerável. Os ataques de injeção de comando são possíveis quando um aplicativo passa dados inseguros fornecidos pelo usuário (formulários, cookies, cabeçalhos HTTP etc.) para um shell do sistema. Nesse ataque, os comandos do sistema operacional fornecidos pelo invasor geralmente são executados com os privilégios do aplicativo vulnerável. Ataques de injeção de comando são possíveis em grande parte devido à validação de entrada insuficiente.

Esse ataque difere do **Code Injection**, pois a **injeção de código** permite que o atacante adicione seu próprio código que é executado pelo aplicativo. No Code Injection, o invasor estende a funcionalidade padrão do aplicativo sem a necessidade de executar comandos do sistema.

## Exemplos: possíveis vunerabilidades

### C++

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
```python
import os
folder = raw_input('Enter a folder name: ')
os.system("ls -la %s" % folder)
```

## Referências

- https://www.owasp.org/index.php/Command_Injection