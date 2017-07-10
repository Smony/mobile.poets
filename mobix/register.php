<?

#include ("../includes.php");

$title=$LT[100][$L];
$updir="../../upload/photos/";


if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
	$secret = '6LeN_AoUAAAAANFb-61-7qzn6dDo-4i9ErLAbVHk';
	$user_ip = $_SERVER["REMOTE_ADDR"];
	$response = $_POST['g-recaptcha-response'];
	$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$user_ip");
	$arr = json_decode($rsp, TRUE);
	if($arr['success']) {
		if (isset($submit)){	
			$valid_ip = $p->getValidIp($user_ip);
			if (false) {
				echo '<p style="color: red; font-size: 140%; text-align: center;"><b>Регистрация новых пользователей с текущим IP-адресом запрещена</b></p>';
			}
			else 
			{
				if (strpos($aboutme, 'gavr-poet') || strpos($public, 'gavr-poet')) {exit;}
				//if(!isset($email)    || !eregi("[[:alnum:]\\.-]+@([[:alnum:]\\.-])+\\.[[:alnum:]\\.-]",$email) || strlen($email) > 40 )$err[]=$LT[101][$L];
				if(!isset($password) || trim($password)==="" ||  strlen($password) > 20)$err[]=$LT[102][$L];
				//if(!isset($nick)     || ereg("^[a-zA-Zа-яёА-ЯЁіІЄєїЇ]",$nick)==false || trim($nick)==="" ||  strlen($nick) > 30)$err[]=$LT[103][$L];
				if(isset($birthdate) && strlen($birthdate) > 40)$err[]=$LT[104][$L];
				if(!isset($realname) || strlen($realname) > 50 || trim($realname)==="")$err[]=$LT[105][$L];
				if(!isset($city)     || trim($city)==="" || strlen($city)  > 50 )$err[]=$LT[106][$L];
				if(isset($aboutme)   && strlen($aboutme)  > 400 )$err[]=$LT[107][$L];
				if(isset($public)    && strlen($public)  > 400 )$err[]=$LT[108][$L];
				if(is_uploaded_file($_FILES['photo']['tmp_name']))
				{  
					  $sz = $_FILES['photo']['size'];
					  $tp = $_FILES['photo']['type'];     
					  if ($tp == "image/jpeg" || $tp == "image/pjpeg") $new_name=$updir."new_".md5(rand()).".jpg"; 
					  else $err[]=$LT[109][$L]; 
					  if ($sz > 500000) $err[]=$LT[110][$L]; 
				}
				echo "<br>";	
				if(count($err)) foreach( $err as $k=>$v)echo "<center><b>".$LT[111][$L]."</b>:&nbsp;<font class=red size=2>$v</font><br></center>";
				  else 
				{
				  $match = $p->getMatch($email,$nick);
				  if(!count($match)) 
					{



							   if (is_uploaded_file($_FILES['photo']['tmp_name']))
								 {
							$nw = 250;// DESTINATION WIDTH

												$tn = $_FILES['photo']['tmp_name'];
													if ($src = imagecreatefromjpeg($tn))
													{
											   
													  $kf = number_format((imagesx($src) /$nw),2);
													  $nh = (int)(imagesy($src) / $kf);

													  $dest = imagecreatetruecolor($nw,$nh);
													  imagecopyresampled($dest,$src,0,0,0,0,$nw,$nh,imagesx($src),imagesy($src));
													  imagejpeg($dest,$new_name,80);
													  echo "<center><img src=$new_name width=$nw height=$nh></center>";
									  
												   }
													else echo "not JPEG format!";




								  }	

							if (!strpos('1111'.$nick, 'Пил') && !strpos($email, '@spam.ru')) {
							
							  $user = array(
									'email' 		=> htmlspecialchars(trim($email)),
									'password' 		=> htmlspecialchars(trim($password), ENT_NOQUOTES, 'cp1251'),
									'nick' 			=> htmlspecialchars(trim(str_replace("'", "`", $nick)), ENT_NOQUOTES, 'cp1251'),
									'aboutme' 		=> htmlspecialchars($aboutme, ENT_NOQUOTES, 'cp1251'),
									'public' 		=> htmlspecialchars($public, ENT_NOQUOTES, 'cp1251'),
									'photo' 		=> htmlspecialchars(@$new_name),
									'realname' 		=> htmlspecialchars($realname, ENT_NOQUOTES, 'cp1251'),
									'phone'			=> $phone,
									'city' 			=> htmlspecialchars($city, ENT_NOQUOTES, 'cp1251'),
									'birthdate' 	=> $b_date,
									'sez' 			=> $sez,
									'send_club' 	=> @$send_club,
									'send_comments' => $send_comments,
									'send_news' 	=> @$send_news,
									'send_email' 	=> @$send_email,
									'datareg' 		=> mktime(),				
									'ischat'		=> 1
							  );
							  
							
							 if($uiid = $p->InsertUser($user))
								{  
									$all_ok=1;	
								}
							else 	{echo "DATABASE ERROR!!";}
							}
						}	
					else echo $LT[112][$L];

				}		
			}
		}
		else echo '<H3 align="center" style="color:Red">'.$LT[630][$L].'!</H3>';
	}
}

