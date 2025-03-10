# Sistema de Cadastro de Pessoas

## Descrição
Este projeto é um sistema de cadastro de pessoas simples desenvolvido em PHP utilizando a arquitetura MVC. Ele permite a pesquisa e cadastro de novos usuários

## Funcionalidades

### 1. Pesquisa de Pessoas
A interface principal do sistema permite a pesquisa de pessoas cadastradas utilizando os seguintes critérios:
- Identificador do cadastro da pessoa;
- Nome da pessoa (parcial ou completo);
- CPF.

### 2. Cadastro de Pessoas
Caso a pessoa não esteja cadastrada, o sistema permite que o operador cadastre uma nova pessoa com os seguintes dados:
- Nome;
- Nome social;
- CPF;
- Nome do pai;
- Nome da mãe;
- Telefone;
- Email.

### 3. Cadastro de Endereços
Após o cadastro da pessoa, o sistema habilita a opção de adicionar endereços, podendo ser:
- Residencial;
- Comercial.

Os dados do endereço incluem:
- Tipo de Endereço (Residencial ou Comercial);
- CEP;
- Logradouro;
- Número;
- Complemento;
- Bairro;
- Estado;
- Cidade.

## Estrutura do Projeto
```
cadsatro_pessoa/
├── app/
│   ├── Controllers/
│   │   └── PessoaController.php
│   │   └── EnderecoController.php
│   ├── Models/
│   │   └── Database.php
│   │   └── EnderecoModel.php
│   │   └── PessoaModel.php
│   ├── Views/
│   │   ├── cadsatroEndereco.php
│   │   ├── cadsatroPessoa.php
├── public/
│   └── index.php
└── style.css
```


## Configuração e Execução
1. Clone este repositório:
   ```sh
   git clone https://github.com/seu-usuario/seu-repositorio.git
   ```
2. Configure o banco de dados e atualize as credenciais no arquivo de conexão (`Database.php`).
3. Inicie o servidor local e acesse `http://localhost/cadastro_pessoas/public`.
