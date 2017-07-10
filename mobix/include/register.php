<?php
	
	$submit=$_POST['submit']; 
	
	if(isset($submit)) {
	
		$nick = htmlspecialchars(trim($_REQUEST['nick']));
		$email = htmlspecialchars(trim($_REQUEST['email']));
		$pass = htmlspecialchars(trim($_REQUEST['password']), ENT_NOQUOTES, 'cp1251');
		$realname = htmlspecialchars(trim($_REQUEST['realname']), ENT_NOQUOTES, 'cp1251');
		$aboutme = htmlspecialchars(trim($_REQUEST['aboutme']), ENT_NOQUOTES, 'cp1251');
		$public = htmlspecialchars(trim($_REQUEST['public']), ENT_NOQUOTES, 'cp1251');
		$photo = htmlspecialchars($_REQUEST['photo'], ENT_NOQUOTES, 'cp1251');
		$phone = $_REQUEST['phone'];
		$b_date = $_REQUEST['b_date'];
		$city = htmlspecialchars(trim($_REQUEST['city']), ENT_NOQUOTES, 'cp1251');
		$sez = trim($_REQUEST['sez']);
		$datareg = mktime();
		
		$insert_sql = "INSERT INTO users (email, password, nick, aboutme, public, photo, realname, phone, city, birthdate, sez, send_club, send_comments, send_news, send_email, datareg, ischat)" .
		"VALUES('{$email}', '{$pass}', '{$nick}', '{$aboutme}', '{$public}', '{$photo}', '{$realname}', '{$phone}', '{$city}', '{$b_date}', '{$sez}', '', '', '', '', '{$datareg}', '1');";
		
		$result = mysql_query($insert_sql);
		
		if($result == 'true') {
		?>
			 <script>
			 alert('Дякую за регістрацію..');
			 </script>
			 <?php
			header('Location: http://www.poetryclub.com.ua/mobix/index.php');
		}
		else {
		?>
			 <script>
			 alert('Ви не прошли регістрацію..');
			 </script>
			 <?php
			 header('Location: http://www.poetryclub.com.ua/mobix/index.php');
		}
	} 
	
	
	/*
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
							  */
	
	
