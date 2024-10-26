# Laboratory Internet

## How to run

```bash
git clone git@github.com:Shadovitsme/Laboratory_Internet.git
cd Laboratory_Internet
cp .env.example .env
composer update
php artisan key:generate
docker compose up
npm install
# or ./vendor/bin/sail npm install
```

Открыть в браузере `http://localhost:80/`

## API

### GET /users

query: ?login=LOGIN

answer: 200 OK

```json
{ "id": "int", "login": "string", "email": "string", "password": "string" }
```

answer: 404 Not Found

```json
{ "err": "string" }
```

### GET /users/{id}

id: int

answer: 200 OK

```json
{ "id": "int", "login": "string", "email": "string", "password": "string" }
```

answer: 404 Not Found

```json
{ "err": "string" }
```

### POST /users

payload:

```json
{ "login": "string", "password": "string" }
```

answer: 200 OK

```json
{ "id": "int", "login": "string", "email": "string", "password": "string" }
```

answer: 200 OK

```json
{ "err": "string" }
```

### PATCH /users/{id}

id: int

payload:

```json
{ "login": "string", "password": "string" }
```

answer: 200 OK

```json
{ "id": "int", "login": "string", "email": "string", "password": "string" }
```

answer: 404 Not Found

```json
{ "err": "string" }
```

### POST /users/authenticate

payload:

```json
{ "login": "string", "password": "string" }
```

answer: 200 OK

```json
{ "ok": "string" }
```

answer: 404 Not Found

```json
{ "err": "string" }
```

### DELETE /users/{id}

id: int

payload:

answer: 200 OK

```json
{ "ok": "string" }
```

answer: 404 Not Found

```json
{ "err": "string" }
```

## Задание

_Можно на чистом php:_

1. Создать открытый Git репозиторий.
2. Реализовать методы REST API для работы с пользователями:
3. Создание пользователя;
4. Обновление информации пользователя;
5. Удаление ользователя;
6. Авторизация пользователя;
7. Получить информацию о пользователе.
8. В файле README.md описать реализованные методы.



