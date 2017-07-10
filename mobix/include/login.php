<?php 



if(is_array($user)) {

if ($sr == 'conf') $sortby = 'confirmed';
elseif ($sr == 'title') $sortby = 'title';
elseif ($sr == 'tsicle') $sortby = 'tsicle';
else  $sortby = 'id';

if (!$srd) $srd = 'up';

echo "<BR><h4 align=\"center\">".$LT[77][$L]." $user[nick] !</h4>

<br/>

";

if(isset($del) && $del!='') {
	$p->delUserPoem($del,$user[parent_id]); 
	$p->ClearTmp();
}

$lim = 30;//paging limit;
$col_page = 10;
if(!$pg) $pg = 1;
$page = ($pg - 1) * $lim;
$r_lim = $lim * ($page - 1);

$all_page=$p->getUserPoemsCnt_all($user['parent_id']);

$page_real = ceil($all_page / $lim);

$row_from = (floor($page / $lim / $col_page)) * ($col_page * $lim);
$row_to = (ceil($page / $lim / $col_page)) * ($col_page * $lim); 

if ($row_to == $row_from) $row_to = $row_from + $col_page * $lim;

$content .= '
<TABLE><TR><TD CLASS="title">'.$LT[334][$L].' ('.$page_real.'/произв.'.$all_page.'):</SPAN>&nbsp;&nbsp;<TD><a CLASS="pag" href="?id='.$id.'&pg='.((($row_from - $lim) < 0 ) ? 1 : $row_from / $lim).'&sr='.$sr.'&srd='.$srd.'">&laquo;</a></TD><TD>';
	for ($m = $row_from; (($m < $row_to) && ($m<=$all_page-1 )) ; $m += $lim ) {
		$content .= ' '.(($page == $m) ? '<font style="color: #000000; font-weight:bold;font-size:12px">'.($m/$lim+1).'</font>' : '<a CLASS="pag" href="?pg='.($m/$lim+1).'&sr='.$sr.'&srd='.$srd.'">'.($m/$lim+1).'</a> ');
	}
$content .= '</TD><TD><a CLASS="pag" href="?pg='.((($row_to + $lim) > $all_page ) ? floor($all_page / $lim) + 1 : ($row_to / $lim + 1)).'&sr='.$sr.'&srd='.$srd.'">&raquo;</a></TD></TR></TABLE><BR>';

$res=$p->getUserPoemsZ_all($user['parent_id'], '', (($pg-1)*$lim), $lim, $sortby, (($srd == 'up') ? 'DESC' : 'ASC'));

$res_tsicle=$p->getUserTsicle($user['parent_id']);

if(count($res))
{

echo "<center><a class=black>".$LT[78][$L]." </a><br><br><img border=0 src=img/0.gif> - ".$LT[79][$L]."   <img border=0 src=img/1.gif> - ".$LT[80][$L]." &nbsp;&nbsp; <img border=0 align=absmiddle src=img/edit.gif width=15 height=16> <a href=\"usrpoemsadm.php\">".$LT[85][$L]."</a> &nbsp;&nbsp; <img border=0 align=absmiddle src=img/aag1.gif width=13 height=13> <a href=\"tsicle.php\">".$LT[423][$L]."</a>  <br><br> </center>";
echo (($page_real > 0) ? $content : '');
echo '<table border=0 cellpadding=3 cellspacing=1 width=95% CLASS=block_tab><tr>';
echo '<td nowrap align=center CLASS=block_h><a href="?pg='.$pg.'&sr=conf&srd=up"><img src="/img/arrow2.gif" width="11" height="11" border="0" align="abstop"></a> <a href="?pg='.$pg.'&sr=conf&srd=down"><img src="/img/arrow3.gif" width="11" height="11" border="0" align="abstop"></a></td>';
echo '<td nowrap align=center CLASS=block_h><STRONG>'.$LT[420][$L].'</STRONG> <a href="?pg='.$pg.'&sr=date&srd=up"><img src="/img/arrow2.gif" width="11" height="11" border="0" align="abstop"></a> <a href="?pg='.$pg.'&sr=date&srd=down"><img src="/img/arrow3.gif" width="11" height="11" border="0" align="abstop"></a></td>';
echo '<td nowrap align=center CLASS=block_h><STRONG>'.$LT[421][$L].'</STRONG> <a href="?pg='.$pg.'&sr=tsicle&srd=up"><img src="/img/arrow2.gif" width="11" height="11" border="0" align="abstop"></a> <a href="?pg='.$pg.'&sr=tsicle&srd=down"><img src="/img/arrow3.gif" width="11" height="11" border="0" align="abstop"></a></td>';
echo '<td nowrap align=center CLASS=block_h><STRONG>'.$LT[81][$L].'</STRONG>  <a href="?pg='.$pg.'&sr=title&srd=up"><img src="/img/arrow2.gif" width="11" height="11" border="0" align="abstop"></a> <a href="?pg='.$pg.'&sr=title&srd=down"><img src="/img/arrow3.gif" width="11" height="11" border="0" align="abstop"></a></td>';
echo '<TD CLASS=block_h>&nbsp;</TD>';
echo '<td align=center CLASS=block_h><STRONG>'.$LT[83][$L].'</STRONG></td>';
echo '</tr>';

foreach($res as $k => $v) { $ie++;
	echo '<tr bgcolor='.(($ie%2) ? '#FBE9DD':'#FFFAFA').' onMouseOut="this.style.backgroundColor=\''.(($ie%2) ? '#FBE9DD':'#FFFAFA').'\'" onMouseOver="this.style.backgroundColor=\'#F4A460\'">';
	echo '<td>&nbsp;<img border="0" src="/img/'.$v[confirmed].'.gif" width="13" height="12" ALIGN="absmiddle">&nbsp;</TD>';
	echo '<TD NOWRAP>&nbsp;'.date("d.m.Y H:i", $v[stamp]).'&nbsp;</TD>';
	echo '<TD>'.(($res_tsicle[$v[tsicle]][name_catalog]) ? $res_tsicle[$v[tsicle]][name_catalog] : '-').'</TD>';
	echo '<TD><a href="usrpoemsadm.php?id='.$v[id].'">'.$v[title].'</td>';
	
	if ($v['mp3']) {$ext = explode('.', $v['mp3']); $nlast = count($ext) - 1; $ext_file = $ext[$nlast];}
	else $ext_file = '';
	
	if (strtolower($ext_file) == 'txt') 
		{echo '<TD ALIGN=center nowrap><IMG SRC="/img/script.gif" ALT="'.$v[mp3].'" WIDTH="8" HEIGHT="11" BORDER="0" ALIGN="absmiddle"></TD>';}
	elseif (strtolower($ext_file) == 'mp3' || strtolower($ext_file) == 'wav' || strtolower($ext_file) == 'wma') 
		{echo '<TD ALIGN=center nowrap><IMG SRC="/img/sound.gif" ALT="'.$v[mp3].'" WIDTH="10" HEIGHT="11" BORDER="0" ALIGN="abstop">&nbsp;'.$LT[805][$L].'</TD>';}
	elseif (strtolower($ext_file) == 'jpg' || strtolower($ext_file) == 'jpeg' || strtolower($ext_file) == 'gif') 
		{echo '<TD ALIGN=center nowrap><IMG SRC="/img/movie.gif" ALT="'.$v[mp3].'" WIDTH="13" HEIGHT="11" BORDER="0" ALIGN="absmiddle"></TD>';}
	elseif ($v['video']) 
		{echo '<TD ALIGN=center nowrap><IMG SRC="/img/movie.gif"  WIDTH="13" HEIGHT="11" BORDER="0" ALIGN="absbottom"> '.$LT[809][$L].'</TD>';}
	else 
		{echo '<TD ALIGN=center></TD>';}
	
	//echo '<TD ALIGN=center WIDTH=16>'.(($v[mp3]) ? '<IMG SRC="/img/ico_include.gif" ALT="'.$v[mp3].'" WIDTH="12" HEIGHT="12" BORDER="0">' : '').'</TD>';
	
	
	echo '<td width="280" align=center NOWRAP>';
		echo '<a href="usrpoemsadm.php?id='.$v[id].'">'.$LT[248][$L].' <img border="0" align="absmiddle" src="/img/edit.gif" width="15" height="16"></a>&nbsp;&nbsp;';
		echo '<a href="getpoem.php?id='.$v[id].'">'.$LT[249][$L].' <img border="0" align="absmiddle" src="/img/feath.gif" width="14" height="14"></a>&nbsp;&nbsp;';
		echo '<a href="'.$PHP_SELF.'?del='.$v[id].'&pg='.$pg.'&sr='.$sr.'&srd='.$srd.'" onclick=\'return confirm("'.$LT[640][$L].'?")\'>'.$LT[84][$L].' <img border="0" align="absmiddle" src="/img/trash.gif" width="15" height="16"></a>';
	echo '</td>';
	echo '</tr>';
}

echo "</table>";
echo (($page_real > 0) ? $content : '');
echo "<center><a class=black>".$LT[78][$L]." </a><br><br><img border=0 src=img/0.gif> - ".$LT[79][$L]."   <img border=0 src=img/1.gif> - ".$LT[80][$L]." &nbsp;&nbsp; <img border=0 align=absmiddle src=img/edit.gif width=15 height=16> <a href=\"usrpoemsadm.php\">".$LT[85][$L]."</a> &nbsp;&nbsp; <img border=0 align=absmiddle src=img/aag1.gif width=13 height=13> <a href=\"tsicle.php\">".$LT[423][$L]."</a>  <br><br> </center>";

}


}
else
{


  ?>
 
 <!-- Login Popup -->
    <div class="popup popup-login">
    <div class="content-block-login">
	 
	
      <h4>¬х≥д дл€ член≥в клубу</h4>
      <div class="form_logo"><img src="img/small-logo.png" alt="" title="" /></div>
            <div class="loginform">
            <form id="LoginForm" method="post" action="<?=$PHP_SELF?>">
            <input type="text" name="email" value="" class="form_input required" placeholder="e-mail"  autocomplete="off"/>
            <input type="password" name="password" value="" class="form_input required" placeholder="<?=$LT[369][$L]?>" autocomplete="off" />
            <div class="forgot_pass"><a href="#" data-popup=".popup-forgot" class="open-popup"><?=$LT[87][$L];?></a></div>
			
			<label class="label-checkbox item-content">
                    <!-- Checked by default -->
                    <input type="checkbox" name="is_anonimous" id="is_anonimous" value="1">
                    <div class="item-media">
                      <i class="icon icon-form-checkbox"></i>
                    </div>
                    <div class="item-inner">
                      <div class="item-title"><?=$LT[246][$L];?></div>
                    </div>
		    </label>
			
			<input type=hidden name=url value="<?=$curl?>" >
			
            <input type="submit" name="do" class="form_submit" id="submit" value="<?=$LT[48][$L];?>" />
            </form>
            <div class="signup_bottom">
            <p>ласкаво просимо до нашого клубу!</p>
            <a href="#" data-popup=".popup-signup" class="open-popup"><?=$LT[16][$L];?></a>            
			</div>
			</div>
            </div>
      <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
    
<?
      }
?>

	</div>
	</div>