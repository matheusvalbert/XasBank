## Teste desenvolvedor Jr. YahP!

## Sobre o projeto

Teste de conhecimentos técnicos no qual foi apresentado um problema e foi desenvolvida uma solução conforme os requisitos solicitados.

### A Empresa (fictícia):

Uma fintech chamada XasBank contratou a YahP para desenvolver uma nova plataforma para gestão de seus clientes. Devido ao seu grande crescimento no ano de 2021 realizou a aquisição de uma outra fintech chamada PigBank. Após a aquisição, o XasBank pediu a YahP para realizar a migração de todos os seus clientes para sua nova plataforma, a partir de uma API (que fornescia os seguintes dados: id, email, nome, sobrenome e foto de perfil). Sendo assim, foi criado uma funcionalidade de migração que ocorre apenas uma vez. (Todos os dados são salvos no servidor, incluindo a imagem de perfil).

Após a realização de sua migração, seria necessário existir dois novos campos, sendo eles conta bancária e investimentos, ambos sendo iniciados zerados. Sendo assim, seria necessário a criação de quatro funcionalidades, sendo elas: deposito, saque (para a conta bancária) e investir e resgatar (para investimentos), todos sendo necessário validação. Não podendo realizar saques no valor maior que o disponível, apenas resgatar valores menores ou iguais ao valor investido e aplicar apenas valores menores ou iguais ao valor disponivel na conta bancária.

### Tecnologias:

- PHP utilizando o framework Laravel 9.x;
- Banco de dados MySQL;
- Bootstrap;
- nginx;
- phpMyAdmin;
- Docker;
- Git.

### Funcionalidades do sistema:

- Migração dos dados da API para o sistema local, salvando os dados em um banco MySQL e as imagens de perfil em uma pasta ('src/public/img/');
- Exibição em um painel administrativo;
- Possibilidade do administrador realizar saques e depósito com validação na conta bancária (não pode sacar valor maior que o existenta na conta bancária);
- Possibilidade do administrador realizar investimentos e resgate com validação em investimentos(não pode investir valor maior que o disponível na conta bancária e não pode resgatar valor maior que o disponível nos investimentos);

## Execução do projeto

### Instalar Docker e Docker-compose:

```bash
 # Docker
 $ sudo apt-get update
 
 $ sudo apt-get install \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
    
 $ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg

 $ echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
  
  $ sudo apt-get update
  
  $ sudo apt-get install docker-ce docker-ce-cli containerd.io
  
  # Docker-compose
  $ sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
  
  $ sudo chmod +x /usr/local/bin/docker-compose
```

## Instalar projeto:

```bash
  # Clone do projeto
  $ git clone git@github.com:matheusvalbert/XasBank.git
  
  # Instalação
  $ cd XasBank
  $ sudo docker-compose up -d
  $ sudo docker-compose exec app /bin/bash
  $ composer install
  $ php artisan migrate:fresh
  
  # Parar exexecução
  # ctrl + d (sair do docker)
  $ sudo docker-compose down
```

### URLs para utilização:

- PhpMyAdmin: http://localhost:8081/
- Laravel: http://localhost:8080/

## Videos demonstrativos

- Instalação: 
- Utilização:
