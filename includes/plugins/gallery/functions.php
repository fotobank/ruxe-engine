<?php
if (file_exists(__DIR__ . '/galleryVars.php')) {
    include_once __DIR__ . '/galleryVars.php';
} else {
    die('Файл ' . __DIR__ . '/galleryVars.php' . ' плагина Gallery не найден');
}

if (!function_exists('here_gallery')) {
    /**
     * Выведет галерею
     * @param string $page СТРАНИЦА на которой будет выполнятся плагин
     * @return string
     */
    function here_gallery($page = null)
    {
        global $gallery;

        if (isset($_GET['album'])) {
            echo getPhotos($_GET['album'], $_REQUEST['viewpage']);
        } else {
            echo getAlbums($_REQUEST['viewpage']);
        }

    }
} else {
    die('Функция here_gallery плагина Gallery не инициализирована');
}

if (!function_exists('gallerySaveConfig')) {
    /**
     * Сохранит настройки
     */
    function gallerySaveConfig()
    {
        global $gallery;

        $save = [
            'view' => [
                'albums' => [
                    'start' => $_POST['viewAS'],
                    'content' => $_POST['viewAC'],
                    'end' => $_POST['viewAE'],
                ],
                'photos' => [
                    'start' => $_POST['viewPS'],
                    'content' => $_POST['viewPC'],
                    'end' => $_POST['viewPE'],
                ],
            ],
            'app' => []
        ];

        $saveJson = json_encode($save);

        if (file_put_contents($gallery['configPath'], $saveJson)) {
            $json = array('result' => true);
        } else {
            $json = array('result' => false);
        }


        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        die();
    }
} else {
    die('Функция gallerySaveConfig плагина Gallery не инициализирована');
}

if (!function_exists('getAlbums')) {
    /**
     * Список альбомов
     * @param $page
     * @return string
     */
    function getAlbums($page)
    {
        global $gallery;

        $config = json_decode(file_get_contents($gallery['configPath']), true);
        $html = $config['view']['albums']['start'];

        foreach (getAlbum(true) as $album) {
            $url = $gallery['cmsSite'] . '/' . $page . '?album=' . $album['id'];


            $html .= str_replace([
                '{ALBUM_URL}', '{ALBUM_IMG_SMALL}', '{ALBUM_DESCRIPTION}', '{ALBUM_TITLE}'
            ], [
                $url, getCoverAlbum($album['id']), $album['description'], $album['title']
            ], $config['view']['albums']['content']);
        }

        $html .= $config['view']['albums']['end'];

        return $html;
    }
} else {
    die('Функция getAlbums плагина Gallery не инициализирована');
}

if (!function_exists('getGalleryRow')) {
    /**
     * @param int $id
     * @param int $row
     * @return string
     */
    function getGalleryRow($id = 0, $row = 0)
    {
        global $gallery;

        $id = (int)$id;
        $row = (int)$row;


        foreach (file($gallery['dbAlbums']) as $lines) {
            $line = explode("||", $lines);
            if ($id == $line[0]) {
                return $line[$row];
            }
        }

        return 'Альбом не найден';
    }
} else {
    die('Функция getGalleryRow плагина Gallery не инициализирована');
}

if (!function_exists('getCoverAlbum')) {
    /**
     * Вернет URL обложки для альбома
     * @param int $album ID альбома
     * @return String
     */
    function getCoverAlbum($album = 0)
    {
        global $gallery;

        $album = (int)$album;
        $cover = '';

        foreach (file($gallery['dbPhotos']) as $lines) {
            $line = explode('||', $lines);
            if ($line[1] == $album) {
                $cover = $line[0];
                break;
            }
        }

        return (gettype($cover) == 'array') ? $gallery['noPhotoSrc'] : ($cover == '') ? $gallery['noPhotoSrc'] : $gallery['thmubSrc'] . '/' . $cover . '.jpg';
    }
} else {
    die('Функция getCoverAlbum плагина Gallery не инициализирована');
}

