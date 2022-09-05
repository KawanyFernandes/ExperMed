
# ExperMed

Sistema para leitura de arquivos .dat e processamento dos dados contidos nele.


# Configuração inicial do projeto:

## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/KawanyFernandes/ExperMed
```


Acesse a pasta Documents do seu computador e crie as pastas

```bash
  C:\User\"YourUserName"\Documents\data\in
  
  C:\User\"YourUserName"\Documents\data\out
```

Entre no diretório do projeto

```bash
  cd ExperMed
```
Execute o comando para execução do projeto

```bash
  php -S localhost:8083 -t public
```

Acesse pelo browser

```bash
  http://localhost:8083
```


# Comportamento esperado
## Rodando localmente
Ao Rodar o projeto localmente, e acessar o localhost:8083 pelo browser é esperado que assim que for colocado um arquivo .dat na pasta "in"
o sistema irá consumir automaticamente e gerar os dados processados na pasta "out".
## Melhorias
```bash
O projeto foi pensado para rodar localmente, e foi dividido da seguinte forma: php para manipulação dos arquivos e javascript para a aplicação das regras.
```
```bash
É necessário algumas melhorias na questão do caminho dos arquivos/pastas, por exemplo, caso não existisse a pasta de "in"/"out" deveria criar ela.
```
```bash
Ele lê apenas um arquivo de entrada por vez, com uma regra de consumo de arquivos a cada 3 segundos.
```
