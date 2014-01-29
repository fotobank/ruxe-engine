<?
/*
Ruxe Engine (http://engine.ruxesoft.net/)

1) Правообладателем, а также автором программы Ruxe Engine и всех версий является Ахрамеев Денис 
Викторович (официальный сайт: www.ruxesoft.net).

2) Вы имеете право бесплатно использовать программу в течение неограниченного срока и получать 
коммерческую выгоду от сайта, работающего под управлением Ruxe Engine.

3) Вы можете распространять программу, но НЕ получая от этого никакой коммерческой выгоды и не 
нарушая целостность оригинального дистрибутива.

4) Вы НЕ имеете права сдавать в аренду, продавать программу, а также использовать её на сайтах с 
порно или другим, нарушающим законодательство РФ, контентом.

5) Вы НЕ имеете права использовать программу для создания дорвеев.

6) При использовании любой части кода из программы в личных целях (например, для написания 
собственной CMS), необходимо указывать следующее: "Следующий код взят из Ruxe Engine 
(http://engine.ruxesoft.net)". Однако, если вы использовали более 10 Кбайт кода из программы 
в личных целях, то вам необходимо разместить ссылку на сайт http://engine.ruxesoft.net на 
видном месте, например:

echo '<a href="http://engine.ruxesoft.net" target="_blank">Скрипт написан на основе кода Ruxe Engine</a>';

7) Вы НЕ имеете права препятствовать/удалять или каким-либо другим образом мешать программе 
отображать на страницах сайта, использующего систему, текст "Powered by Ruxe Engine" с 
ссылкой на http://engine.ruxesoft.net.

8) Помните, что Ruxe Engine держится лишь на чистом энтузиазме автора, прибыли от программы 
никакой.

9) Программа распространяется по принципу "как есть". Никаких гарантий автор не предоставляет, 
а также не несёт ответственности за порчу имущества или информации программой.

10) Вы можете использовать данное программное обеспечение в любой стране мира.

11) Любые другие права, не указанные явно в настоящем Соглашении, принадлежат Ахрамееву Денису 
Викторовичу.

12) Данное Лицензионное соглашение может быть изменено для последующих версий программного 
обеспечения без уведомления вас об этом.

13) Если вы не согласны с условиями данного Лицензионного соглашения, вы обязаны удалить 
программу и все её части с ваших носителей.
*/
	include("check2.php");
	$options= "";
  
	$tmp	=	$GlobalUsers->getrules($login);
	if ($tmp['comments_edit']!=true) {
		die('Недостаточно прав');
		exit;
	}
      
	if (isset($_GET['from'])) {
		$from	= $_GET['from'];
		if ($from == "message") {
			if (isset($_GET['message'])) {
				$file	= file("../conf/messages/mess_".str_replace(".","",$Filtr->clear($_GET['message'])).".dat");
				if (count($file)>0)
					$p	= explode("|",$file[0]);
				$listmess 	= file("../conf/messages/listmess.dat");
				$o 		= explode("|",$listmess[(int)$_GET['line']]);
				$menu 		= '
							<h2>Комментарии</h2>
							<font class="desc">Управление комментариями раздела "<b>'.$o[1].'</b>"</font><br><br>  
						';
				$messages 	= '<center><table class="optionstable" border=0 cellpadding=1 cellspacing=0>
							<tr class="titletable"><td>КОММЕНТАРИЙ</td><td>ДЕЙСТВИЯ</td></tr>';
				for ($i=count($file)-1; $i>-1; $i--)
				{
					$p = explode("|",$file[$i]);
					if ($p[6]=="yes") {
						$p[6]="Да";
					} else 
						$p[6]="Нет";
					($cms_smiles==1) ? $tm = $GlobalTemplate->usebbcodes($p[3],'html') : $tm = $p[3]; 
					$messages.="<tr><td><b>Дата:</b> ".$Filtr->fulldate($p[0])."<br>
							<b>Имя:</b> ".$p[1]."<br>
							<b>E-mail:</b> ".$p[2]."<br>
							<b>IP:</b> ".$Filtr->ipclick($p[5])."<br>
							<b>Отображено:</b> ".$p[6]."<br>
							<b>Сообщение:</b> ".$tm."</td><td width=130>";
					if ($p[6]=='Да')
						$messages.="<a href=\"saver.php?saverdo=showmess&amp;withdo=hidecomment&amp;from=message&amp;file=".$Filtr->clear($_GET['message'])."&amp;line=".$i."&amp;addline=".(int)$_GET['line']."\">Скрыть</a><br><bR>";
					else
						$messages.="<a href=\"saver.php?saverdo=showmess&amp;from=message&amp;file=".$Filtr->clear($_GET['message'])."&amp;line=".$i."&amp;addline=".(int)$_GET['line']."\">Отобразить</a><br><bR>";
					$messages.="               
							<a href=\"?action=messages&amp;from=message&amp;go=edit&amp;message=".$Filtr->clear($_GET['message'])."&amp;line=".(int)$_GET['line']."&amp;addline=".$i."\">Изменить</a><br><bR>
							<a href=\"#\" onClick=\"if (checkhead()) location.href='saver.php?saverdo=delcomment&amp;type=".$from."&amp;message=".$Filtr->clear($_GET['message'])."&amp;addline=".(int)$_GET['line']."&amp;line=".$i."';\">Удалить</a>
					";                   
				};
				$messages .= '</table></center>
							';
			};
		} else if ($from == "feedback") {
			$GlobalUsers->access(1);
			$file = @file("../conf/feedback.dat");
			if (count($file)>0)
			$p = explode("|",$file[0]);
			$menu = '
				<h2>Обратная связь</h2>
				<font class="desc">История сообщений, отправленных через форму обратной связи</font><br><br>  
				';
			$messages = '<center><table class="optionstable" border=0 cellpadding=1 cellspacing=0>
					<tr class="titletable"><td>СООБЩЕНИЕ</td><td>ДЕЙСТВИЯ</td></tr>
				';
			for ($i=count($file)-1; $i>-1; $i--) {
				$p = explode("|",$file[$i]);
				($cms_smiles==1) ? $tm = $GlobalTemplate->usebbcodes($p[1],'html') : $tm = $p[1]; 
				$messages.="<tr><td>".$p[0]."<br>
					Сообщение: ".$tm."</td><td width=130>
						<a href=\"#\" onClick=\"if (checkhead()) location.href='saver.php?saverdo=delcomment&amp;type=".$from."&amp;line=".$i."';\">Удалить</a>
					";                   
			};
			$messages .= '</table></center>
					';
		} else {
			if (isset($_GET['news'])) {
				$file = file("../conf/".$from."/".$Filtr->clear($_GET['news']).".dat");
				$p = explode("|",$file[0]);
              
				$bfg = file($cms_root.'/conf/bfg.dat');
				foreach ($bfg as $bf) {
					$b = explode("|",$bf);
					if ($b[0]==$from) {
						$nameofbfg = $b[1];
						break;
					};
				};
		
				$menu = '
					<h2>Комментарии</h2>
					<font class="desc">Управление комментариями записи "<b>'.$p[2].'</b>" новостного раздела <a href="?action=bfgshow&type='.$from.'">'.$nameofbfg.'</a></font><br><br>  
					';
				$messages = '<center><table class="optionstable" border=0 cellpadding=1 cellspacing=0>
						<tr class="titletable"><td>КОММЕНТАРИЙ</td><td>ДЕЙСТВИЯ</td></tr>
				';
				
				$lastposts = file("../conf/last_posts.dat");
				for ($i=count($file)-1; $i>0; $i--) {
					$p = explode("|",$file[$i]);
					if ($p[6]=="yes") {$p[6]="Да";} else $p[6]="Нет";
					($cms_smiles==1) ? $tm = $GlobalTemplate->usebbcodes($p[3],'html') : $tm = $p[3];
					
					$messages.="<tr><td><b>Дата:</b> ".$Filtr->fulldate($p[0])."<br>
							<b>Имя:</b> ".$p[1]."<br>
							<b>E-mail:</b> ".$p[2]."<br>
							<b>IP:</b> ".$Filtr->ipclick($p[5])."<br>
							<b>Отображено:</b> ".$p[6]."<br>
							<b>Сообщение:</b> ".$tm."</td><td width=130>
							<a href=\"../".$from."/".$_GET['news'].$cms_rewrite_ext."?message=[quote=".$p[1]."]".str_replace('<br>',' ',$p[3])."[/quote]&amp;rand=".rand(1,999)."#messbox\" target=\"_blank\">Ответить</a><br><br>";
					if ($p[6]=='Да')
						$messages.="<a href=\"saver.php?saverdo=showmess&amp;withdo=hidecomment&amp;from=".$from."&amp;file=".$Filtr->clear($_GET['news'])."&amp;line=".$i."&amp;lastline=\">Скрыть</a><br><bR>";
					else
						$messages.="
							<a href=\"saver.php?saverdo=showmess&amp;from=".$from."&amp;file=".$Filtr->clear($_GET['news'])."&amp;line=".$i."&amp;lastline=\">Отобразить</a><br><bR>";
						$messages.="
				
							<a href=\"?action=messages&amp;from=".$from."&amp;go=edit&amp;news=".$Filtr->clear($_GET['news'])."&amp;line=".$i."\">Изменить</a><br><bR>
							<a href=\"#\" onClick=\"if (checkhead()) location.href='saver.php?saverdo=delcomment&amp;type=".$from."&amp;news=".$Filtr->clear($_GET['news'])."&amp;line=".$i."';\">Удалить</a>
							";                   
				};
				$messages .= '</table></center>
						';
			};
		};
	} else {
		$messages = "";
	};
  
	if (isset($_GET['go'])) {
		$from = $_GET['from'];
		(isset($_GET['addline'])) ? $line = $_GET['addline'] : $line = $_GET['line'];
		if ($from=="message") {
			$file = $Filtr->clear($_GET['message']);
			$fp = file("../conf/messages/mess_".$file.".dat");
			$p = explode("|",$fp[$line]);
		} else if ($from=="gb") {
			$file = "";
			$fp = file("../conf/guestbook.dat");
			$p = explode("|",$fp[$line]);
		} else {
			$file = $Filtr->clear($_GET['news']);
			$fp = file("../conf/".$from."/".$file.".dat");
			$p = explode("|",$fp[$line]);
		};
		$smiles = '';
		$smilesdb = file($cms_root."/conf/smiles.dat");
		foreach ($smilesdb as $smilesd) {
			$smile = str_replace("\r\n","",$smilesd);
			if ($smile!='')
				$smiles.='<img alt="'.$smile.'" src="'.$cms_site.'/includes/smiles/'.$smile.'.gif" border=0 style="cursor:hand;" onClick="tag(document.getElementById(\'mess\'),\'['.$smile.']\',\'\'); document.getElementById(\'smiles\').style.display=\'none\';"> ';
		};
		$menu .= "
				<center><table class=\"optionstable\" border=0 cellpadding=1 cellspacing=0>
				<tr class=\"titletable\"><td>РЕДАКТИРОВАНИЕ КОММЕНТАРИЯ</td></tr>
				<tr><td>
				<form name=\"edit\" method=\"post\" action=\"saver.php?saverdo=editmess\">
			";
		$menu.='
				<input type="button" onClick="if (document.getElementById(\'smiles\').style.display==\'none\'){document.getElementById(\'smiles\').style.display=\'block\';} else {document.getElementById(\'smiles\').style.display=\'none\';};"
				value="=)">
				<table bgcolor="white" class="smilestable" cellpadding=1 cellspacing=0 id="smiles" style="position:absolute;display:none;">
					<tr><td width=350>
						'.$smiles.'
					</td></tr>
				</table>
				<input type="button" value="ж" style="font-weight:bold" onClick="tag(document.getElementById(\'mess\'),\'[b]\',\'[/b]\');">
				<input type="button" value="к" style="font-style:italic" onClick="tag(document.getElementById(\'mess\'),\'[i]\',\'[/i]\');">
				<input type="button" value="ч" style="text-decoration:underline" onClick="tag(document.getElementById(\'mess\'),\'[u]\',\'[/u]\');">
				<input type="button" value="п" style="text-decoration:line-through" onClick="tag(document.getElementById(\'mess\'),\'[s]\',\'[/s]\');">
				<input type="button" value="&lt;==" onClick="tag(document.getElementById(\'mess\'),\'[left]\',\'[/left]\');">
				<input type="button" value="&lt;=&gt;" onClick="tag(document.getElementById(\'mess\'),\'[center]\',\'[/center]\');">
				<input type="button" value="==&gt;" onClick="tag(document.getElementById(\'mess\'),\'[right]\',\'[/right]\');">
				<input type="button" value="спойлер" onClick="tag(document.getElementById(\'mess\'),\'[spoiler=Заголовок спойлера]\',\'[/spoiler]\');">
				<input type="button" value="цитата" onClick="tag(document.getElementById(\'mess\'),\'[quote]\',\'[/quote]\');">
				<input type="button" value="скрыть" onClick="tag(document.getElementById(\'mess\'),\'[hide]\',\'[/hide]\');">
				<input type="button" value="ссылка" onClick="tag(document.getElementById(\'mess\'),\'[url]\',\'[/url]\');">
				<br>';
		$menu .=" 
				<textarea name=\"text\" id=\"mess\" cols=90 rows=9>".str_replace(
												array("<br>","[dividinglinere]"),
												array("\n","|"),
													$p[3])."</textarea><br>
			";
		if ($from == "message") $menu.="<input type=\"hidden\" name=\"addline\" value=\"".(int)$_GET['line']."\">
						";
		$menu.="
				<input type=\"hidden\" name=\"from\" value=\"".$from."\">
				<input type=\"hidden\" name=\"line\" value=\"".$line."\">
				<input type=\"hidden\" name=\"file\" value=\"".$file."\">
				<input type=\"submit\" name=\"submit\" value=\"Сохранить\">        
				</form>
				</td></tr></table><br></centeR>
			";
	};
   
	$options = $GlobalTemplate->template("{MESSAGES}",$messages,"./theme/messages.tpl");
	
	$ar = array("{MENU}","{OPTIONS}");
	$br = array("",$menu.$options);
	echo $GlobalTemplate->template($ar,$br,"./theme/admincenteroptions.tpl");
?>