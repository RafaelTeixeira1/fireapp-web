# FireApp 🔥

O **FireApp** é um sistema web desenvolvido para **monitoramento, registro e gerenciamento de incêndios em áreas rurais**. Ele permite o cadastro, visualização e mapeamento de ocorrências de incêndios, além de fornecer funcionalidades para configuração de alertas e privacidade dos usuários.

## 📌 Objetivos e utilidades

✅ Permitir que usuários registrem incêndios com informações detalhadas (tipo, gravidade, ponto de referência e área no mapa).  
✅ Gerar um **mapa interativo** com as áreas afetadas para facilitar o acompanhamento e combate.  
✅ Configurar **notificações personalizadas** (push, e-mail, SMS) e **horários de alerta**.  
✅ Gerenciar a **privacidade** dos dados do usuário e controle sobre o compartilhamento da localização.  
✅ Fornecer um **painel administrativo** para gestão dos dados e acompanhamento geral do sistema.

---

## 🛠 Tecnologias utilizadas

🔹 **Laravel 10** — Framework PHP para o backend e gerenciamento de rotas, controllers, models e migrations.  
🔹 **Tailwind CSS** — Framework CSS utility-first para estilização rápida e responsiva.  
🔹 **Blade** — Motor de templates do Laravel para gerar o frontend de forma dinâmica.  
🔹 **Leaflet + Leaflet Draw** — Para exibir e permitir o desenho de áreas no mapa.  
🔹 **MySQL / MariaDB** — Banco de dados relacional utilizado para persistência das informações.  
🔹 **Vite** — Ferramenta de build e hot-reload para os assets do projeto.  
🔹 **Jetstream / Breeze** — (se utilizado) Para scaffolding de autenticação e estrutura inicial.

---

## 🚀 Funcionalidades principais

- **Cadastro de incêndios** com tipo, gravidade, descrição, ponto de referência e área no mapa.
- **Painel administrativo** para visualizar estatísticas dos incêndios.
- **Configuração de notificações** (push, email, SMS) e raio de alerta.
- **Privacidade do perfil** (perfil público, compartilhamento de localização).
- **Mapa interativo** das áreas afetadas.
- **Responsividade completa** para desktop e dispositivos móveis.

---

## 📥 Como rodar o projeto

### 1️⃣ Clone o repositório
```bash
git clone https://github.com/seu-usuario/fireapp.git
cd fireapp
```
### 2️⃣ Instale as dependências do PHP
```bash
composer install
```

### 3️⃣ Instale as dependências do frontend
```bash
npm install
```

### 4️⃣ Configure o ambiente
```bash
cp .env.example .env
php artisan key:generate
```
#### 💡 Edite o .env e configure o banco de dados:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fireapp
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```
### 5️⃣ Rode as migrations
```bash
php artisan migrate
```

### 6️⃣ Suba o servidor
```bash
php artisan serve
```

### 7️⃣ Rode o frontend (Tailwind/Vite)
```bash
npm run dev
```
#### 💡 Para build de produção:
```bash
npm run build
```

## ⚡ Exemplo de acesso local
Abra o navegador:
```cpp
http://127.0.0.1:8000
```

## ✉️ Contato
Desenvolvido por: 
Jhannyfer Sweyvezes Rodrigues Biângulo
Rafael de Souza Teixeira

Email: 
jhannyfer.biangulo@estudante.ifgoiano.edu.br
rafael.teixeira1@estudante.ifgoiano.edu.br
