[Ruxe Engine](http://ruxe-engine.ru/) - CMS на файлах
=====================================================

О проекте
---------------------------------

Ruxe Engine (далее RE) — это лёгкая, быстрая и бесплатная система управления сайтом (CMS) на PHP. Она не использует базы данных (такие как, например, MySQL), работает на файлах. Но заострять внимание на этом факте не стоит, ибо это просто способ хранения данных. Для небольших порталов, блогов и сайтов компаний, использование баз данных не оправдывает себя — это просто тяжёлый балласт, замедляющий генерацию страниц.

Суть RE в особом подходе к управлению сайтом. Его можно назвать классическим, продвинутым. Главная идея RE — это гибкость. Нынче мода упрощать до безобразия CMS: установка в один клик, настройка из 5 переключателей и т.п. В итоге, чтобы что-то изменить под себя, приходится или копаться в исходнике, или пытаться это реализовать с помощью редактирования десятков tpl файлов, составляющих шаблон оформления. Порой даже узнать кто присутствует на сайте в данный момент нельзя... Такие CMS предназначены для создания однотипных сайтов за 2 минуты.

RE же предоставляет глубокую настройку вплоть до мельчайших деталей. С его помощью можно сделать непохожий на другие небольшой портал, сайт-визитку, блог и др. С дизайном возиться долго не потребуется — основа шаблонизации лишь один файл. Плюс ещё 6 файлов для тонкой настройки. Для вызова той или иной функции RE используются специальные слова-команды в шаблонах и страницах. В шаблонах не запрещается использовать PHP-код, как и в страницах.

RE работает полностью в UTF-8 кодировке, поддерживает кириллические домены. Весь генерируемый на сайте HTML 4.01 код и RSS-лента проходят проверку на W3.org. Немалое внимание в Ruxe Engine уделяется и безопасности — защита от флуда, премодерация, запрет кэширования страниц, бан посетителей, сессии админ-центра по IP, серьёзная капча (сложная для спам-ботов, но удобная для людей), закрытие определённых страниц от гостей и др.

И напоследок, краткий перечень основных функций RE: шаблонизация, не запрещающая использовать язык PHP; создание и редактирование страниц сайта в админ-центре, которые можно также редактировать и любым другим внешним редактором; ЧПУ; неограниченное число новостных разделов; RSS лента; комментирование в новостях, гостевой книге и отдельных разделах комментариев; регистрация пользователей с аватарами, подписями, активацией по e-mail, восстановлением паролей и прочим; модуль F.A.Q.; каталог файлов; каталог ссылок; ротатор баннеров. Начиная с 0.6.5 версии, появилась поддержка популярного сервиса gravatar.com. Но функционал CMS не ограничивается лишь стандартными модулями — есть и [дополнения](http://ruxe-engine.ru/plugins.html), а новые дополнения можно написать самому. Функционал RE постоянно совершенствуется.


Требования к серверу
---------------------------------
1. Apache 2 с установленным и разрешённым mod_rewrite
2. PHP версии 5.2.17 или новее
3. mbstring должен быть разрешён
4. PHP.ini должен содержать register_globals = Off
5. Установленная библиотека GD 2 для PHP
6. Возможность отправки писем через функцию PHP mail()
7. iconv разрешён (желательно)


Установка
---------------------------------

Процесс установки очень прост:

1. Скачайте свежую версию Ruxe Engine по адресу [ruxe-engine.ru/download](http://ruxe-engine.ru/download).
2. Распакуйте скачанный архив на сервер (в корень не обязательно - можно и в подкаталог).
3. Перейдите по веб-адресу сервера.
4. Следуйте инструкциям.


Применение нового дизайна
---------------------------------


Что такое «команды» в Ruxe Engine
---------------------------------


Список большинства «команд»
---------------------------------


Статусы пользователей
---------------------------------


Установка дополнений
---------------------------------


Создание собственного дополнения
---------------------------------


Ruxe Engine API
---------------------------------


Разработчики
---------------------------------

- **Ахрамеев Денис Викторович** ([ruxesoft.net](http://ruxesoft.net))  Автор, программирование
- **Игорь Dr1D** - Дизайн
- **Олег Прохоров** ([www.tanatos-life.ru](http://www.tanatos-life.ru/)) - Контроль качества, документация


Лицензия
---------------------------------

Это произведение доступно по Open Source лицензии Creative Commons «Attribution-ShareAlike» («Атрибуция — На тех же условиях») 4.0 Всемирная (CC BY-SA 4.0).

Краткий текст лицензионного соглашения: [на русском](http://creativecommons.org/licenses/by-sa/4.0/deed.ru), [на английском](http://creativecommons.org/licenses/by-sa/4.0/deed.en).
