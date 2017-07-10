<div class="statusbar-overlay"></div>
<div class="panel-overlay"></div>
<?php if ($user):?>
    <!-- LEFT -->
    <div class="panel panel-left panel-cover">
        <div class="user_login_info">
            <div class="user_thumb">
                <?php if(empty($user->photo)): ?>
                    <img src="/mobile/img/author_<?=$user['sez']?>.jpg" alt="" height="" width="100%" title=""/>
                <?php elseif($user->photo): ?>
                    <img src="http://poetryclub.com.ua/<?=$user['photo']?>" alt="" height="" width="100%" title=""/>
                <?php endif; ?>
                <div class="user_details">
                    <p>Ласкаво просимо, <span><?=$user->nick?></span></p>
                </div>
                <div class="user_social">
                    <form action="main/logout" method="post">
                        <button type="submit" class="btn_exit"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 35px;"></i></button>
                    </form>
                </div>
            </div>

            <nav class="user-nav">
                <ul>
                    <li><a href="author/index" class="close-panel"><i class="fa fa-home" aria-hidden="true"></i><p>Додому</p></a></li>

                    <li><a href="favorite/index" class="close-panel"><i class="fa fa-gratipay" aria-hidden="true"></i><p>Обране</p></a></li>

                    <li><a href="profile/index" class="close-panel"><i class="fa fa-pencil-square" aria-hidden="true"></i><p>Редагувати профайл</p></a></li>
<!--
                    <li><a href="sender.php?folder=outcomming" class="close-panel"><i class="fa fa-share" aria-hidden="true"></i><p>390</p></a></li>

                    <li><a href="sender_make.php?action=new" class="close-panel"><i class="fa fa-envelope" aria-hidden="true"></i><p>391</p></a></li>


                    <hr style="background: #932b40; border: 1px solid #8d291d;">
-->
                    <!-- menu -->
<!--
                    <li><a href="usrpoemsadm.php" class="close-panel"><i class="fa fa-plus-square" aria-hidden="true"></i><p>41</p></a></li>

                    <li><a href="login.php" class="close-panel"><i class="fa fa-newspaper-o" aria-hidden="true"></i><p>42</p></a></li>

                    <li><a href="usrcomments.php" class="close-panel"><i class="fa fa-commenting" aria-hidden="true"></i><p>43</p></a></li>

                    <li><a href="mycomments.php" class="close-panel"><i class="fa fa-comments" aria-hidden="true"></i><p>234</p></a></li>

                    <li><a href="dnevnikview.php?id=parent_id" class="close-panel"><i class="fa fa-book" aria-hidden="true"></i><p>190</p></a></li>

                    <li><a href="dadmin.php" class="close-panel"><i class="fa fa-address-book" aria-hidden="true"></i><p>191</p></a></li>

                    <li><a href="photoalbum_user.php?userid=parent_id" class="close-panel"><i class="fa fa-camera" aria-hidden="true"></i><p>235</p></a></li>

                    <li><a href="photoalbum_edit.php" class="close-panel"><i class="fa fa-picture-o" aria-hidden="true"></i><p>236</p></a></li>

                    <li><a href="wblist.php" class="close-panel"><i class="fa fa-black-tie" aria-hidden="true"></i><p>363</p></a></li>
-->
                </ul>
            </nav>


        </div>
    </div>
<?php endif;?>

<div class="views">
    <div class="view view-main">
        <div class="pages  toolbar-through">
            <div data-page="index" class="page homepage">
                <div class="page-content">
                    <!-- Slider -->
                    <div class="swiper-container swiper-init" data-effect="slide" data-direction="horizontal" data-pagination=".swiper-pagination">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/mobile/img/logo.png" alt="" title="" style="margin-top:20%;width:200px;">
                                <br />
                                <?php if(isset($_SESSION['error_us_pass'])): ?>
                                <a class="swiper_read_more"><?=$_SESSION['error_us_pass'];?></a>
                                <?php elseif(isset($_SESSION['error_us_name'])): ?>
                                    <a class="swiper_read_more"><?=$_SESSION['error_us_name'];?></a>
                                <?php endif; ?>
                            </div>
                            <!-- TWO SWIPE-SLIDER -->
                            <div class="swiper-slide swiper-slide-two" style="background: #fff;">
                                <div id="pages_maincontent">

                                    <h2 class="page_title"></h2>

                                    <div class="page_content">

                                        <blockquote>

                                        </blockquote>

                                    </div>

                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/mobile/img/logo.png" alt="" title="" style="margin-top:20%;width:200px;">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Toolbar-->
        <div class="toolbar">
            <div class="toolbar-inner">
                <ul class="toolbar_icons">
                    <?php if ($user):?>
                    <li><a href="#" data-panel="left" class="open-panel"><img src="/mobile/img/icons/white/user.png" alt="" title="" /> </a></li>
                    <?php elseif(!$user):?>
                    <li><a href="#" data-popup=".popup-login" class="open-popup"><img src="/mobile/img/icons/white/user.png" alt="" title="" /></a></li>
                    <?php endif;?>
                    <li>
                        <a href="#">
                            <img src="/mobile/img/icons/white/photos.png" alt="" title="" />
                        </a>
                    </li>
                    <li class="menuicon">
                        <a href="#">
                            <img src="/mobile/img/icons/white/menu.png" alt="" title="" />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/mobile/img/icons/white/blog.png" alt="" title="" />
                        </a>
                    </li>
                    <li>
                        <a href="#" data-panel="right" class="open-panel">
                            <img src="/mobile/img/icons/white/contact.png" alt="" title="" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<!-- Login Popup -->