if (!function_exists('getPhotos')) {
    /**
     * Вернет список фото
     * @param int $album
     * @return string
     */
    function getPhotos($album = 0)
    {
        global $gallery;
        $album = (int)$album;

        $config = json_decode(file_get_contents($gallery['configPath']), true);

        $content = str_replace([
            '{ALBUM_TITLE}'
        ], [
            getGalleryRow($album, 1)
        ], $config['view']['photos']['start']);

        foreach (file($gallery['dbPhotos']) as $lines) {
            $line = explode("||", $lines);

            if ($album == $line[1]) {
                $content .= str_replace([
                    '{PHOTO_TITLE}',
                    '{PHOTO_URL_BIG}',
                    '{PHOTO_URL_SMALL}',
                    '{PHOTO_DESCRIPTION}'
                ], [
                    $line[2],
                    $gallery['originalSrc'] . '/' . $line[0] . '.jpg',
                    $gallery['thmubSrc'] . '/' . $line[0] . '.jpg',
                    $line[3]
                ], $config['view']['photos']['content']);
            }
        }

        $content .= $config['view']['photos']['end'];

        return $content;
    }
} else {
    die('Функция getPhotos плагина Gallery не инициализирована');
}

if (!function_exists('writeData')) {
    /**
     * Запишет данные в файл
     * @param bool $file
     * @param bool $data
     * @return int
     */
    function writeData($file = false, $data = false)
    {
        $in = array("\r", "\n", "\r\n", PHP_EOL);
        $ot = array("", "", "");
        $string = "";

        if (gettype($data) == 'array') {
            foreach ($data as $lines) {
                $lines = str_replace($in, $ot, $lines);
                $lines = $lines . "\r\n";
                $string .= $lines;
            }
        }

        if (gettype($data) == 'string') {
            $string .= $data . "\r\n";
        }

        return file_put_contents($file, $string);
    }
} else {
    die('Функция writeData плагина Gallery не инициализирована');
}

if (!function_exists('movePhotoInAlbum')) {
    /**
     * Переместить с одного в альбома в другой
     * @param int $photo
     * @param int $album
     * @param int $oldAlbum
     */
    function movePhotoInAlbum($photo = false, $album = false, $oldAlbum = false, $return = false)
    {
        global $gallery;

        $photo = ($photo) ? (int)$photo : $_POST['photo'];
        $album = ($album) ? (int)$album : $_POST['album'];
        $oldAlbum = ($oldAlbum) ? (int)$oldAlbum : $_POST['oldAlbum'];

        // изменяем photo.txt
        $data = array();
        foreach (file($gallery['dbPhotos']) as $lines) {
            $line = explode("||", $lines);

            if ($line[0] == $photo) {
                $line[1] = $album;
            }

            // конвертируем обратно
            $back = implode("||", $line);
            $data[] = $back;
        }

        writeData($gallery['dbPhotos'], $data);

        // изменяем album.txt
        $data = array();
        foreach (file($gallery['dbAlbums']) as $lines) {
            $line = explode("||", $lines);

            if ($line[0] == $oldAlbum)
                $line[4] = $line[4] - 1;

            if ($line[0] == $album)
                $line[4] = $line[4] + 1;

            // конвертируем обратно
            $data[] = implode("||", $line);
        }

        writeData($gallery['dbAlbums'], $data);

        if ($return)
            return true;

        $json = array('result' => true);
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        die();
    }
} else {
    die('Функция movePhotoInAlbum плагина Gallery не инициализирована');
}

if (!function_exists('getAlbum')) {
    /**
     * Вернет список всех альбомов
     * @param bool $return
     * @return mixed
     */
    function getAlbum($return = false)
    {
        global $gallery;


        $array = array();
        foreach (file($gallery['dbAlbums']) as $lines) {
            $line = explode("||", $lines);
            $array[] = array(
                'id' => $line[0],
                'title' => $line[1],
                'description' => $line[2],
                'create_date' => $line[3],
                'photo_count' => $line[4],
            );
        }

        if ($return)
            return $array;

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }
} else {
    die('Функция getAlbum плагина Gallery не инициализирована');
}

