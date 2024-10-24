<!DOCTYPE html>
<html lang="ru">

<head>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Каширская Юля ^-^</a>
            <div class="justify-content-end">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Главная</a>
                    <a class="nav-link" href="#">Профиль</a>
                    <a class="nav-link" href="#">Пользователи</a>
                    <a class="nav-link" href="#">Войти</a>
                    <a class="nav-link" href="#">Выйти</a>
                    <a class="nav-link link-secondary" href="<?php route('cheats') ?>">ЧИТЫ</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container pt-5">

        <p class="lead">
            Это тестовая страница, содержащая все возможные поля и действия для взаимодействия с API.
        </p>
        <x-profile />
        <x-edit-profile />
        <x-register />
        <x-authenticate />

    </div>
</body>

</html>