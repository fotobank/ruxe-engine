<?
				$name   =  str_replace(array('http:','/'),'',$cms_site).'-'.date("d.m.Y").'-'.substr(md5(rand(1,9999).rand(1,9999)),0,14).'.zip';
				$backup =  new ZipArchive;
				if ($backup -> open($cms_root.'/rpanel/backups/'.$name, ZIPARCHIVE::CREATE) == true)
				{
					//Главный .htaccess
					$backup -> addFile('.htaccess');
					//conf
					$allfiles = array();
					$FileManager->recoursiveDir($cms_root.'/conf');
					foreach ($allfiles as $file)
						$backup -> addFile(str_replace($cms_root.'/conf/',"conf/",$file));
					//avatars
					$allfiles = array();
					$FileManager->recoursiveDir($cms_root.'/avatars');
					foreach ($allfiles as $file)
						$backup -> addFile(str_replace($cms_root.'/avatars/',"avatars/",$file));
					//themes
					$allfiles = array();
					$FileManager->recoursiveDir($cms_root.'/themes');
					foreach ($allfiles as $file)
						$backup -> addFile(str_replace($cms_root.'/themes/',"themes/",$file));	
				
					$backup->close();
					chmod($cms_root.'/rpanel/backups/'.$name,0777);
					$backups  = fopen($cms_root."/conf/backups.dat","a");
					fputs($backups,$name."|".date("d.m.y, H:i")."|\r\n");
					fclose($backups);
					header("location: ".$cms_site."/rpanel/?action=system&ok=50&rand=".rand(1,9999).'#confbackup');
					exit;
				}
				else
				{
					die("Error. 132: Резервная копия не может быть создана. Возможно нет прав на запись в каталог /rpanel/backup/.<br>Кроме того, убедитесь, что на сервере установлен PHP версии 5.2 или выше.");
					exit;
				};
