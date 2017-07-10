<?
include ("../includes.php");

$cnt_poem_all = 50;

if ($id == 86) {Header("Location: /evgen.php"); exit;}
if ($id == 14324) {Header("Location: /dovus.php"); exit;}

$id = (int)$id;

$res_poet=$p->getClubmanInfo($id);


?>
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">
    
     <div class="navbarpages">
       <div class="nav_left_logo"><a href="index.html"><img src="img/small-logo.png" alt="" title="" /></a></div>
       <div class="nav_right_button"><a href="menu.php"><img src="images/icons/white/menu.png" alt="" title="" /></a></div>
     </div>
     <div id="pages_maincontent">
     
              <h2 class="page_title"><?=$LT[39][$L];?></h2> 
     
              <div class="page_content"> 
              
              <blockquote>
              <?=$res_poet['nick'];?>
              </blockquote>
              
              <img src="../<?=$res_poet['photo'];?>" alt="" title="" />
              
			<?
if($res_poet['id']) {

$cnt_tv = $p->getUserPoemsCnt($id);
$cnt_tv_else = $p->getUserPoemsCntElse($id);
$cnt_dn = $p->getCntNotes($res_poet['id'], $user['parent_id'], true);

if ($res_poet['photo'] && file_exists(''.$res_poet['photo'])) {
	$dims=@getImageSize($res_poet['photo']);
	echo "
	<div class=block_tab style='width: ".($dims[0] + 4)."px;position: relative;".(($res_poet['death_date']) ? 'border: 10px solid black;' : '')."'>
	<img src=$res_poet[photo] $dims[3] alt=\"$res_poet[nick]\" border=0 hspace=2 vspace=2>";
	//if ($res_poet['sez'] == 'female' && !$res_poet['death_date']) echo '<img src="/img/gift_8.jpg" id="imggift">';
	//echo '<img src="/img/gift_1.jpg" id="imggift">';
	echo "</div>"; 
}
else 
	echo "";
	//echo "<img src=img/nofoto.gif width=150 height=150 hspace=6 ALT=\"$res_poet[nick]\">";
?>
<div id="nicktitle" class="sez_<?=$res_poet['sez']?>">
<b><?=$res_poet['nick']?></b>
<?if ($res_poet['is_blocked']) {?><img src="/img/ico_alert.gif" alt="banned" width="24" height="24" border="0" align="top"><?}?>
<?if ($res_poet['ischatclose']) {?><img src="/img/nochat.gif" alt="no chat" width="24" height="24" border="0" align="top"><?}?>
</div>
<?
// 86- id Евгения Леонидовича
if ($res_poet['id'] == $user['parent_id']) {?>
<a href="/sender_make.php?idto=86&action=chnick" id="chnick" title="<?=$LT[656][$L]?>"><?=$LT[656][$L]?></a>
&nbsp;&nbsp;&nbsp;
<a href="/sender_make.php?idto=86&action=delnick" id="delnick" title="<?=$LT[657][$L]?>"><?=$LT[657][$L]?></a>
<?}?>
<table border=0 cellspacing=1 cellpadding=2 width="270">
<tr><td nowrap><b>-</b></td><td><?if ($user['isadmin'] && $res_poet['id'] != 4) {?><a href="javascript: GoEdit();void(0);"><?=$LT[658][$L]?></a><?}?></td></tr>
<tr><td nowrap><b>ID</b></td><td id="user_id"><strong><?=$id?></strong></td></tr>
<?if ($user['isadmin'] || $user['parent_id'] == 16461) {?>
<tr><td nowrap><b>Email</b></td><td nowrap><?=$res_poet['email']?></td></tr>
<tr><td nowrap><b><?=$LT[659][$L]?></b></td><td><?=$res_poet['realname']?></td></tr>
<tr><td nowrap><b><?=$LT[38][$L]?></b></td><td nowrap><?=$res_poet['city']?></td></tr>
<tr><td><b><?=$LT[660][$L]?></b></td><td nowrap><?=date("d/m/Y H:i", $res_poet['lastlogin'])?></td></tr>
<?}?>
<tr><td nowrap><b><?=$LT[428][$L]?></b></td><td nowrap><?=date("d/m/Y", $res_poet['datareg'])?></td></tr>
<tr><td nowrap><b><?=$LT[38][$L]?></b></td><td nowrap><?=$res_poet['city']?></td></tr>
<tr><td nowrap><b><?=$LT[255][$L]?></b></td><td nowrap><?=(($res_poet['b_day']) ? sprintf("%02d", $res_poet['b_day']) : '-')?>/<?=(($res_poet['b_month']) ? sprintf("%02d", $res_poet['b_month']) : '-')?>/<?=(($res_poet['b_year']) ? sprintf("%04d", $res_poet['b_year']) : '-')?></td></tr>
<?if ($res_poet['death_date']) {?>
<tr><td nowrap><b><?=$LT[440][$L]?></b></td><td nowrap><?=substr($res_poet['death_date'],8,2)?>/<?=substr($res_poet['death_date'],5,2)?>/<?=substr($res_poet['death_date'],0,4)?></td></tr>
<?}?>
<tr><td nowrap><b><?=$LT[336][$L]?></b></td><td nowrap><strong><?=$cnt_tv?></strong> <?=$LT[337][$L]?></td></tr>
<tr><td nowrap><b><a href="/mycomments.php?userid=<?=$res_poet[id]?>"><?=$LT[256][$L]?></a></b></td><td nowrap><strong><?=$p->getAllMyCommntsCnt($res_poet[id])?></strong> <?=$LT[262][$L]?> <a href="/mycomments.php?userid=<?=$res_poet[id]?>"><?=$LT[261][$L]?></a></td></tr>
<tr><td nowrap><b><a href="/dnevnikview.php?id=<?=$res_poet[id]?>"><?=$LT[257][$L]?></a></b></td><td nowrap><strong><?=$cnt_dn?></strong> <?=$LT[262][$L]?> <a href="/dnevnikview.php?id=<?=$res_poet[id]?>"><?=$LT[261][$L]?></a></td></tr>
<tr><td nowrap><b><a href="/photoalbum_user.php?userid=<?=$res_poet[id]?>"><?=$LT[258][$L]?></a></b></td><td nowrap><strong><?=$p->getPhotoUserCnt($res_poet[id])?></strong> <?=$LT[263][$L]?> <a href="/photoalbum_user.php?userid=<?=$res_poet[id]?>"><?=$LT[261][$L]?></a></td></tr>
<tr><td nowrap><b><a href="/favorite.php?userid=<?=$res_poet[id]?>"><?=$LT[233][$L]?></a></b></td><td nowrap><strong><?=$p->getFavCnt($res_poet[id])?></strong> <?=$LT[262][$L]?> <a href="/favorite.php?userid=<?=$res_poet[id]?>"><?=$LT[261][$L]?></a></td></tr>
<tr><td nowrap><b><a href="/wblist.php?userid=<?=$res_poet[id]?>"><?=$LT[361][$L]?></a></b></td><td nowrap><strong><?=$p->getBWListCnt($res_poet[id], 'black')?>/<?=$p->getBWListCnt2($res_poet[id], 'black')?></strong> <?=$LT[262][$L]?> <a href="/wblist.php?userid=<?=$res_poet[id]?>"><?=$LT[261][$L]?></a></td></tr>
<tr><td nowrap><b><a href="/wblist.php?userid=<?=$res_poet[id]?>"><?=$LT[362][$L]?></a></b></td><td nowrap><strong><?=$p->getBWListCnt($res_poet[id], 'white')?>/<?=$p->getBWListCnt2($res_poet[id], 'white')?></strong> <?=$LT[262][$L]?> <a href="/wblist.php?userid=<?=$res_poet[id]?>"><?=$LT[261][$L]?></a></td></tr>
<tr><td nowrap><b><a href="/mygbook.php?userid=<?=$res_poet[id]?>"><?=(($res_poet['death_date']) ? 'Книга Пам\'яті' : $LT[259][$L])?></a></b></td><td nowrap><strong><?=$p->getGbkCnt($res_poet[id])?></strong> <?=$LT[262][$L]?> <a href="/mygbook.php?userid=<?=$res_poet[id]?>"><?=$LT[261][$L]?></a></td></tr>

<?if ($user['isadmin'] && $res_poet['id'] != 4) {?>
<script>
function GoEdit (orgid) {
	var nick=window.prompt("Введите новый ник");
	if (nick != '' && nick != null && nick != 'undefined') {location.href='/action_for_all.php?nick='+nick+'&auid=<?=$id?>&actionz=chnick';}
}
</script>
<?if (!$res_poet[is_blocked]) {?>
<tr><td colspan="2"><a href="/action_for_all.php?auid=<?=$id?>&actionz=blockuser" onclick='return confirm("<?=$LT[661][$L]?>?")' class="act_admin"><?=$LT[663][$L]?>?</a></td></tr>
<?} else {?>
<tr><td colspan="2"><a href="/action_for_all.php?auid=<?=$id?>&actionz=unblockuser" onclick='return confirm("<?=$LT[662][$L]?>?")' class="act_admin"><?=$LT[664][$L]?>?</a></td></tr>
<?}?>
<?if (!$res_poet[ischatclose]) {?>
<tr><td colspan="2"><a href="/action_for_all.php?auid=<?=$id?>&actionz=blockuserchat" onclick='return confirm("<?=$LT[661][$L]?>?")' class="act_admin"><?=$LT[665][$L]?>?</a></td></tr>
<?} else {?>
<tr><td colspan="2"><a href="/action_for_all.php?auid=<?=$id?>&actionz=unblockuserchat" onclick='return confirm("<?=$LT[662][$L]?>?")' class="act_admin"><?=$LT[666][$L]?>?</a></td></tr>
<?}?>
<tr><td colspan="2"><a href="/action_for_all.php?auid=<?=$id?>&actionz=deluserz" onclick='return confirm("<?=$LT[640][$L]?>?")' class="act_admin"><?=$LT[667][$L]?>?</a></td></tr>
<?}?>
<tr><td>&nbsp;</td>
<td>&nbsp;</td></tr>

<tr>
	<td colspan="2">
        <a href="#inline" id='form_complaint' class="btnExample modalbox"><b>&#9998; Поскаржитись на користувача</b></a>	
	</td>
	</tr>
    <tr><td colspan = "2">
	<?if (is_array($user) && $user[parent_id] != $id) {?>
	<? 
		$ctime = time();
		if ($ctime < ($user['datareg'] + 604800)) {
		} else {
	?>
	
	<a href="javascript: GetChat (<?=$res_poet['id']?>); void(0);" title="<?=$LT[668][$L]?>"><img src="/img/announce.png" width="24" height="24" border="0" align="absmiddle"></a>&nbsp;&nbsp;
		<?}?>
    <!--  Поскаржитись кнопка  -->
	
	<a href="/sender_make.php?action=new&idto=<?=$res_poet['id']?>&nickto=<?=urlencode($res_poet['nick'])?>" title="<?=$LT[391][$L]?>"><img src="/img/ico_mailnew3.gif" alt="<?=$LT[391][$L]?>" width="24" height="24" border="0" align="absmiddle"></a>&nbsp;&nbsp;
	<a href="/dueles_add.php?uid=<?=$res_poet['id']?>&nickto=<?=urlencode($res_poet['nick'])?>" title="<?=$LT[669][$L]?>"><img src="/img/games.gif" alt="<?=$LT[669][$L]?>" width="24" height="24" border="0" align="absmiddle"></a>&nbsp;&nbsp;
	
	<a href="/action_for_all.php?actionz=addwhite&whoid=<?=$id?>" onclick='return confirm("<?=$LT[359][$L]?>")' title="<?=$LT[670][$L]?>"><img border=0 src=/img/bw_list3.gif align=absmiddle width=24 height=24></a>&nbsp;&nbsp;
	
	<a href="/action_for_all.php?actionz=addblack&whoid=<?=$id?>" onclick='return confirm("<?=$LT[359][$L]?>")' title="<?=$LT[671][$L]?>"><img border=0 src=/img/bw_list4.gif align=absmiddle width=24 height=24></a>&nbsp;&nbsp;
	<?}?>
	<!--  ####################################################### my -->
       <!-- Форма для регистрации 	
       <div id="inline">
	      <h2>Вкажіть причину вашої скарги</h2>
	      <form id="contact" name="contact" action="#" method="post">
		    <textarea id="complaint_text" name="msg" class="txtarea">
		      </textarea>
            <button id="send" onclick="SendComplaint();">Надіслати</button>
	      </form>
       </div>
	 КОнец Пожаловаться -->
	</td>
	</tr>
	<!--
			<tr>
			<td colspan="2">
			<a href="/getpoems.php?id=<?=$id?>" title="<?=$LT[672][$L]?> <?=$res_poet['nick']?>"><img src="/img/ico_faq.gif" width="24" height="24" border="0" align="absmiddle"></a>&nbsp;&nbsp;
			
			<a href="/getfav.php?id=<?=$id?>" title="<?=$LT[673][$L]?> <?=$res_poet['nick']?>"><img src="/img/ico_fav.gif" width="24" height="24" border="0" align="absmiddle"></a>
			</td>
		</tr>  
		<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		<tr><td colspan="2">

		</td></tr>
		<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		<?=((trim($res_poet['aboutme'])) ? '<tr><td colspan="2">&nbsp;<br><b>'.$LT[118][$L].':</b><br><br>'.nl2br(str_replace('/', '/ ', $res_poet['aboutme'])).'</td></tr>' : '')?>
		<?=((trim($res_poet['award'])) ? '<tr><td colspan="2"><br><b><a class=blackhr>'.$LT[260][$L].'</a></b><img src="/img/scrolldo.gif" width="9" height="11" border="0" align="absmiddle"><br><br>'.nl2br($res_poet['award']).'</td></tr>' : '')?>
		<tr><td>&nbsp;</td><td>&nbsp;</td>
-->

</tr>
<tr>
	<td colspan="2">		
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Страница автора -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:280px;height:180px"
			 data-ad-client="ca-pub-5357335372099528"
			 data-ad-slot="8918894091"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>


</table>

</td>
<? if($cnt_tv_else) { ?><td width="50%" valign="top">
<? } else 
        { ?><td width="100%" valign="top"><? }
      
if ($res_poet['istsicle']) {
	// TSICLE
	$res_poems = $p->getUserPoems6($res_poet['id']);
	$res_tsicle=$p->getUserTsicle((int)$id);
	if ($res_tsicle) {
		
		while (list($key, $val) = each($res_tsicle)) {
			$res_poem = $res_poems[$key]; $cnt_poem_all = $res_tsicle[$key]['cnt_ctih'];
			if(is_array($res_poem)) { $kl = 0;
				echo "<table border=0 cellspacing=1 cellpadding=0 width=100% class='tab_stih'>";
				echo "<tr><td class='atitle' colspan='7'>".$val[name_catalog]."</td></tr>";
				echo "<tr class=\"aTrH\">
					<td>&nbsp;</td>
					".((is_array($user) && $user[parent_id] != $id) ? "<td>&nbsp;</td>" : "")."
					<td>&nbsp;</td>
					<td>".$LT[91][$L]."</td>
					<td>".$LT[674][$L]."</td>
					<td>".$LT['prosmotr'][$L]."</td>
					<td><img src=img/ico_include3.gif></td>
					<td><img src=\"/img/add-favorite.gif\"></td>
					</tr>";
				foreach ($res_poem as $k =>$v ) { $kl++;
					if ($kl <= $cnt_poem_all) {
						if ($v['whovisited']) {$vis = explode(',', $v['whovisited']); $pr = ((in_array($user[parent_id], $vis)) ? '1' : '0');}
						echo "<tr class='aTr bg_lite'>
							<td class='gLng_".$v['lang']."'>".(($v['lang'] == 'rus') ? 'RU' : 'UA')."</td>
							".((is_array($user) && $user[parent_id] != $id) ? "<td><img src=\"/img/icon".(int)$pr.".gif\" width=12 height=12 border=0 align=absmiddle></td>" : "")."
							<td>".date("d.m.Y", $v[stamp])."</td>
							<td class=\"lf\"><a href=\"/getpoem.php?id=$v[id]\" class=poem10>$v[title]</a></td>
							<td>".(($v['count']) ? round(($v['score'])/($v['count']),1) : '0')." / ".(($v['count2']) ? round(($v['score2'])/($v['count2']),1) : '0')."</td>
							<td>$v[visited] / $v[visited2]</td>";
							
							if ($v['mp3']) {$ext = explode('.', $v['mp3']); $nlast = count($ext) - 1; $ext_file = $ext[$nlast];}
							else $ext_file = '';
							
							if (strtolower($ext_file) == 'txt') 
								{echo '<td align=center><img src="/img/script.gif" alt="'.$v[mp3].'" width="8" height="11" border="0" align="absmiddle"></td>';}
							elseif (strtolower($ext_file) == 'mp3' || strtolower($ext_file) == 'wav' || strtolower($ext_file) == 'wma' || strtolower($ext_file) == 'mid' || strtolower($ext_file) == 'midi') 
								{echo '<td align=center><img src="/img/sound.gif" alt="'.$v[mp3].'" width="10" height="11" border="0" align="absmiddle"></td>';}
							elseif (strtolower($ext_file) == 'jpg' || strtolower($ext_file) == 'jpeg' || strtolower($ext_file) == 'gif') 
								{echo '<td align=center><img src="/img/movie.gif" alt="'.$v[mp3].'" width="13" height="11" border="0" align="absmiddle"></td>';}
							else 
								{echo '<td align=center></td>';} 
							
						echo "
							<td>".(($v[favorite]) ? $v[favorite] : "")."</td></tr>";
					}
					
				}
				if (count($res_poem) > $cnt_poem_all) echo "<tr><td colspan='8' class='TDupload up_noactive' rel='0,".(int)$id.",".$key."'>Догрузити ще ".(count($res_poem) - $cnt_poem_all)." твора(ів)</a></tr>";
				echo "</table><br />";
			}
		}
	}
	
	$res_poem = $res_poems[0];
	if(is_array($res_poem)) { $kl = 0; $cnt_poem_all = 50;
		echo "<table border=0 cellspacing=1 cellpadding=0 width=100% class='tab_stih'>";
		echo "<tr><td class='atitle' colspan='7'>".$LT[425][$L]."</td></tr>";
		echo "<tr class=\"aTrH\">
			<td>&nbsp;</td>
			".((is_array($user) && $user[parent_id] != $id) ? "<td>&nbsp;</td>" : "")."
			<td>&nbsp;</td>    
			<td>".$LT[91][$L]."</td>
			<td>".$LT[674][$L]."</td>
			<td>".$LT['prosmotr'][$L]."</td>
			<td><img src=img/ico_include3.gif></td>
			<td><img src=\"/img/add-favorite.gif\"></td>
			</tr>";
		foreach ($res_poem as $k =>$v ) { $kl++;
			if ($kl <= $cnt_poem_all) {
				if ($v['whovisited']) {$vis = explode(',', $v['whovisited']); $pr = ((in_array($user[parent_id], $vis)) ? '1' : '0');}
				echo "<tr class='aTr bg_lite'>
					<td class='gLng_".$v['lang']."'>".(($v['lang'] == 'rus') ? 'RU' : 'UA')."</td>
					".((is_array($user) && $user[parent_id] != $id) ? "<td><img src=\"/img/icon".(int)$pr.".gif\" width=12 height=12 border=0 align=absmiddle></td>" : "")."
					<td>".date("d.m.Y", $v[stamp])."</td>
					<td class=\"lf\"><a href=\"/getpoem.php?id=$v[id]\" class=poem10>$v[title]</a></td>
					<td>".(($v['count']) ? round(($v['score'])/($v['count']),1) : '0')." / ".(($v['count2']) ? round(($v['score2'])/($v['count2']),1) : '0')."</td>
					<td>$v[visited] / $v[visited2]</td>";  
					
					if ($v['mp3']) {$ext = explode('.', $v['mp3']); $nlast = count($ext) - 1; $ext_file = $ext[$nlast];}
					else $ext_file = '';
					
					if (strtolower($ext_file) == 'txt') 
						{echo '<td align=center><img src="/img/script.gif" alt="'.$v[mp3].'" width="8" height="11" border="0" align="absmiddle"></td>';}
					elseif (strtolower($ext_file) == 'mp3' || strtolower($ext_file) == 'wav' || strtolower($ext_file) == 'wma' || strtolower($ext_file) == 'mid' || strtolower($ext_file) == 'midi') 
						{echo '<td align=center><img src="/img/sound.gif" alt="'.$v[mp3].'" width="10" height="11" border="0" align="absmiddle"></td>';}
					elseif (strtolower($ext_file) == 'jpg' || strtolower($ext_file) == 'jpeg' || strtolower($ext_file) == 'gif') 
						{echo '<td align=center><img src="/img/movie.gif" alt="'.$v[mp3].'" width="13" height="11" border="0" align="absmiddle"></td>';}
					else 
						{echo '<td align=center></td>';}
					
				echo "
					<td align=center>".(($v[favorite]) ? $v[favorite] : "")."</td></tr>";
			}
		}
		
		if (count($res_poem) > $cnt_poem_all) echo "<tr><td colspan='8' class='TDupload up_noactive' rel='0,".(int)$id.",0'>Догрузити ще ".(count($res_poem) - $cnt_poem_all)." твора(ів)</a></tr>";
		echo "</table>";
	}
	
	
	// END TSICLE
}
else {
	// NO TSICLE
	
	if (is_array($typ_stih)) {
		$res_p = $p->getUserPoems4new($res_poet['id']);
        reset($typ_stih);
		while (list($key, $val) = each($typ_stih)) {
			$res_poem = $res_p[$key];
			if(is_array($res_poem)) { $kl = 0;
				echo "<table border=0 cellspacing=1 cellpadding=0 width=100% class='tab_stih'>";
				echo "<tr><td class='atitle' colspan='7'>".$val[$L]."</a></tr>";
			
				echo "<tr class=\"aTrH\">
					<td>&nbsp;</td>
					".((is_array($user) && $user[parent_id] != $id) ? "<td>&nbsp;</td>" : "")."
					<td>&nbsp;</td> 
					<td>".$LT[91][$L]."</td>
					<td>Рейтинг</td>
					<td>".$LT['prosmotr'][$L]."</td>
					<td><img src=\"img/ico_include3.gif\"></td>
					<td><img src=\"/img/add-favorite.gif\"></td>
					</tr>";
				foreach ($res_poem as $k =>$v ) { $kl++;
					if ($kl <= $cnt_poem_all) {
						if ($v['whovisited']) {$vis = explode(',', $v['whovisited']); $pr = ((in_array($user['parent_id'], $vis)) ? '1' : '0');}
						echo "<tr class='aTr bg_lite'>
							<td class='gLng_".$v['lang']."'>".(($v['lang'] == 'rus') ? 'RU' : 'UA')."</td>
							".((is_array($user) && $user['parent_id'] != $id) ? "<td><img src=\"/img/icon".(int)$pr.".gif\" width=12 height=12 border=0 align=absmiddle></td>" : "")."
							<td>".date("d.m.y", $v['stamp'])."</td>
							<td class=\"lf\"><a href=\"/getpoem.php?id=$v[id]\" class=poem10>$v[title]</a></td>
							<td>".(($v['count']) ? round(($v['score'])/($v['count']),1) : '0')." / ".(($v['count2']) ? round(($v['score2'])/($v['count2']),1) : '0')."</td>
							<td>$v[visited] / $v[visited2]</td>";
							
							if ($v['mp3']) {$ext = explode('.', $v['mp3']); $nlast = count($ext) - 1; $ext_file = $ext[$nlast];}
							else $ext_file = '';
							
							if (strtolower($ext_file) == 'txt') 
								{echo '<td><img src="/img/script.gif" alt="'.$v[mp3].'" width="8" height="11" border="0" align="absmiddle"></td>';}
							elseif (strtolower($ext_file) == 'mp3' || strtolower($ext_file) == 'wav' || strtolower($ext_file) == 'wma' || strtolower($ext_file) == 'mid' || strtolower($ext_file) == 'midi') 
								{echo '<td><img src="/img/sound.gif" alt="'.$v[mp3].'" width="10" height="11" border="0" align="absmiddle"></td>';}
							elseif (strtolower($ext_file) == 'jpg' || strtolower($ext_file) == 'jpeg' || strtolower($ext_file) == 'gif') 
								{echo '<td><img src="/img/movie.gif" alt="'.$v[mp3].'" width="13" height="11" border="0" align="absmiddle"></td>';}
							else 
								{echo '<td></td>';}
							
						echo "
							<td>".(($v[favorite]) ? $v[favorite] : "")."</td></tr>";
					}
				
				}
				if (count($res_poem) > $cnt_poem_all) echo "<tr><td colspan='8' class='TDupload up_noactive' rel='1,".(int)$id.",".$key."'>Догрузити ще ".(count($res_poem) - $cnt_poem_all)." твора(ів)</a></tr>";
				
				echo '</table><br />';
			}
			//else echo "<tr><td colspan='7' align='center'>".$LT[150][$L]."</td></tr>";
			
		}
	}
	// END NO TSICLE
}

?>

<?
} else echo '

    
              <blockquote>
              '.$LT[153][$L].'
              </blockquote>


';
?>
	
              
          

              
              
              </div>
      
      </div>
      
      
    </div>
  </div>
</div>