<div class="popup popup-login">
    <div class="content-block-login">
        <h4>Вхід для членів клубу</h4>

        <div class="form_logo"><img src="/mobile/img/small-logo.png" alt="" title="" /></div>
        <div class="loginform">

            <form id="singinform" method="post" action="/main/singin">
                <input type="text" name="email" value="" class="form_input required" placeholder="e-mail"/>
                <input type="password" name="password" value="" class="form_input required" placeholder="пароль"/>
                <div class="forgot_pass"><a href="#" data-popup=".popup-forgot" class="open-popup">забули пароль?</a></div>
                <input type="submit" name="do_singin" class="form_submit" id="submit" value="УВІЙТИ" />
            </form>
            <div class="signup_bottom">
                <p>ласкаво просимо до нашого клубу!</p>
                <a href="#" data-popup=".popup-signup" class="open-popup">Реєстрaція</a>
            </div>
        </div>
    </div>
    <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="/mobile/img/icons/white/menu_close.png" alt="" title="" /></a></div>
</div>

<!-- Register Popup -->
<div class="popup popup-signup">
    <div class="content-block-login">
        <h4>Реєстрація</h4>
        <div class="form_logo"><img src="/mobile/img/small-logo.png" alt="" title="" /></div>
        <div class="loginform">
            <form action="/main/singup" method="POST" id="register" enctype="multipart/form-data">
                <div class="list-block">
                    <ul class="posts">
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry">
                                    <input type="text" name="nick" value="" maxlength=51
                                           class="form_input required" placeholder="Псевдонім"/>
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry">
                                    <input type="text" name="email" value="" autocomplete="off"
                                           class="form_input required" placeholder="email" />
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry">
                                    <input type="password" id="password" name="password" value="" autocomplete="off"
                                           maxlength="255" class="form_input required" placeholder="Пароль"
                                    />
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry">
                                    <input type="password" name="rep_password" value="" autocomplete="off" maxlength="255"
                                           class="form_input required" placeholder="Повторіть пароль" />
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry">
                                    <input type="text" name="realname" value="" autocomplete="off"
                                           class="form_input required" placeholder="ПІБ"/>
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry">
                                    <input type="text" name="phone" id="phone" value="" autocomplete="off"
                                           class="form_input required" placeholder="(000) 000-00-00"/>
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry">
                                    <input type="text" name="b_date" id="b_date" value=""
                                           class="form_input required" placeholder="дд-мм-рррр"/>
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry">
                                    <input type="text" name="city" id="city" value=""
                                           class="form_input required" placeholder="Місто (українською)"
                                    />
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry">
                                    <label>Стать:</label>
                                    <br>
                                    <label class="label-radio item-content" style="width:45%; float: left;">
                                        <input type="radio" name="sez" value="male" checked="checked">
                                        <div class="item-inner">
                                            <div class="item-title">Чоловiча</div>
                                        </div>
                                    </label>

                                    <label class="label-radio item-content" style="width:45%; float: left;">
                                        <input type="radio" name="sez" value="female">
                                        <div class="item-inner">
                                            <div class="item-title">Жіноча</div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry" style="margin-top: 15px;">
                                    <label>Чи публікувалися десь? :</label>
                                    <textarea name="public" class="form_textarea" rows="" cols=""></textarea>
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry" style="margin-top: 15px;">
                                    <label>Про себе:</label>
                                    <textarea name="aboutme" class="form_textarea" rows="" cols=""></textarea>
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry" style="margin-top: 15px;">
                                    <label>Фото (тільки JPG):</label>
                                    <input type="file" name="photo"  class="form_input required" style="width: 86%;" value=""/>
                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry" style="margin-top: 15px;">

                                    <label>Додаткові можливості:</label>

                                    <label class="label-checkbox item-content" style="width: 93%;font-size:14px;">
                                        <input type="checkbox" name="send_club" value=''>
                                        <div class="item-media">
                                            <i class="icon icon-form-checkbox"></i>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title">Отримувати вірші членів клубу</div>
                                        </div>
                                    </label>

                                    <label class="label-checkbox item-content" style="width: 93%;font-size:14px;">
                                        <input type="checkbox" name="send_news" value=''>
                                        <div class="item-media">
                                            <i class="icon icon-form-checkbox"></i>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title">Отримувати новини</div>
                                        </div>
                                    </label>

                                    <label class="label-checkbox item-content" style="width: 93%;font-size:14px;">
                                        <input type="checkbox" name="send_comments" value=''>
                                        <div class="item-media">
                                            <i class="icon icon-form-checkbox"></i>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title">Отримувати коментарі щодо своїх віршів</div>
                                        </div>
                                    </label>

                                    <label class="label-checkbox item-content" style="width: 93%;font-size:14px;">
                                        <input type="checkbox" name="send_email" value=''>
                                        <div class="item-media">
                                            <i class="icon icon-form-checkbox"></i>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-title">Надсилати сповіщення на e-mail</div>
                                        </div>
                                    </label>

                                </div>
                            </div>
                        </li>
                        <li class="swipeout">
                            <div class="swipeout-content item-content">
                                <div class="post_entry" style="margin-top: 15px;">

                                    <label>Звідки ви дізналися про сайт?</label>
                                    <br>
                                    <label class="label-radio item-content" style="width: 93%;font-size:14px;">
                                        <input type="radio" name="anketa" value="З Інтернету">
                                        <div class="item-inner">
                                            <div class="item-title">З Інтернету</div>
                                        </div>
                                    </label>

                                    <label class="label-radio item-content" style="width: 93%;font-size:14px;">
                                        <input type="radio" name="anketa" value="Від друзів">
                                        <div class="item-inner">
                                            <div class="item-title">Від друзів</div>
                                        </div>
                                    </label>

                                    <label class="label-radio item-content" style="width: 93%;font-size:14px;">
                                        <input type="radio" name="anketa" value="З книг">
                                        <div class="item-inner">
                                            <div class="item-title">З книг</div>
                                        </div>
                                    </label>

                                    <label class="label-radio item-content" style="width: 93%;font-size:14px;">
                                        <input type="radio" name="anketa" value="З реклами">
                                        <div class="item-inner">
                                            <div class="item-title">З реклами</div>
                                        </div>
                                    </label>

                                </div>
                            </div>
                        </li>	
						<style>
							.agree_site{
								width: 22px;
								height: 22px;
								position: relative;
								border-radius: 22px;
								border: 1px solid #c7c7cc;
								box-sizing: border-box;
							}
							#agree-error{
							    display: block;
								position: absolute;
								top: 30px;
								left: 48px;
							}
						
						</style>
						<li class="swipeout">
							<div class="swipeout-content item-content">
								<div class="post_entry" style="">
									<div class="item-inner">
										<input class="agree_site" type="checkbox" name="agree" value='1'>
										<label class="item-title">Погоджуюсь з правилами сайтом..</label>
									</div>
									<br>
								</div>
							</div>
						</li>	
						
                    </ul>
                    <div class="clear"></div>
                    <div id="loadMore"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                    <div id="showLess" class="close_icon"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
                </div>

                <input type="submit" name="do_singup" class="form_submit" id="do_singup" value="НАДІСЛАТИ" />
            </form>
        </div>
        <div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="/mobile/img/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
