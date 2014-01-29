<?

include("../conf/config.php");
define(ADMINCENTER,true);
include("../includes/core.php");

if (isset($_GET['logout']))
{
	$nws = str_replace(array("http://","www."),array("",""),$cms_site);
  	setcookie("site_login", "no", time() + 144000,"/");
  	setcookie("site_password", "no", time() + 144000,"/");
  	header("location: ".$cms_site."/rpanel/?".rand(0,999999));
};

if (isset($_POST['submit']))
{
	$login 		= 	(isset($_POST['login'])) ? $Filtr->clear($_POST['login']) : 'no';
	$password	=	(isset($_POST['password'])) ? $Filtr->clear($_POST['password']) : 'no';
	
	$tpos		=	$GlobalUsers->finduser($login,false,'',true);
	$pos		=	$tpos;
	
	if ($tpos!=-1)
	{
		$tu	=	explode('|',$fileusers[$tpos]);
		//смена пароля с солью
		if ($tu[23]!='yes')
		{
			$pos	=	$GlobalUsers->finduser($login,true,md5($password),true);
			if ($pos!=-1)
			{
				$gen			=	$Filtr->randwords(12);
				$usersfruits[23]	=	'yes';
     				$usersfruits[22]	=	$gen;
     				$usersfruits[1]		=	md5(md5($password).$gen);
     				$GlobalUsers->editpoles('user',$tu[18]);
     				$g			=	$gen;
     			}
     			else
				$g			=	rand(1,9);
		}
		else
		{
			$g		=	$tu[22];
			$pos		=	$GlobalUsers->finduser($login,true,md5(md5($password).$g),true);			
		};
	};
	
	
	
	
	
	
	if ($pos!=-1)
	{
		$u		=	explode('|',$fileusers[$pos]);
		$status		=	$u[4];
	}
	else
		$status		=	'no';
	//$tmp2		=	$GlobalUsers->checkadminip($login,$password);
	/*if ($tmp!=-1)
		$status	=	$GlobalUsers->getpole($login,4);
	else
		$status	=	'no';*/
	//echo($tmp);
	//die('<br>d');
	$fail		=	false;
	if (
		($status=='admin')
		or
		($status=='editor')
		or
		($status=='moderator')
	)
	{
		//if ($tmp2==false)
		//	$fail	=	true;
		//else
		//{
			//$login	=	$GlobalUsers->fullname($login);
			$login	=	$u[18];
			setcookie("site_login", $login, time() + $cms_time_cookie,"/");
			setcookie("site_password", md5(md5($password).$g), time() + $cms_time_cookie,"/");
			setcookie("site_avatar", $u[16], time() + 1209600,"/");
       			if (isset($_SERVER['HTTP_REFERER']))
       			{
          			if ($_SERVER['HTTP_REFERER'] == "")
              				$back = $cms_site."/rpanel/";
          			else
              				$back = $_SERVER['HTTP_REFERER'];
       			}
       			else
        			$back = $cms_site."/rpanel/";
        		$old = file($cms_root."/conf/admin_ip.dat");
       			$file = fopen($cms_root."/conf/admin_ip.dat","w");
       			foreach ($old as $o)
       			{
          			$z = explode("|",$o);
          			if ($Filtr->tolower($z[0])!=$Filtr->tolower($login))
            				fwrite($file,$o);
       			};
       			fwrite($file,$login."|".$Filtr->clear($_SERVER['REMOTE_ADDR'])."|\r\n");
       			fclose($file);
       			header("location: ".$back);
       			exit;
		//};
	}
	else
		$fail	=	true;
	if ($fail)
	{
		header('Content-type: text/html; charset=utf-8');
       		$ar = array("{TITLE}","{GENERATOR}","{MESSAGE}");
       		$br = array("Вход не выполнен","Ruxe Engine (engine.ruxesoft.net)","Вы ввели неверную пару логин-пароль или не имеете прав администратора");
       		echo $GlobalTemplate->template($ar,$br,$cms_root."/rpanel/theme/somemessages.tpl");
	};
};
?>