if (!function_exists('editAlbum')) {
    /**
     * Изменить альбом
     * @param int $album
     * @param string $newTitle
     * @param string $newDescription
     */
    function editAlbum($album = false, $newTitle = false, $newDescription = false)
    {
        global $gallery, $Filtr;

        $album = ($album) ? (int)$album : (int)$_POST['album'];
        $newTitle = ($newTitle) ? $Filtr->clear($newTitle) : $Filtr->clear($_POST['title']);
        $newDescription = ($newDescription) ? $Filtr->clear($newDescription) : $Filtr->clear($_POST['description']);

        // меняем album.txt
        $data = array();
        foreach (file($gallery['dbAlbums']) as $lines) {
            $line = explode("||", $lines);

            if ($line[0] == $album) {
                $line[1] = $newTitle;
                $line[2] = $newDescription;
            }

            // конвертируем обратно
            $data[] = implode("||", $line);
        }

        writeData($gallery['dbAlbums'], $data);

        $json = array('result' => true);
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        die();
    }
} else {
    die('Функция editAlbum плагина Gallery не инициализирована');
}

if (!function_exists('deleteAlbum')) {
    /**
     * Удалить альбом
     * @param int $album
     */
    function deleteAlbum($album = false)
    {
        global $gallery;

        $album = ($album) ? (int)$album : $_GET['album'];

        $db['photo'] = file($TXTPhoto = $gallery['dbPhotos']);
        $db['album'] = file($TXTAlbum = $gallery['dbAlbums']);

        $delete = false;

        // изменить album.txt
        $l = 0;
        foreach ($db['album'] as $lines) {
            $line = explode("||", $lines);
            if ($line[0] == $album) {
                unset($db['album'][$l]);
            }
            $l++;
        }
        writeData($TXTAlbum, $db['album']);

        // удалим uploads/thumbs & uploads/source & photo.txt
        foreach ($db['photo'] as $lines) {
            $line = explode("||", $lines);
            if ($line[1] == $album) {
                deletePhoto($line[0], $album, true);
            }
        }

        // ответ
        $json = array('result' => true);
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        die();
    }
} else {
    die('Функция deleteAlbum плагина Gallery не инициализирована');
}

if (!function_exists('addAlbum')) {
    /**
     * Добавить альбом
     * @param string $title
     * @param string $description
     */
    function addAlbum($title = false, $description = false)
    {
        global $gallery, $Filtr;

        $title = ($title) ? $Filtr->clear($title) : $Filtr->clear($_POST['title']);
        $description = ($description) ? $Filtr->clear($description) : $Filtr->clear($_POST['description']);

        $db['photo'] = file($TXTPhoto = $gallery['dbPhotos']);
        $db['album'] = file($TXTAlbum = $gallery['dbAlbums']);


        $id = end($db['album']);
        $id = explode('||', $id);
        $id = ($id[0]) ? $id[0] + 1 : 1;

        $db['album'][] = $id . '||' . $title . '||' . $description . '||' . date('d-m-Y') . '||' . 0;

        $json = array('result' => false);
        if (writeData($TXTAlbum, $db['album']))
            $json = array(
                'result' => true,
                'id' => $id,
                'title' => $title,
                'description' => $description
            );

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        die();
    }
} else {
    die('Функция addAlbum плагина Gallery не инициализирована');
}

if (!function_exists('editPhoto')) {
    /**
     * Изменить фото
     * @param int $photo
     * @param string $newTitle
     * @param string $newDescription
     */
    function editPhoto($photo = false, $newTitle = false, $newDescription = false)
    {
        global $gallery, $Filtr;

        $photo = ($photo) ? (int)$photo : (int)$_POST['photo'];
        $newTitle = ($newTitle) ? $Filtr->clear($newTitle) : $Filtr->clear($_POST['title']);
        $newDescription = ($newDescription) ? $Filtr->clear($newDescription) : $Filtr->clear($_POST['description']);


        $db['photo'] = file($TXTPhoto = $gallery['dbPhotos']);
        $db['album'] = file($TXTAlbum = $gallery['dbAlbums']);

        // меняем photo.txt
        $data = array();
        foreach ($db['photo'] as $lines) {
            $line = explode("||", $lines);

            if ($line[0] == $photo) {
                $line[2] = $newTitle;
                $line[3] = $newDescription;
            }

            // конвертируем обратно
            $back = implode("||", $line);
            $data[] = $back;
        }

        $json = array('result' => false);
        if (writeData($TXTPhoto, $data))
            $json = array('result' => true);

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        die();
    }
} else {
    die('Функция editPhoto плагина Gallery не инициализирована');
}

