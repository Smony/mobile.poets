<?php if(is_array($user)) {?>
	<!-- LEFT -->
    <div class="panel panel-left panel-cover">
          <div class="user_login_info">
            <div class="user_thumb">
            <img src="../img/author_<?=$user['sez']?>.gif" alt="" title="" width="140" height="120"/>
              <div class="user_details">
               <p>Ћаскаво просимо, <span><?=$user['nick']?></span></p>
              </div> 				  
              <div class="user_social">
				  <form action="/logout.php" method="post">
					<button type="submit" class="btn_exit"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 35px;"></i></button>
				</form>
            </div>       
            </div>
	
                  <nav class="user-nav">
                    <ul>
                      <li><a href="author.php?id=<?=$user['parent_id']?>" class="close-panel"><i class="fa fa-home" aria-hidden="true"></i><p><?=$LT[39][$L];?></p></a></li>
					  
                      <li><a href="favorite.php" class="close-panel"><i class="fa fa-gratipay" aria-hidden="true"></i><p><?=$LT[233][$L];?></p></a></li>
					  
                      <li><a href="profile.php" class="close-panel"><i class="fa fa-pencil-square" aria-hidden="true"></i><p><?=$LT[40][$L];?></p></a></li>
					  
					  
					  
				  <?
					if (!isset($send)) $send = New Sender; $alert = New Alert;
					$noread = $send->LetterNoRead ($user[parent_id]); $noread_alert = $alert->AlertNoRead ($user[parent_id]); 
					if ($noread_alert) {
					?>
						<img src="/img/!.gif" alt="" width="12" height="13" border="0" align="absmiddle"> <a href="/alert.php"><strong style="color:#dc143c;"><?=$noread_alert?> <?=$LT[898][$L]?></strong></a><br><br>
					<?
					}
					if ($noread) {
					?>	
						<li><a href="sender.php?folder=incomming" class="close-panel"><i class="fa fa-reply" aria-hidden="true"></i><p><?=$LT[389][$L];?></p><strong class="green"><?=$noread?></strong></a></li>
					
					<?} else {?>				
						<li><a href="sender.php?folder=incomming" class="close-panel"><i class="fa fa-reply" aria-hidden="true"></i><p><?=$LT[389][$L];?></p></a></li>
					<?}?>
				  
                      <li><a href="sender.php?folder=outcomming" class="close-panel"><i class="fa fa-share" aria-hidden="true"></i><p><?=$LT[390][$L];?></p></a></li>
					  
                      <li><a href="sender_make.php?action=new" class="close-panel"><i class="fa fa-envelope" aria-hidden="true"></i><p><?=$LT[391][$L];?></p></a></li>
				  
				  
					 <hr style="background: #932b40; border: 1px solid #8d291d;">
				  
					  <!-- menu -->	
					  <li><a href="usrpoemsadm.php" class="close-panel"><i class="fa fa-plus-square" aria-hidden="true"></i><p><?=$LT[41][$L];?></p></a></li>
					  
					  <li><a href="login.php" class="close-panel"><i class="fa fa-newspaper-o" aria-hidden="true"></i><p><?=$LT[42][$L];?></p></a></li>
					  
					  <li><a href="usrcomments.php" class="close-panel"><i class="fa fa-commenting" aria-hidden="true"></i><p><?=$LT[43][$L];?></p></a></li>
					  
					  <li><a href="mycomments.php" class="close-panel"><i class="fa fa-comments" aria-hidden="true"></i><p><?=$LT[234][$L];?></p></a></li>
					   
					  <li><a href="dnevnikview.php?id=<?=$user['parent_id']?>" class="close-panel"><i class="fa fa-book" aria-hidden="true"></i><p><?=$LT[190][$L];?></p></a></li>
					  
					  <li><a href="dadmin.php" class="close-panel"><i class="fa fa-address-book" aria-hidden="true"></i><p><?=$LT[191][$L];?></p></a></li>
					  
					  <li><a href="photoalbum_user.php?userid=<?=$user['parent_id']?>" class="close-panel"><i class="fa fa-camera" aria-hidden="true"></i><p><?=$LT[235][$L];?></p></a></li>
					  
					  <li><a href="photoalbum_edit.php" class="close-panel"><i class="fa fa-picture-o" aria-hidden="true"></i><p><?=$LT[236][$L];?></p></a></li>
					  
					  <li><a href="wblist.php" class="close-panel"><i class="fa fa-black-tie" aria-hidden="true"></i><p><?=$LT[363][$L];?></p></a></li>
					  
                    </ul>
                  </nav>
	
				  			  
          </div>
    </div>
	<?php }?>