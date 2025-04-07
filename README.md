# API de Corretores, backend desenvolvido durante um processo seletivo que participei.

Esta é uma API RESTful desenvolvida com Laravel para realizar operações de **CRUD de Corretores**.

---

## 🚀 Endpoints

### 🧪 Teste da API

**GET** `/api/test`

> Retorna uma string de teste para verificar se a API está funcionando.

**Resposta**
```json
"API está funcionando"
```

---

### 📄 Listar Corretores

**GET** `/api/corretores`

> Retorna a lista de todos os corretores cadastrados.

**Resposta**
```json
[
  {
    "id": 1,
    "name": "João da Silva",
    "cpf": "12345678901",
    "creci": "12345",
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T00:00:00.000000Z"
  }
]
```

---

### ➕ Criar um Corretor

**POST** `/api/corretores`

> Cadastra um novo corretor.

**Body (JSON)**
```json
{
  "name": "Maria Oliveira",
  "cpf": "98765432100",
  "creci": "67890"
}
```

**Validações**
| Campo   | Regras                                      |
|---------|---------------------------------------------|
| name    | obrigatório, string, entre 2 e 255 caracteres |
| cpf     | obrigatório, 11 dígitos, único              |
| creci   | obrigatório, string, entre 2 e 20 caracteres |

**Respostas**
- **201 Created** – Corretor cadastrado com sucesso.
- **400 Bad Request** – CPF já registrado ou erro interno.

**Exemplo de resposta de sucesso**
```json
{
  "id": 2,
  "name": "Maria Oliveira",
  "cpf": "98765432100",
  "creci": "67890",
  "created_at": "2024-01-01T00:00:00.000000Z",
  "updated_at": "2024-01-01T00:00:00.000000Z"
}
```

**Exemplo de erro**
```json
{
  "message": "O CPF já está registrado."
}
```

---

### 🛠️ Atualizar um Corretor

**PUT** `/api/corretores/{id}`

> Atualiza os dados de um corretor existente.

**Parâmetros**
- `id` (na URL): ID do corretor a ser atualizado.

**Body (JSON)**  
Todos os campos são opcionais, mas validados se presentes.
```json
{
  "name": "João Atualizado",
  "cpf": "12345678901",
  "creci": "99999"
}
```

**Respostas**
- **200 OK** – Corretor atualizado ou nenhuma mudança detectada.
- **404 Not Found** – Corretor não encontrado.
- **400 Bad Request** – Erro ao atualizar.

**Exemplo de resposta com sucesso**
```json
{
  "id": 1,
  "name": "João Atualizado",
  "cpf": "12345678901",
  "creci": "99999",
  "created_at": "2024-01-01T00:00:00.000000Z",
  "updated_at": "2024-01-02T12:00:00.000000Z"
}
```

**Exemplo sem alterações**
```json
{
  "message": "Nenhuma alteração detectada"
}
```

---

### ❌ Deletar um Corretor

**DELETE** `/api/corretores/{id}`

> Remove um corretor pelo ID.

**Parâmetros**
- `id` (na URL): ID do corretor a ser deletado.

**Respostas**
- **200 OK** – Corretor deletado com sucesso.
- **404 Not Found** – Corretor não encontrado.

**Exemplo de resposta**
```json
{
  "message": "Corretor deletado com sucesso"
}
```

---

## 📦 Requisitos

- PHP 8.1+
- Laravel 10+
- Banco de dados MySQL, PostgreSQL ou SQLite configurado

---

## ⚙️ Instalação e Execução

```bash
git clone https://github.com/lucasCsantosDev00/-BACKEND-PHP_CRUD_corretor_desafio
cd api-corretores
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