if (!function_exists('deletePhoto')) {

    /**
     * Удалить фото
     * @param int $photo
     * @param int $album
     */
    function deletePhoto($photo = false, $album = false, $return = false)
    {
        global $gallery, $FileManager;

        $photo = ($photo) ? (int)$photo : (int)$_GET['photo'];
        $album = ($album) ? (int)$album : (int)$_GET['album'];

        $db['photo'] = file($TXTPhoto = $gallery['dbPhotos']);
        $db['album'] = file($TXTAlbum = $gallery['dbAlbums']);

        $delete = false;

        // удалим uploads/thumbs и uploads/source
        if ($FileManager->removefile($gallery['savePathThumb'] . '/' . $photo . '.jpg') && $FileManager->removefile($gallery['savePathOriginal'] . '/' . $photo . '.jpg'))
            $delete = true;


        // удалим photo.txt
        $l = 0;
        foreach ($db['photo'] as $lines) {
            $line = explode("||", $lines);
            if ($line[0] == $photo) {
                unset($db['photo'][$l]);
            }
            $l++;
        }

        if ($delete)
            writeData($TXTPhoto, $db['photo']);


        // поменяем album.txt
        $data = array();
        foreach ($db['album'] as $lines) {
            $line = explode("||", $lines);

            if ($line[0] == $album)
                $line[4] = $line[4] - 1;

            // конвертируем обратно
            $data[] = implode("||", $line);
        }

        if ($delete)
            writeData($TXTAlbum, $data);

        // отдаем результат
        $json = array('result' => false);
        if ($delete)
            $json = array('result' => true);

        if ($return) {
            return $json;
        }

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        die();
    }
} else {
    die('Функция deletePhoto плагина Gallery не инициализирована');
}

if (!function_exists('addPhoto')) {
    /**
     * Добавить фото
     */
    function addPhoto()
    {
        global $gallery;
        include_once('ac_image_class.php');

        $db['photo'] = file($TXTPhoto = $gallery['dbPhotos']);
        $db['album'] = file($TXTAlbum = $gallery['dbAlbums']);
        $album = (isset($_GET['album'])) ? (int)$_GET['album'] : 0;

        $id = end($db['photo']);
        $id = explode('||', $id);
        $id = ($id[0]) ? $id[0] + 1 : 1;

        $save = false;

        $original = $gallery['savePathOriginal'] . '/' . $id . '.jpg';


        // Сохраняем фотографию
        if (isset($_FILES['photo']['tmp_name']) && move_uploaded_file($_FILES['photo']['tmp_name'], $original)) {
            chmod($original, 0777);
            // thumb
            $img = new acResizeImage($original);
            $img->thumbnail(200, 150, 2);
            $patch = $img->save($gallery['savePathThumb'] . '/', $id, 'jpg', true, 100);

            if (chmod($patch, 0777))
                $save = true;
        }

        if ($save && $album > 0) {
            // Добавим в photo.txt
            $string = $id . '||' . $album . '||||||' . date('d-m-Y');
            $db['photo'][] = $string;
            writeData($TXTPhoto, $db['photo']);

            // Добавим album.txt
            $data = array();
            foreach ($db['album'] as $lines) {
                $line = explode("||", $lines);

                if ($line[0] == $album)
                    $line[4] = $line[4] + 1;

                // конвертируем обратно
                $data[] = implode("||", $line);
            }

            writeData($TXTAlbum, $data);


            $json = array(
                'result' => true,
                'thumb' => $gallery['thmubSrc'] . '/' . $id . '.jpg',
                'original' => $gallery['originalSrc'] . '/' . $id . '.jpg',
                'album' => $album,
                'id' => $id,
            );
        } else {
            $json = array('result' => false);
        }

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        die();
    }
} else {
    die('Функция addPhoto плагина Gallery не инициализирована');
}

if (file_exists(__DIR__ . '/actions.php')) {
    include_once __DIR__ . '/actions.php';
} else {
    die('Файл ' . __DIR__ . '/actions.php' . ' плагина Gallery не найден');
}