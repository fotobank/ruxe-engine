<?php
// Показать список альбомов
if (isset($_GET['gallery']) && $_GET['gallery'] == 'getAlbum') {
    getAlbum();
}

// Добафить фотографию (админка)
if (isset($_COOKIE['site_login']) && $GlobalUsers->getstatus($_COOKIE['site_login']) === 'admin' && isset($_GET['gallery']) && $_GET['gallery'] == 'addPhoto' && isset($_GET['album'])) {
    addPhoto();
}

// Удалить фотографию (админка)
if (isset($_COOKIE['site_login']) && $GlobalUsers->getstatus($_COOKIE['site_login']) === 'admin' && isset($_GET['gallery']) && $_GET['gallery'] == 'delPhoto' && isset($_GET['photo']) && isset($_GET['album'])) {
    deletePhoto();
}

// Изменить фотографию (админка)
if (isset($_COOKIE['site_login']) && $GlobalUsers->getstatus($_COOKIE['site_login']) === 'admin' && isset($_GET['gallery']) && $_GET['gallery'] == 'editPhoto' && isset($_POST['photo']) && isset($_POST['title']) && isset($_POST['description'])) {
    editPhoto();
}

// Добавить альбом (админка)
if (isset($_COOKIE['site_login']) && $GlobalUsers->getstatus($_COOKIE['site_login']) === 'admin' && isset($_GET['gallery']) && $_GET['gallery'] == 'addAlbum' && isset($_POST['title']) && isset($_POST['description'])) {
    addAlbum();
}

// Удалить альбом (админка)
if (isset($_COOKIE['site_login']) && $GlobalUsers->getstatus($_COOKIE['site_login']) === 'admin' && isset($_GET['gallery']) && $_GET['gallery'] == 'deleteAlbum' && isset($_GET['album'])) {
    deleteAlbum();
}

// Изменить альбом (админка)
if (isset($_COOKIE['site_login']) && $GlobalUsers->getstatus($_COOKIE['site_login']) === 'admin' && isset($_GET['gallery']) && $_GET['gallery'] == 'editAlbum' && isset($_POST['album']) && isset($_POST['title']) && isset($_POST['description'])) {
    editAlbum();
}

// Переместить фото в альбом (админка)
if (isset($_COOKIE['site_login']) && $GlobalUsers->getstatus($_COOKIE['site_login']) === 'admin' && isset($_GET['gallery']) && $_GET['gallery'] == 'movePhotoInAlbum' && isset($_POST['photo']) && isset($_POST['album']) && isset($_POST['oldAlbum'])) {
    movePhotoInAlbum();
}

// Сохранить настройки  (админка)
if (isset($_COOKIE['site_login']) && $GlobalUsers->getstatus($_COOKIE['site_login']) === 'admin' && isset($_GET['gallery']) && $_GET['gallery'] == 'saveConfig') {
    gallerySaveConfig();
}