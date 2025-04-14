# Apache Log Viewer

Этот проект отображает HTTP-запросы из лог-файла Apache через PHP-скрипт (`getLogs.php`) и показывает их на фронтенде с использованием Vue.js.

## ⚙️ Установка и запуск

1. Убедитесь, что у вас установлены:
    - PHP 8.x
    - Apache/Nginx (если нужно)
    - Node.js и npm

2. Перейдите в папку с Vue и установите зависимости:

```bash
npm install
npm run dev

## Убедитесь, что веб-сервер может обрабатывать getLogs.php. Пример URL:

http://localhost/getLogs.php

