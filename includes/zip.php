<?php

if (! isset($allowZipping))
    exit;

$dir = $cms_root . "/rpanel/backups";
$name = str_replace(array("http:", "https:", "/"), "", $cms_site)
        . "-" . date("d.m.Y") . "-" . substr(md5(rand(1, 9999) . rand(1, 9999)), 0, 14) . ".zip";
$fileName = "{$dir}/{$name}";

if (! is_writable($dir)) {
    throw new \Exception("Can't write in directory {$dir}. Check CHMOD is 777.");
}

$backup = new ZipArchive();
if ($backup->open($fileName, ZIPARCHIVE::CREATE) == true) {
    //Главный .htaccess
    if (! $backup->addFile(".htaccess")) {
        throw new \Exception($backup->getStatusString());
    }

    $directories = ["conf", "themes", "avatars", "smiles"];
    foreach ($directories as $directory) {
        $files = $FileManager->recoursiveDir("{$cms_root}/{$directory}");
        foreach ($files as $file) {
            if (! $backup->addFile(str_replace("{$cms_root}/{$directory}/", "{$directory}/", $file))) {
                throw new \Exception($backup->getStatusString());
            }
        }
    }

    if (! $backup->close()) {
        throw new \Exception($backup->getStatusString());
    }

    chmod($fileName, 0777);

    $backups = fopen($cms_root . "/conf/backups.dat", "a");
    fputs($backups, $name . "|" . date("d.m.y, H:i") . "|\r\n");
    fclose($backups);

    header("location: " . $cms_site . "/rpanel/?action=system&ok=50&rand=" . rand(1, 9999) . '#confbackup');
    exit;
} else {
    die("Error. 132: Резервная копия не может быть создана. Возможно нет прав на запись в каталог /rpanel/backup/.<br>Кроме того, убедитесь, что на сервере установлен PHP версии 5.2 или выше.");
}
