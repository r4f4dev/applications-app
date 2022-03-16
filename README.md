<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

1.  страница “/” страница формы, если не авторизован, отправлять на авторизацию
    страница “/login” (login sample)
2.  страница авторизации
    страница “/register” (sign up sample)
3.  страница регистрации, создает пользователя с ролью user
    страница “/manager” (list sample)
4.  только для роли manager, при переходе user ролью, должен писать нет доступа
5.  страница со списком заявок с формы. Кнопка "Ответил", меняет статус заявки на отмечено. Выделять зеленым цветом

## Требования

1. Регистрация\авторизация: стандартный модуль auth (но пользователи должны быть с двумя ролями: manager и user)
   Юзеры регистрируются самостоятельно, а аккаунт менеджера должен быть создан заранее, логин и пароль выслать вместе с готовым заданием)

2. После логина, user видит форму обратной связи, а менеджер список заявок. (все страницы и функционал доступны только авторизованным пользователям и только в соответствии с их привилегиями)
   менеджер может просматривать список заявок и отмечать те, на которые ответил.

3. Cписок заявок:
   ID, тема, сообщение, имя клиента, почта клиента, ссылка на прикрепленный файл время создания, статус
   user может оставлять заявку, но не чаще раза в сутки (проверять по user_id)
   проверка по дате создания последней заявки, должно пройти 24 часа.
   на странице создания заявки: тема и сообщение, файловый инпут (валидация, только эти форматы png, jpeg, jpg, pdf), кнопка "отправить".

## Данные для доступа

1. Логин(manager) : manager@gmail.com
2. Пароль : password

3. Логин(user) : user@gmail.com
4. Пароль : password

## Установка

Необходимо установить [Docker](https://docs.docker.com/get-docker) и [Docker-compose](https://docs.docker.com/compose/install)

1. ```console
    composer install
   ```
1. Переименуем