?>

	<h4><?=$LT[113][$L]?></h4>
	
	<div class="form_logo"><img src="img/small-logo.png" alt="" title="" /></div>
		<div class="loginform">
			<form action="<?=$PHP_SELF?>" id="register" name="frm" method="post" enctype="multipart/form-data">							
				<div class="list-block">
					<ul class="posts">
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry">
							<input type="text" name="nick" value="<?=@$nick?>" maxlength=51 class="form_input required" placeholder="<?=$LT[115][$L]?>" required />
							</div>
							</div>
						</li> 
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry">
							<input type="text" name="email" value="<?=@$email?>" autocomplete="off" class="form_input required" placeholder="email" required />
							</div>
							</div>
						</li>  
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry">
							<input type="password" id="password" name=password value="" autocomplete="off" maxlength="255" class="form_input required" placeholder="<?=$LT[524][$L]?>"  required />
							</div>
							</div>
						</li>  
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry">
							<input type="password" name=rep_password value="" autocomplete="off" maxlength="255" class="form_input required" placeholder="Повторіть пароль" required />
							</div>
							</div>
						</li>  
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry">
							<input type="text" name="realname" value="<?=@$realname?>" autocomplete="off"  class="form_input required" placeholder="<?=$LT[37][$L]?>" />
							</div>
							</div>
						</li>   
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry">
							<input type="text" name=phone id="phone" value="<?=@$phone?>" autocomplete="off"  class="form_input required" placeholder="(0XX) XXX-XX-XX" maxlength="50" />
							</div>
							</div>
						</li>    
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry">
							<input type="text" name=b_date id="b_date" value="<?=@$b_date?>"   class="form_input required" placeholder="дд-мм-pppp" />
							</div>
							</div>
						</li> 	  
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry">
							<input type="text" name="city" id="city" value="<?=@$city?>"   class="form_input required" placeholder="<?=$LT[38][$L]?> (украинською)" required />
							</div>
							</div>
						</li> 	 											
						<li class="swipeout">
							<div class="swipeout-content item-content">
								<div class="post_entry">
									<label><?=$LT[254][$L]?>:</label>
									<br>
									<label class="label-radio item-content" style="width:45%; float: left;">
										<input type="radio" name="sez" value="male" checked="checked">
										<div class="item-inner">
										<div class="item-title">Мужчина</div>
										</div>
									</label>

									<label class="label-radio item-content" style="width:45%; float: left;">
										<input type="radio" name="sez" value="female">
										<div class="item-inner">
										<div class="item-title">Женщина</div>
										</div>
									</label>
								</div>
							</div>
						</li> 	
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry" style="margin-top: 15px;">						
							<label><?=$LT[117][$L]?>:</label>
							<textarea name="public" class="form_textarea" rows="" cols=""><?=@$public?></textarea>						
							</div>
							</div>
						</li> 
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry" style="margin-top: 15px;">						
							<label><?=$LT[118][$L]?>:</label>
							<textarea name="aboutme" class="form_textarea" rows="" cols=""><?=@$aboutme?></textarea>						
							</div>
							</div>
						</li>
						<li class="swipeout">
							<div class="swipeout-content item-content">
							<div class="post_entry" style="margin-top: 15px;">							
							<label><?=$LT[119][$L]?>:</label>						
							<input type="file" name="photo"  class="form_input required" style="width: 86%;" value="<?=$LT[517][$L]?>"/>	
							</div>
							</div>
						</li> 			
						<li class="swipeout">
							<div class="swipeout-content item-content">
								<div class="post_entry" style="margin-top: 15px;">	

									<label><?=$LT[121][$L]?>:</label>						

									<label class="label-checkbox item-content" style="width: 93%;">
										<input type="checkbox" name="send_club" value="1">
										<div class="item-media">
										<i class="icon icon-form-checkbox"></i>
										</div>
										<div class="item-inner">
										<div class="item-title"><?=$LT[122][$L]?></div>
										</div>
									</label>

									<label class="label-checkbox item-content" style="width: 93%;">
										<input type="checkbox" name="send_news" value="1">
										<div class="item-media">
										<i class="icon icon-form-checkbox"></i>
										</div>
										<div class="item-inner">
										<div class="item-title"><?=$LT[123][$L]?></div>
										</div>
									</label>

									<label class="label-checkbox item-content" style="width: 93%;">
										<input type="checkbox" name="send_comments" value="1">
										<div class="item-media">
										<i class="icon icon-form-checkbox"></i>
										</div>
										<div class="item-inner">
										<div class="item-title"><?=$LT[124][$L]?></div>
										</div>
									</label>

									<label class="label-checkbox item-content" style="width: 93%;">
										<input type="checkbox" name="send_email" value="1">
										<div class="item-media">
										<i class="icon icon-form-checkbox"></i>
										</div>
										<div class="item-inner">
										<div class="item-title"><?=$LT[545][$L]?></div>
										</div>
									</label>

								</div>
							</div>
						</li> 

						<li class="swipeout">
							<div class="swipeout-content item-content">
								<div class="post_entry" style="margin-top: 15px;">	

									<label><?=$LT[125][$L]?>&nbsp;<?=$LT[126][$L]?></label>
									<br>
									<label class="label-radio item-content" style="width:45%; float: left;">
										<input type="radio" name="anketa" value="<?=$LT[127][$L]?>">
										<div class="item-inner">
										<div class="item-title"><?=$LT[127][$L]?></div>
										</div>
									</label>

									<label class="label-radio item-content" style="width:45%; float: left;">
										<input type="radio" name="anketa" value="<?=$LT[128][$L]?>">
										<div class="item-inner">
										<div class="item-title"><?=$LT[128][$L]?></div>
										</div>
									</label>

									<label class="label-radio item-content" style="width:45%; float: left;">
										<input type="radio" name="anketa" value="<?=$LT[129][$L]?>">
										<div class="item-inner">
										<div class="item-title"><?=$LT[129][$L]?></div>
										</div>
									</label>

									<label class="label-radio item-content" style="width:45%; float: left;">
										<input type="radio" name="anketa" value="<?=$LT[130][$L]?>">
										<div class="item-inner">
										<div class="item-title"><?=$LT[130][$L]?></div>
										</div>
									</label>

								</div>
							</div>
						</li> 

						<li class="swipeout">
							<div class="swipeout-content item-content">
								<div class="post_entry" style="margin-top: 15px;">	
									<label class="label-checkbox item-content" style="width: 93%;">
										<input type="checkbox" name="agree" value="1" />
										<div class="item-media">
											<i class="icon icon-form-checkbox"></i>
										</div>
										<div class="item-inner">
											<div class="item-title">
												Натискаючи кнопку «<?=$LT[131][$L]?>»,
											</div>
										</div>
									</label>
									<span>я підтверджую, що вказана вище інформація
									є достовірною, а також погоджуюсь з Правилами публікації та користування сайтом</span>
								</div>
							</div>
						</li> 	

					</ul>

				<div class="clear"></div>  
				<div id="loadMore"><i class="fa fa-plus-circle" aria-hidden="true"></i></div> 
				<div id="showLess" class="close_icon"><i class="fa fa-times-circle" aria-hidden="true"></i></div> 
			</div>

			<input type="submit" name="submit" class="form_submit" id="submit" value="<?=$LT[131][$L]?>" />			
			</form>				
		</div>
		
	<div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>


	
	