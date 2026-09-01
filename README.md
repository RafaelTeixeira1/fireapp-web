# FireApp Web 🔥

Sistema web para registro, monitoramento e gerenciamento de ocorrências de incêndio, desenvolvido com Laravel e recursos de georreferenciamento.

## Sobre o projeto

O FireApp Web permite registrar e acompanhar ocorrências de incêndio por meio de uma interface web, reunindo informações da ocorrência e sua representação geográfica em mapas interativos.

A aplicação faz parte do ecossistema FireApp e corresponde à versão web da solução. O projeto utiliza Laravel no backend e Blade, Tailwind CSS e Vite na camada de interface.

## Principais funcionalidades

- Cadastro e gerenciamento de ocorrências de incêndio.
- Registro de informações como tipo, gravidade, descrição e ponto de referência.
- Representação das ocorrências em mapa interativo.
- Desenho de áreas geográficas utilizando Leaflet Draw.
- Painel administrativo para acompanhamento das informações cadastradas.
- Configurações relacionadas a alertas e notificações.
- Configurações de privacidade e compartilhamento de localização.
- Interface responsiva para diferentes tamanhos de tela.

## Tecnologias

### Backend

- PHP
- Laravel 12
- MySQL

### Frontend

- Blade
- Tailwind CSS
- JavaScript
- Vite

### Mapas

- Leaflet
- Leaflet Draw

## Estrutura do repositório

A aplicação Laravel está localizada no diretório `fireapp-laravel/`.

```text
FireApp/
├── README.md
└── fireapp-laravel/
    ├── app/             # Regras da aplicação, models e controllers
    ├── bootstrap/       # Inicialização do Laravel
    ├── config/          # Arquivos de configuração
    ├── database/        # Migrations, seeders e factories
    ├── public/          # Arquivos públicos
    ├── resources/       # Views e assets da aplicação
    ├── routes/          # Definição das rotas
    ├── storage/         # Arquivos gerados pela aplicação
    ├── tests/           # Testes automatizados
    ├── composer.json    # Dependências PHP
    └── package.json     # Dependências frontend
```

## Pré-requisitos

Para executar o projeto localmente, tenha instalado:

- PHP compatível com Laravel 12.
- Composer.
- Node.js e npm.
- MySQL ou outro banco configurado para a aplicação.

## Como executar

Clone o repositório:

```bash
git clone https://github.com/RafaelTeixeira1/FireApp.git
cd FireApp/fireapp-laravel
```

Instale as dependências PHP:

```bash
composer install
```

Instale as dependências frontend:

```bash
npm install
```

Crie o arquivo de ambiente:

```bash
cp .env.example .env
php artisan key:generate
```

Configure o banco de dados no arquivo `.env`. Exemplo:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fireapp
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

Execute as migrations:

```bash
php artisan migrate
```

Inicie o servidor Laravel:

```bash
php artisan serve
```

Em outro terminal, inicie o ambiente frontend:

```bash
npm run dev
```

A aplicação poderá ser acessada, por padrão, em:

```text
http://127.0.0.1:8000
```

Para gerar os assets para produção:

```bash
npm run build
```

## Estado do projeto

Projeto em desenvolvimento.

O repositório representa a implementação web do FireApp. A evolução da solução pode incluir melhorias no sistema de alertas, monitoramento geográfico, experiência de uso e integração com outras fontes de dados relacionadas às ocorrências.

## Contexto acadêmico

O FireApp também é utilizado como objeto de estudo acadêmico relacionado à engenharia de requisitos, prototipagem e desenvolvimento de soluções tecnológicas para apoio ao monitoramento de incêndios.

## Autores

- Rafael de Souza Teixeira
- Jhannyfer Sweyvezes Rodrigues Biângulo