if (!isset($all_ok))
{

?>
<!-- Register Popup -->
<div class="popup popup-signup">
<style>
	form.legend{padding-left:0;}form legend,form label{color:#333;}
	form fieldset{border:none;border-top:1px solid #C9DCA6;background-color:#F8FDEF;}
	form fieldset fieldset{background:none;}
	form fieldset p,form fieldset fieldset{padding:5px 10px 7px;}
	form label.error,label.error{color:red;font-style:italic;display:block;}div.error{display:none;}
	input.error{border:1px dotted red;}
	.required-fields {width: 700px}
	.required-fields td {padding: 3px;}
	.required-fields h4 {display: inline-block;}
	.required-fields input, .required-fields textarea {width: 60.5%; padding: 5px 10px;background: #fff;
	height: auto; border: solid 1px rgba(0,0,0,0.2);border-radius: 4px;}
	input[type="radio"]{width:auto}
	input[type="submit"]{padding: 3px 10px;height: auto;border-radius: 3px;border: solid 1px rgba(0,0,0,0.5);font-family: Verdana,Arial;
    font-size: 12px;color: #1E524B;font-weight: bolder;}
	input[type="submit"]:hover{background:#B7D0DB;cursor:pointer}
	.valid {display: inline-block;vertical-align: initial;padding: 0 0 0 5px;width: 38.5%;}
	.required-fields textarea {height:100px;resize:none;}
	.agree td{vertical-align:top}
	.agree td span{display:block;width:350px;padding:0 5px}
	#agree{width:auto;vertical-align:top}
	.ac_results{width: 300px !important;border: solid 1px rgba(0,0,0,0.2);border-top: none;background: #fff;}
	.ac_results ul {margin:0;padding:0;}
	.ac_results ul li {display: block;padding:7px 12px}
	.ac_results ul li:hover {background:rgba(30, 82, 79, 0.76);cursor:pointer;color:#fff}
	span.valid {font-style: italic;}
</style>
<center>
11111111111111111
<form action="<?=$PHP_SELF?>" name=frm method=post id="register" enctype="multipart/form-data">
<table border=0  cellpadding=0 cellspacing=2 class="required-fields">
<tr><td colspan=2 align=center><h4><?=$LT[113][$L]?></h4></td></tr>
<tr><td colspan=2 align=center><?=$LT[268][$L]?> <a href="javascript:void(0);" onclick="return hs.htmlExpand(this, { objectType: 'ajax', src: '/main_rules.php', anchor: 'bottom' } ); " class=" "><?=$LT[269][$L]?></a></h4></td></tr>
<tr><td colspan=2 align=center><span class=red>*</span>&nbsp; - <?=$LT[114][$L]?></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td align=right><b><?=$LT[115][$L]?></b> <span class=red>*&nbsp;</span></td><td><input type=text name=nick class="inp get-match" maxlength=51 value="<?=@$nick?>"><span class="valid"></span></td></tr>
<tr><td align=right><b>E-mail</b>&nbsp;<span class=red>*&nbsp;</span></td><td><input type=text name=email class="inp get-match" autocomplete="off" maxlength=40 value="<?=@$email?>"><span class="valid"></span></td></tr>
<tr><td align=right><b><?=$LT[524][$L]?></b>&nbsp;<span class=red>*&nbsp;</span></td><td><input id="password" type=password name=password class=inp autocomplete="off" maxlength=20></td></tr>
<tr><td align=right><b>Повторіть пароль </b>&nbsp;<span class=red>*&nbsp;</span></td><td><input type=password name=rep_password class=inp autocomplete="off" maxlength=20></td></tr>
<tr><td align=right><b><?=$LT[37][$L]?> &nbsp;</b>&nbsp;<span class=red>*&nbsp;</span><span class=red>*&nbsp;</span></td><td><input type=text name=realname class=inp maxlength=50 size=50  value="<?=@$realname?>"></td></tr>
<tr><td align=right><b>Телефон </b>&nbsp;<span class=red>*&nbsp;</span><span class=red>*&nbsp;</span></td><td><input id="phone" type=text name=phone class=inp maxlength=50 size=50  value="<?=@$phone?>" placeholder="(0XX) XXX-XX-XX"></td></tr>
<tr><td align=right><b><?=$LT[525][$L]?></b>&nbsp;<span class=red>*&nbsp;</span></td><td><input id="b_date" type=text name=b_date class=inp value="<?=@$b_date?>" placeholder="дд-мм-рррр"></td></tr>
<tr><td align=right><b><?=$LT[38][$L]?> (українською)</b>&nbsp;<span class=red>*&nbsp;</span></td><td><input id="city" type=text name=city class=inp maxlength=30  value="<?=@$city?>"></td></tr>
<tr><td align=right><b><?=$LT[254][$L]?></b>&nbsp;</td><td><input type="radio" name="sez" value="male" CHECKED> <img src="/img/author_male.gif" width="16" height="16" border="0" align="absmiddle">&nbsp;&nbsp;<input type="radio" name="sez" value="female"> <img src="/img/author_female.gif" width="16" height="16" border="0" align="absmiddle"></td></tr>
<tr><td valign=top align=right><b><?=$LT[117][$L]?></b>&nbsp;&nbsp;</td><td><textarea rows=6 cols=25 name=public class=tarea><?=@$public?></textarea></td></tr>
<tr><td valign=top align=right><b><?=$LT[118][$L]?></b>&nbsp;</td><td><textarea rows=6 cols=25 name=aboutme class=tarea><?=@$aboutme?></textarea></td></tr>
<tr><td align=right><b><?=$LT[119][$L]?></b>&nbsp;</td><td><input type=file name=photo class=inp maxlength=30 value="<?=$LT[517][$L]?>"></td></tr>
<tr><td align=right><strong><?=$LT[331][$L]?></strong><FONT COLOR="#FF0000">*</FONT></td><td align=left><div class="g-recaptcha" data-sitekey="6LeN_AoUAAAAAJTzjC0DdDCUWgeUVU3G2QX8wY4d"></div></td></tr>

<tr><td align=center colspan=2 bgcolor=#B7D0DB><span class=red>*&nbsp;</span><span class=red>*&nbsp;</span><?=$LT[120][$L]?></td></tr>
</table>
<hr width=50%>
<table border=0 cellpadding=0 cellspacing=0>
<tr><td colspan=4 align=center><b><?=$LT[121][$L]?></b></td></tr>
<tr><td><input type=checkbox name="send_club" value=1></td><td><b><?=$LT[122][$L]?></b></td><td><input type=checkbox name="send_news" value=1></td><td><b><?=$LT[123][$L]?></b></td></tr>
<tr><td><input type=checkbox name="send_comments" value=1></td><td><b><?=$LT[124][$L]?></b></td><td><input type=checkbox name="send_email" value=1></td><td><b><?=$LT[545][$L]?></b></td></tr>
<tr><td colspan=4>&nbsp;</td></tr>
</table>
<hr width=50%>
<table border=0 cellpadding=0 cellspacing=0>
<tr><td colspan=4 align=center><b><?=$LT[125][$L]?><span style="color:#0F6183"><?=$LT[126][$L]?></span></b></td></tr>
<tr><td><input type=radio name="anketa" value="<?=$LT[127][$L]?>"></td><td><b><?=$LT[127][$L]?></b></td><td><input type=radio name="anketa" value="<?=$LT[128][$L]?>"></td><td><b><?=$LT[128][$L]?></b></td></tr>
<tr><td><input type=radio name="anketa" value="<?=$LT[129][$L]?>"></td><td><b><?=$LT[129][$L]?></b></td><td><input type=radio name="anketa" value="<?=$LT[130][$L]?>"></td><td><b><?=$LT[130][$L]?></b></td></tr>
<tr><td colspan=4>&nbsp;</td></tr>
</table>
<hr width=50%>
<table border=0 cellpadding=0 cellspacing=0 width="800px" class="agree">
<tr><td colspan=2 align="right" width="250"><input id="agree" type=checkbox name="agree" value=1></td>
<td colspan=2 align="left" width="550"><span>Натискаючи кнопку «<?=$LT[131][$L]?>», я підтверджую, що вказана вище інформація
є достовірною, а також погоджуюсь з <a href="javascript:void(0);" onclick="return hs.htmlExpand(this, { objectType: 'ajax', src: '/main_rules.php', anchor: 'bottom' } ); " class=" ">Правилами публікації та користування сайтом</a></span></td></tr>
<tr><td colspan=4 align=center style="padding:20px"><input type=submit class=inp name=submit value="<?=$LT[131][$L]?>"></td></tr>
</table><input type="hidden" name="akciya" value="<?=$akciya?>" /></form></center>
</div>
<?
}
else
{
?>
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../evercookie/js/swfobject-2.2.min.js"></script>
<script type="text/javascript" src="../evercookie/js/evercookie.js"></script>
<script type="text/javascript">
var ec = new evercookie({
	baseurl: '../../evercookie',
    asseturi: '../../assets',
    phpuri: '../../php'
});

$(document).ready(function(){
	$.blockUI({ message: '<h1 style="padding:20px; font-size:16px;"><?=$LT[1031][$L]?></h1>' });
	
	ec.get("suspicious", function(value) { 	
		if(value == undefined) {			
			ec.set("suspicious", <?=$uiid?>);
			setTimeout(function(){
				ec.get("suspicious", function(value) {					
					$.unblockUI();
				});
			}, 2000);
		}
		else {
			$.ajax({
				type: "POST",
				url: "../../suspicious.php",				
				cache: false,
				data: {actionz: 'suspicious', currid: <?=$uiid?>, previd: value},
				dataType: "html",
				success: function(data) {			
					$.unblockUI();
				}
			});
		}
	});
	
});
</script>
<style>
	.register-success {width:800px;margin: 0 auto}
	.register-success td{font-family: Verdana;font-size: 13px;color: #000000;padding:10px 0}
</style>
<table border='0' width=800 class="register-success">
<tr><td class="main"><center><?=$LT[132][$L]?></center></td></tr>
<? $now_time = time(); if ($akciya == 1 && ($now_time > 1432414800 && $now_time < 1441054800)) {?><tr><td class="main"><center>ЗДОРОВО!!! Вы стали участником акции "3 СТИХА!". Теперь Вы можете добавлять по ТРИ стиха в день, вместо положенных ДВУХ.</center></td></tr><?}?>
<?php
	$cont_id = 9;
	$cont_title = "title_".$L;
	$cont = $p->getPageContent($cont_id, $L, $cont_title);
	$curren_title = $cont[1];
	$curren_cont = $cont[0];

?>
<tr><td align="left"><?echo $curren_cont;?></td></tr>
</table>

<?
//mailing to admins

$to="lionking@niko.kiev.ua";
$subject="poetryclub.com.ua =[new user registered]=";
$from="mailer@poetryclub.com.ua";
$message="
<html>
<head><style type='text/css'> body,td {font-family:Arial;font-size:11px}</style></head>
<body bgcolor='#EDF3F5'>
<center><h3>~ Зарегестрировался новый пользователь ~</h3><br>
<table border='0' cellpadding='4' cellspacing='3' width='50%'>
<tr><td><b>ID:</b></td><td> $uiid </td></tr>
<tr><td><b>NICK:</b></td><td> $nick </td></tr>
<tr><td><b>e-mail:</b></td><td>$email</td></tr>
<tr><td><b>photo:</b></td><td><a href='http://poetryclub.com.ua/$new_name'>$new_name</a></td></tr>
<tr><td><b>Дата рождения:</b></td><td>$birthdate</td></tr>
<tr><td><b>Ф.И.О:</b></td><td> $realname </td></tr>
<tr><td><b>Город</b></td><td> $city </td></tr>
<tr><td><b>О себе</b></td><td>$aboutme</td></tr>
<tr><td><b>Публиковались где-то?</b></td><td>$public</td></tr>
</table></center>";
// additional : anketa, opros
$message.="<hr> <b>".$LT[967][$L]."</b><br>";
if(isset($send_club) )$message.=$LT[968][$L];
if(isset($send_comments) )$message.=$LT[969][$L];
if(isset($send_news) )$message.=$LT[970][$L];

$message.="<br><hr> <b>".$LT[971][$L]."</b>".$LT[972][$L].": ";
if(isset($anketa) )$message.=$anketa;
$message.="</body></html>";




//$message=convert_cyr_string($message,'w','k');


 $headers .= "Date: ".gmdate('D, d M Y H:i:s \G\M\T', time())."\n";
 $headers .= "MIME-Version: 1.0\n";
 $headers .= "Content-type: text/html; charset=windows-1251\n";
 $headers .= "X-Priority: 3\n";
 $headers .= "X-MSMail-Priority: Normal\n";
 $headers .= "X-Mailer: php\n";
 $headers .= "From: $from <".$from.">\n";
 $headers .= "X-MimeOLE: Produced By Microsoft MimeOLE V5.50.4522.1200";




//mail($to,"$subject", $message, $headers);



}

?>
	
	<script type="text/javascript" src="../../js/jquery-migrate-1.4.1.js"></script>
	<script type="text/javascript" src="http://igamov.ru/b-demo/demo/autocomplete/jquery.autocomplete.js"></script>
		
	<?
	 $cities = $p->getCity();
	?> 	
	
	<script>
	$(document).ready(function(){
		var city = [<?php   foreach ($cities as $value)
		echo  '"'.$value.'",';   ?>];
		$("#city").autocompleteArray(city,
			{
				delay:10,
				minChars:1,
				matchSubset:1,
				autoFill:true,
				maxItemsToShow:10
			}
		);
	});

	function show_item(status)
	{
		if (status==0)	$('#city').animate({ height: "hide"}, "hide");
		else $('#city').animate({ height: "show" }, "slow");
	}
	</script>
	<script type="text/javascript" src="http://www.vobu.com.ua/app/webroot/js/jquery.validate.min.js"></script>
	<script>
	$().ready(function() {
		$.validator.methods.email = function( value, element ) {
		//	console.log(element);
  return this.optional( element ) || /^[0-9a-z-\.]+\@[0-9a-z-]{2,}\.[a-z.]{2,}$/i.test( value );
}

		$.validator.methods.b_date = function( value, element ) {
			var errb_date=true;;	
			var b_datecheck=element.value.split('-');

			if(b_datecheck['0']>31){				
				errb_date=false;
				
				
			}
			if(b_datecheck['1']>12){				
				errb_date=false;
			}
			if(b_datecheck['2']><?=date('Y');?>){				
				errb_date=false;
			}
			if(b_datecheck['2']<1940){				
				errb_date=false;
			} 
			return errb_date;
  
}
		
		$("#register").validate({
			rules: {
				nick: {
					required: true,
					minlength: 3,
					maxlength: 50
				},
				email: {
					required: true,
					email: true,
					
				},
				password: {
					required: true,
					minlength: 6
				},
				rep_password: {
					required: true,
					minlength: 6,
					equalTo: "#password"
				},	
				realname: {
					required: true,
					minlength: 10
				},
				phone: {
					required: true,
					minlength: 15			
				
				},
				b_date: {
					required: true,
					b_date:true,
					minlength: 8		
				},
				city: {
					required: true
				},
				agree: {
					required: true
				}
			},
			messages: {
				nick: {
					required: "Будь ласка, заповніть поле 'Псевдонім'",
					minlength: "Мінімальний розмір - 3 символи",
					maxlength: "Максимальний розмір - 50 символів"
				},
				email: {
					required: "Будь ласка, вкажіть Ваш email",
					email: "Невірний формат email"
				},
				password: {
					required: "Будь ласка, заповніть поле 'Пароль'",
					minlength: "Мінімальний розмір - 6 символи"
				},
				rep_password: {
					required: "Будь ласка, повторіть Ваш пароль",
					minlength: "Мінімальний розмір - 6 символи",
					equalTo: "Введені паролі не співпадають"
				},
				realname: {
					required: "Будь ласка, вкажіть Ваше повне ім'я",
					minlength: "Мінімальний розмір - 10 символів"
				},
				phone: {
					required: "Будь ласка, вкажіть Ваш телефон",
					minlength: "Мінімальний розмір - 10 символів"
				},				
				b_date: {
					required: "Будь ласка, вкажіть дату Вашого народження",
						b_date: "Ви невірно ввели дату народження",
						minlength: "Ви невірно ввели дату народження",
				},
				city: {
					required: "Будь ласка, вкажіть місце Вашого проживання"
				},
				agree: {
					required: "Ви маєте погодитися із правила публікації та користування сайтом"
				}
			}
		});
	});
	</script> 
	<script type="text/javascript" src="../../js/jquery.mask.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#b_date').mask('00-00-0000');
			$('#phone').mask('(000) 000-00-00');
		});
	</script>
<script>
	$(document).ready(function(){
			$(".get-match").bind('keyup', function(){
			
		$(this).parent().children('span').html('');
		});
		
		
	$(".get-match").bind('focusout', function(){	
			var name=$(this).attr('name');
			var value=$(this).val();
			var flag=1;
				if(name=='email' && (/^[0-9a-z-\.]+\@[0-9a-z-]{2,}\.[a-z.]{2,}$/i.test(value))==false){
				flag=0;
			}		
			
			if(($(this).val().length)>2 && flag==1){
				
				$.ajax({
					url: "../ajax/getMatchUser.php",
					type: "POST",
					data: {'name':name,
							'value':value},
					success:function(data) {          
						if(data==0){
						$('[name='+name+']').parent().children("span.valid").html("Користувач з таким "+name+" вже існує");
						$('[name='+name+']').parent().children("span.valid").css('color', 'red');
						}else {
							$('[name='+name+']').parent().children("span.valid").html("Цей  "+name+" вільний");
							$('[name='+name+']').parent().children("span.valid").css('color', 'green');
						}
						
					}				
				});
			}
			
			
			});
	
		});
	
	</script>