</div>
<script>
$(".posts li").hide();	
		size_li = $(".posts li").size();
		x=4;
		$('.posts li:lt('+x+')').show();
		$('#loadMore').click(function () {
			x= (x+3 <= size_li) ? x+3 : size_li;
			$('.posts li:lt('+x+')').show();
			if(x == size_li){
				$('#loadMore').hide();
				$('#showLess').show();
			}
		});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"></script>
<script>
    $().ready(function() {
        $.validator.methods.email = function( value, element ) {
            //	console.log(element);
            return this.optional( element ) || /^[0-9a-z-\.]+\@[0-9a-z-]{2,}\.[a-z.]{2,}$/i.test( value );
        }

        $("#singinform").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                email: {
                    required: "Будь ласка, вкажіть Ваш email",
                    email: "Невірний формат email"
                },
                password: {
                    required: "Будь ласка, заповніть поле 'Пароль'",
                    minlength: "Мінімальний розмір - 6 символи"
                }
            }
        });
    });
</script>
<script>
    $().ready(function() {
        $.validator.methods.email = function( value, element ) {
            //	console.log(element);
            return this.optional( element ) || /^[0-9a-z-\.]+\@[0-9a-z-]{2,}\.[a-z.]{2,}$/i.test( value );
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
                    minlength: 10
                },
                city: {
                    required: true
                },
                photo: {
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
                    minlength: "Ви невірно ввели дату народження",
                },
                city: {
                    required: "Будь ласка, вкажіть місце Вашого проживання"
                },
                photo: {
                    required: "Будь ласка, загрузiть Фото"
                },
                agree: {
                    required: "Будь ласка, погодтесь з правилами сайтом"
                }
            }
        });
    });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#b_date').mask('00-00-0000');
        $('#phone').mask('(000) 000-00-00');
    });
</script>