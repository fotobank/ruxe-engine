[Ruxe Engine](http://ruxe-engine.ru/) - CMS на файлах
=====================================================

О проекте
---------------------------------

Ruxe Engine (далее RE) — это лёгкая, быстрая и бесплатная Open Source система управления сайтом (CMS) на PHP. Она не использует базы данных (такие как, например, MySQL), работает на файлах. Но заострять внимание на этом факте не стоит, ибо это просто способ хранения данных. Для небольших порталов, блогов и сайтов компаний, использование баз данных не оправдывает себя — это просто тяжёлый балласт, замедляющий генерацию страниц.

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

### 1. Файловая структура темы оформления

Тема оформления должна иметь следующую файловую структуру:

    /themes/
        /название_темы/
            commentform.html
            index.php
            list.dat
            message.html
            newsfullrecord.html
            newsrecord.html
            other.php
            users.php
            и другие файлы и каталоги на своё усмотрение

Рассмотрим каждый элемент по отдельности.

 Элемент             | Описание
 ------------------- | --------
 название_темы       | Папка с файлами темы оформления. Каждая папка в каталоге themes - новая тема. Имя папки соответствует её названию. В качестве имён рекомендуется использовать только строчные буквы латинского алфавита и цифры.
 commentform.html    | Здесь находится оформление форм отправки комментариев и личных сообщений. Возьмите его из default темы оформления и вносите изменения, если необходимо.
 index.php           | Шаблон оформления всех страниц сайта.
 newsfullrecord.html | Здесь указывается стиль оформления **полной** записи новостного раздела. Рекомендуется за основу взять шаблон из default темы оформления.
 newsrecord.html     | Здесь находится оформление **краткой** записи новостного раздела. Рекомендуется за основу взять шаблон из default темы оформления. Краткие записи отображаются в списке новостей.
 other.php           | В файле указывается оформление различных модулей движка и стили их записей. С нуля создавать его нельзя - необходимо брать его из default темы оформления и вносить в него нужные изменения.
 users.php           | Содержит в себе оформление всех пользовательских форм, меню и т.п. С нуля создавать его нельзя - необходимо брать его из default темы оформления и вносить в него нужные изменения.

А в list.dat файле прописываются имена пользовательских файлов, находящихся в папке темы, которые будут отображены в правой части раздела "Оформление" Админ-центра, в конце списка, и будут доступны для редактирования встроенным редактором.
Каждый новый файл - на новой строке.
Синтаксис файла следующий:

	имя_файла.расширение|описание_файла

Пример:

	menu.html|Главное меню на сайте

В файлах с расширением .php допускается применять любые языки вёрстки (например, HTML) и веб-программирования, включая серверные (например, PHP). А в файлах с расширением .html - только клиентские языки веб-программирования (например, JavaScript, VisualBasic) и вёрстки. В указанных типах файлов используются HTML-теги и специальные команды движка.


### 2. Пример оформления простейшего шаблона страницы в файле index.php

```html
<!-- Тип документа и синтаксиса языка разметки; RuxeEngine адаптирован под HTMLv4.01 Transitional -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
        <!-- Заголовок страницы -->
        <title><? here_title(); ?></title>
        <!-- ОБЯЗАТЕЛЬНАЯ команда, которая выводит meta-тег с переадресацией в промежуточных страницах; при отключенных промежуточных страницах оставляет на месте себя только перенос строки -->
        <? here_metaredirect(); ?>
        <!-- Параметры RSS-ленты -->
        <link rel="alternate" type="application/rss+xml" title="RSS-лента" href="<? here_urlsite(); ?>/rss">
        <!-- Иконка сайта -->
        <link rel="SHORTCUT ICON" href="<? here_urlsite(); ?>/favicon.ico">
        <!--Тип содержимого и кодировка страницы-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!--Описание страницы-->
        <meta name="description" content="<? here_description(); ?>">
        <!--Ключевые слова страницы-->
        <meta name="keywords" content="<? here_keywords(); ?>">
</head>
<body>
        <!-- Здесь может быть заголовок, слоган сайта, главное меню, сайдбар и др.-->
        <h1>МОЙСАЙТ</h1>
        <!-- Команда для вывода контента той или иной страницы -->
        <? here_pagecontent(); ?>
        <!-- ОБЯЗАТЕЛЬНАЯ команда для вывода текста "Powered by Ruxe Engine" с указанием ссылки на официальный сайт; местоположение данной команды может быть в любом месте страницы в пределах тегов <body></body>-->
        {CREDITS}
</body>
</html>
```


Что такое «команды» в Ruxe Engine
---------------------------------

Команда представляет собой определённую фразу, интерпретировав которую, движок выполняет ту или иную функцию, выдавая результат этой функции, либо подставляет значение вместо указанной переменной.

Команды делятся на те, которые употребляются только на страницах и в главном шаблоне – index.php (Имеется ввиду index.php, находящийся в /themes/**название_темы**/. Здесь и далее не путать с index.php, расположенным в корне сайта), и те, которые присутствуют в других шаблонах темы оформления.

**Пример 1**. На страничке сайта нужно вывести форму авторизации на сайте. Для этого в основном шаблоне страницы (админ-центр, раздел «Оформление») в нужном месте вставляем команду **<? here_login(); ?>** и сохраняем изменения.

```html
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
        <head>
                <title>Заголовок</title>
        </head>
<body>
<h1>Мой сайт</h1><br>
<h2>Форма авторизации:</h2>
<? here_login(); ?>
</body>
</html>
```

При просмотре сайта через браузер, в том месте, где была вставлена команда, будет находиться форма авторизации. Аналогичным образом можно вставить форму Обратной связи, список категорий новостных разделов, статистику посещения и др.

**Пример 2**. При публикации записи система автоматически подставляет некоторые данные вместо переменных, указанных в шаблоне краткой новости: заголовок статьи ({TITLE}), категорию ({CATEGORY}) со ссылкой на адрес категории ({CATURL}), автора ({AUTHOR}) со ссылкой на его профиль, дату публикации ({DATE}), счётчик количества просмотров ({VIEWS}) и количество комментариев ({COMMENTS}) со ссылкой на них ({COMURL}). Отредактировав файл шаблона краткой новости (админ-центр, раздел «Оформление»), можно изменить порядок их вывода, либо совсем убрать некоторые из них.

Существуют также обязательные команды: если их не будет в основном шаблоне сайта, то движок, либо некоторые его функции работать не будут. К ним относятся **<? here_metaredirect(); ?>** (выводит meta-тег с переадресацией в промежуточных страницах, размещать её нужно сразу после закрывающего тега ) и **{CREDITS}** (выводит текст "Powered by Ruxe Engine" со ссылкой на официальный сайт движка, она может быть расположена в любом месте страницы в пределах тегов).

Список стандартных команд движка может быть расширен благодаря установленным дополнениям.


Список большинства «команд»
---------------------------------

### Команды страниц, а также шаблона index.php

Употребляются в исходном коде страниц, использующих Ruxe Engine, и в шаблоне index.php для активации тех или иных функций при последующем просмотре страниц в браузере.


	<? here_pagecontent(); ?>

Обязательная команда. Используется в шаблоне index.php, на месте её вызова подключаются страницы сайта (созданные в Админ-центр->Страницы).

	<? here_title(); ?>

Выводит заголовок страницы для тега title.

	<? here_keywords(); ?>

Подставляются ключевые слова страницы, указанные при её создании, для тега meta name="keywords"....

	<? here_description(); ?>

Подставляется описание страницы, указанное при её создании, для тега meta name="description"....

	<? here_urltheme(); ?>

Полный путь до каталога выбранной темы оформления без / на конце. Например, **<? here_urltheme(); ?>** = **http://ruxe-engine.ru/themes/re**.

	<? here_metaredirect(); ?>

Обязательная команда. Выводит meta-тег с переадресацией в промежуточных страницах. В иных случаях - оставляет на месте себя только перенос строки. Целесообразно размещать её сразу после закрытия тега /title.

	<? here_thispage(); ?>

Возвращает имя активной страницы сайта. Если активна самая главная страница сайта, то функция возвращает "index.php".

	<? here_urlrss(); ?>

Выводит полный правильный путь до RSS ленты с учётом опции ЧПУ.

	<? here_urlsite(); ?>

Адрес сайта без / на конце. Для этой команды существует также дополнительный параметр, в качестве которого выступает имя страницы:

	<? here_urlsite("страница"); ?>

В этом случае команда вернёт правильный путь до этой страницы с учётом опции ЧПУ. Например, **<? here_urlsite('mypage'); ?>** = **http://site.ext/mypage** (ЧПУ активирован) или **http://site.ext/?viewpage=mypage** (ЧПУ деактивирован).

	<? here_news("ID"); ?>

Выводит записи из определённого новостного раздела, где ID - его идентификатор, указанный в параметрах.

	<? here_time_generation(); ?>

Время генерации страницы в секундах.

	<? here_last_posts(); ?>

Выводит недавние комментарии.

	<? here_random_faq(); ?>

Случайная пара вопрос-ответ из модуля F.A.Q.

	<? here_list_tags("ID"); ?>

Выводит Облако меток из Новостного раздела, где ID - его идентификатор, указанный в параметрах.

	<? here_list_category("ID"); ?>

Выводит список используемых категорий в Новостном разделе, где ID - его идентификатор, указанный в параметрах.

	<? here_login(); ?>

Форма входа, либо пользовательское меню.

	<? here_hosts(); ?>

Количество посетителей за сутки (без ботов).

	<? here_last_hosts(); ?>

Количество посетителей за вчерашний день (без ботов).

	<? here_bots(); ?>

Количество ботов за сутки.

	<? here_hits(); ?>

Количество просмотров страниц сайта за сутки.

	<? here_all_hits(); ?>

Количество просмотров страниц сайта за всё время.

	<? here_all_hosts(); ?>

Количество посетителей (без ботов) за всё время.

	<? here_links(); ?>

Каталог ссылок.

	<? here_hided_counter_views("ID"); ?>

Счётчик просмотров по идентификатору (не показывает результат, а только меняет значение при каждом посещении страницы).

	<? here_show_views("ID"); ?>

Показывает результат счётчика просмотров по идентификатору, но не меняет его.

	<? here_top_news("ID"); ?>

Выводит ссылки на популярные новости из новостного раздела по идентификатору.

	<? here_mail(); ?>

Выводит форму Обратной связи.

	<? here_show_downloads("ID"); ?>

Показывает количество загрузок файла из модуля Каталога файлов по идентификатору.

	<? here_rotator(); ?>

Ротатор баннеров.

	<? here_record_online(); ?>

Выводит зафиксированный рекорд посетителей, одновременно находившихся на сайте за определенный промежуток времени (по умолчанию, 5 минут).

	<? here_faq(); ?>

F.A.Q.

	<? here_question(); ?>

Форма вопроса для F.A.Q.

	<? here_top_downloads(); ?>

Список наиболее скачиваемых файлов модуля Каталога файлов.

	<? here_online(); ?>

Посетители, находящиеся на сайте.

	<? here_messages("ID"); ?>

Выводит одиночный раздел комментирования, где ID - его идентификатор, указанный в параметрах.


### Команды для остальных шаблонов


#### message.html:

Шаблон промежуточных страниц (например, с сообщением "Ваш комментарий успешно добавлен").

	{TITLE}

Заголовок сообщения.

	{MESSAGE}

Сообщение.

	{THEMEPATH}

Полный адрес до каталога выбранной темы оформления, без / на конце.


#### commentform.html:

Шаблон формы ввода комментариев. Далее только самые главные команды.

	{URL}

Путь до обрабатывающего форму скрипта.

	{HIDDENS}

Скрытые поля (input type="hidden"...) с необходимой системной информацией.

	[if_user_entered] [/if_user_entered]

Код, заключённый между этими тегами будет использован только если пользователь или администратор вошёл под своим аккаунтом.

	{SITE}

Адрес сайта без / на конце.

	{NAME_VALUE}

Если пользователь не вошёл под своим аккаунтом, заменяется на value="имя, указанное в GET name", если GET name существует. В противном случае автоматически удаляется. Если же пользователь вошёл под своим аккаунтом, то команда вернёт имя пользователя.

	[if_user_not_entered] [/if_user_not_entered]

Код, заключённый между этими тегами, будет использован только в том случае, если пользователь не вошёл под своим аккаунтом (т.е. он - гость).

	[if_pm_list] [/if_pm_list]

Если выводится список пользователей (для ЛС), то используется код, заключённый между этими тегами.

	[if_pm_input] [/if_pm_input]

Если список пользователей при написании ЛС не выводится, то используется код, заключённый между этими тегами.

	[if_pm] [if_pm]

Код, заключённый между этими тегами, используется только если форма ввода комментария выводится для написания нового ЛС.

	[if_here_mail] [/if_here_mail]

Код, заключённый между этими тегами, используется только если форма ввода комментария выводится для написания сообщения в Обратную связь (here_mail).

	[if_can_smiles] [/if_can_smiles]

Если разрешено использовать смайлы и BB-код, то используется код, заключённый между этими тегами.

	{MAIL_VALUE}

Заменяется на value="e-mail, указанное в GET mail", если GET mail существует. В противном случае автоматически удаляется.

	{THEMES}

Добавляет теги option value... с темами Обратной связи.

	{THEMEPATH}

Полный адрес до каталога выбранной темы оформления, без / на конце.

	{MESSAGE_VALUE}

Заменяется на комментарий, указанный в GET message, если GET message существует. В противном случае автоматически удаляется.

	{SECURITY}

Изображение капчи.

	{FROM}

Системное значение для <input type="hidden" name="from" .. >.

	{MAXMESSAGE}

Максимально разрешённое количество символов в комментарии.


#### newsfullrecord.html:

Шаблон полной (отдельной) новости. Далее только самые главные команды.

	{TITLE}

Заголовок новости.

	{THEMEPATH}

Путь до темы оформления без / на конце.

	{AUTHOR}

Автор.

	{DATE}

Дата публикации.

	{VIEWS}

Количество просмотров.

	{COMMENTFORM}

Форма ввода комментариев.

	{PAGES}

Навигатор страниц комментариев.

	{COMMENTS}

Сами комментарии.

	{DESCRIPTION}

Текст новости.

	{DAY}

День публикации.

	{MONTH}

Месяц публикации.

	{YEAR}

Год публикации.


#### newsrecord.html:

Шаблон краткой новости. Далее только самые главные команды.

	{URL}

Адрес полной новости.

	{THEMEPATH}

Путь до темы оформления без / на конце.

	{TITLE}

Заголовок.

	{CATURL}

Адрес категории.

	{CATEGORY}

Категория.

	{AUTHOR}

Автор.

	{DATE}

Дата публикации.

	{VIEWS}

Количество просмотров.

	{COMURL}

Адрес полной новости с якорем #messbox.

	{COMMENTS}

Количество комментариев.

	[if_oncomments] [/if_oncomments]

Код, заключённый между этими тегами, будет использован только если разрешены комментарии в новости.

	{DESCRIPTION}

Текст новости.

	{DAY}

День публикации.

	{MONTH}

Месяц публикации.

	{YEAR}

Год публикации.


#### other.php, users.php:

Возможные команды указаны в исходном тексте.


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
