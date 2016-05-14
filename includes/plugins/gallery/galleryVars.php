<?php
$gallery = [
    // PATCH к корню сайта
    'cmsRoot' => $cms_root,
    // URL адрес сайта
    'cmsSite' => $cms_site,
    // Названия текущей темы оформления
    'cmsTheme' => $cms_theme,
    // Включено ли ЧПУ. 1\0 - да\нет
    'cmsFurl' => $cms_furl,
    // Файл db альбомов
    'dbAlbums' => $cms_root . '/conf/gallery/albums.txt',
    // Файл db фотографий
    'dbPhotos' => $cms_root . '/conf/gallery/photos.txt',
    // URl плагина в админке
    'pluginAdminUrl' => 'index.php?action=plugins&choose=gallery',
    // Полный путь к каталогу куда сохранять оригиналы фото
    'savePathOriginal' => $cms_root . '/uploads/gallery/source',
    // Полный путь к каталогу куда сохранять миниатюры фото
    'savePathThumb' => $cms_root . '/uploads/gallery/thumbs',
    // URL Patch к миниатюре
    'thmubSrc' => $cms_site . '/uploads/gallery/thumbs',
    // URL Patch к оригиналу
    'originalSrc' => $cms_site . '/uploads/gallery/source',
    // URL к стандартной миниатюры альбома
    'noPhotoSrc' => $cms_site . '/uploads/gallery/nophoto.png',
    // PATCH к настройкам
    'configPath' => $cms_root . '/conf/gallery/config.json',

];