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
  $add_menu = "";
  $smiles1   = '';
  $smiles2   = '';
  $smilesdb = file($cms_root."/conf/smiles.dat");
  foreach ($smilesdb as $smilesd)
  {
            $smile = str_replace("\r\n","",$smilesd);
            if ($smile!='')
            {
               $smiles1 .= '<img alt="" src="'.$cms_site.'/includes/smiles/'.$smile.'.gif" border=0 style="cursor:hand;" onClick="tag(document.getElementById(\'short\'),\'['.$smile.']\',\'\'); document.getElementById(\'smiles1\').style.display=\'none\';"> ';
               $smiles2 .= '<img alt="" src="'.$cms_site.'/includes/smiles/'.$smile.'.gif" border=0 style="cursor:hand;" onClick="tag(document.getElementById(\'full\'),\'['.$smile.']\',\'\'); document.getElementById(\'smiles2\').style.display=\'none\';"> ';
            };
  };
  $echooptions = '<h2>F.A.Q.</h2>
          <font class="desc">Управление модулем ЧаВо (Вопросы и ответы)</font><br><br>';
  (isset($_POST['change'])) ? $change=$_POST['change'] : $change = "";
  (isset($_POST['select'])) ? $select=$_POST['select'] : $select="";
  if ($change=="no") $add_menu.= "<script>alert('Выберите действие, прежде чем нажимать кнопку \"Выполнить\"');</script>";
  if ($change!="")
  {
     if ($change!="no")
     {
         if ($select=="")
         {
             $add_menu.= "<script>alert('Выберите сообщение, а затем действие');</script>";
         };
     };
  };
  if ($change=="delete")
  {
      if ($select != "") {
	$select--;
	$file=file("../conf/faq.dat"); 

	for($i=0;$i<sizeof($file);$i++)
		if($i==$select) unset($file[$i]); 

	$fp=fopen("../conf/faq.dat","w"); 
	fputs($fp,implode("",$file)); 
	fclose($fp);
	$select++;
	$add_menu.= "<script>alert('Сообщение под номером ".$select." успешно удалено');</script>";
      };
  };
  if ($change=="edit")
  {
    if ($select!=""){
      $db = file("../conf/faq.dat");
      $ddb = explode("|",$db[$select-1]);
      $ddb[4]=str_replace("<br>","\r\n",$ddb[4]);
      $ddb[6]=str_replace("\r\n","",$ddb[6]);
      $ddb[6]=str_replace("<br>","\r\n",$ddb[6]);
      $ar = array("{SELECT}","{ADMIN_LOGIN}","{QUESTION}","{ANSWER}","{THEMEPATH}","{SMILES1}","{SMILES2}");
      $br = array($select,$_COOKIE['site_login'],$ddb[4],$ddb[6],$cms_site."/themes/".$cms_theme,$smiles1,$smiles2);
      $echooptions.= $GlobalTemplate->template($ar,$br,"./theme/addfaq.tpl");
    };
  };
  if ($change=="end_change")
  {
     if ($select!=""){
       $question=$Filtr->clear($_POST['question']);
       $question=str_replace("\r\n","<br>",$question);
       $question=str_replace("\n","<br>",$question);
       $answer=$Filtr->clear($_POST['answer']);
       $answer=str_replace("\r\n","<br>",$answer);
       $answer=str_replace("\n","<br>",$answer);
       $db  = file("../conf/faq.dat");
       $old = explode("|",$db[$select-1]);
       $new = $old[0]."|".$old[1]."|".$old[2]."|show|".$question."|".$_POST['name']."|".$answer;
       $select--;
       $file=file("../conf/faq.dat"); 
       for($i=0;$i<sizeof($file);$i++)
		if($i==$select) unset($file[$i]); 
       $fp=fopen("../conf/faq.dat","w"); 
       fputs($fp,implode("",$file));
       fputs($fp,$new."\r\n"); 
       fclose($fp);
       $select++;
       $add_menu.= "<script>alert('Выполнено');</script>";
     };
  };
  if ($change=="show")
  {
     if ($select!=""){
       $db  = file("../conf/faq.dat");
       $old = explode("|",$db[$select-1]);
       $new = $old[0]."|".$old[1]."|".$old[2]."|show|".$old[4]."|".$old[5]."|".$old[6];
       $select--;
       $file=file("../conf/faq.dat"); 
       for($i=0;$i<sizeof($file);$i++)
		if($i==$select) unset($file[$i]); 
       $fp=fopen("../conf/faq.dat","w"); 
       fputs($fp,implode("",$file));
       fputs($fp,$new); 
       fclose($fp);
       $select++;
       $add_menu.= "<script>alert('Сообщение успешно отображено');</script>";
     }
  };
  if ($change=="hide")
  {
     if ($select!=""){
       $db  = file("../conf/faq.dat");
       $old = explode("|",$db[$select-1]);
       $new = $old[0]."|".$old[1]."|".$old[2]."|hide|".$old[4]."|".$old[5]."|".$old[6];
       $select--;
       $file=file("../conf/faq.dat"); 
       for($i=0;$i<sizeof($file);$i++)
		if($i==$select) unset($file[$i]); 
       $fp=fopen("../conf/faq.dat","w"); 
       fputs($fp,implode("",$file));
       fputs($fp,$new); 
       fclose($fp);
       $select++;
       $add_menu.= "<script>alert('Сообщение успешно скрыто');</script>";
     }
  };
  $echooptions.= "
  <form name=\"deystvie\" action=\"?action=faq\" method=\"post\">
  <center><table class=\"optionstable\" border=0 cellpadding=1 cellspacing=0>
  <tr class=\"titletable\"><td>ДАННЫЕ</td><td width=80>ВЫБРАТЬ</td></tr>
  ";
  $faq_db=file("../conf/faq.dat");
  
  $d = 0;
  foreach  ($faq_db as $faqs)
  {
     $faq=explode("|",$faqs);
     $d++;
     $echooptions.= "<tr><td><b>Вопрос:</b><br>".$GlobalTemplate->usebbcodes($faq[4],'html')."<br><br><b>Ответ: </b><br>".$GlobalTemplate->usebbcodes($faq[6],'html',true)."<br><br><b>Статус сообщения: </b>
     ";
     if ($faq[3]=="show")
     {
     $echooptions.= "отображено";
     }
     else
     {
     $echooptions.= "скрыто";
     };
   $echooptions.= "</td>
   <td><input type=\"radio\" NAME=\"select\" VALUE=\"".$d."\"></td></tr>
   ";
  };
   $echooptions.= "<tr class=\"titletable\"><td colspan=2>ДЕЙСТВИЕ</td></tr>
  <tr><td colspan=2>
     <center><SELECT NAME=\"change\"> 
<OPTION VALUE=\"no\" selected>&lt;&lt;Выберите действие&gt;&gt; 
<OPTION VALUE=\"delete\">&gt;Удалить выбранное сообщение и ответ на него 
<OPTION VALUE=\"edit\">&gt;Редактировать/Ответить на сообщение 
<OPTION VALUE=\"show\">&gt;Разрешить показ сообщения
<OPTION VALUE=\"hide\">&gt;Отменить показ сообщения (скрыть)
</SELECT>&nbsp;<input type=\"submit\" name=\"submit\" value=\"Выполнить\">
</center>
  </td></tr>
  </table></center>
  </form>";
  $ar = array("{MENU}","{OPTIONS}");
  $br = array("",$echooptions.$add_menu);
  echo $GlobalTemplate->template($ar,$br,"./theme/admincenteroptions.tpl");
?>
