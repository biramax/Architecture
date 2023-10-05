## Домашнее задание по уроку 11 "Сервис-ориентированные архитектуры".

Реализовал [проект](https://github.com/biramax/Architecture/tree/main/Seminar-11/messenger) в веб-интерфейсе на PHP, т.к. знаком с этим языком, а изучать веб/десктоп/мобайл-реализацию на других языках, к сожалению, не хватает времени.

Используется три основных класса по паттерну MVP: Viewer, Presenter и Model.

Viewer привязал к программе через интерфейс и предусмотрел возможность в случае необходимости замены Вьюера на другой (мобильный, например).

Создал класс User для создания объектов в виде любого пользователя, а владельца аккаунта наследовал от User в класс AccountOwner.

Ввиду нехватки времени не стал реализовывать регистрацию и авторизацию пользователей, добавление ими сообщений в базу данных. Заранее заготовил в базе данных таблицу с юзерами и таблицу с их сообщениями.

![](screenshots/Скриншот-таблицы-БД-users.jpg)

![](screenshots/Скриншот-таблицы-БД-messages.jpg)

---

PHP-файлы проекта находятся в папке [messenger](https://github.com/biramax/Architecture/tree/main/Seminar-11/messenger). Там же находится дамп базы данных mysql.

Use-case, UML и ERD диаграммы проекта находятся в папке [diagrams](https://github.com/biramax/Architecture/tree/main/Seminar-11/diagrams).

Дизайн-макет находится в папке [design](https://github.com/biramax/Architecture/tree/main/Seminar-11/design).

Скриншоты реализованного проекта находятся в папке [screenshots](https://github.com/biramax/Architecture/tree/main/Seminar-11/screenshots).

---

Реализовал два экрана: 

### Страница со всеми чатами

<img src="screenshots/Скриншот-реализованного-проекта-1.jpg" width="600"/>

### Конкретный чат

<img src="screenshots/Скриншот-реализованного-проекта-2.jpg" width="600"/>

---

Записал краткий видео-ролик с демонстрацией реализованного проекта:

[![](https://img.youtube.com/vi/710zwUkbzjo/maxresdefault.jpg)](https://youtu.be/710zwUkbzjo)