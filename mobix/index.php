<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="apple-touch-startup-image-640x1096.png">
<title>titile</title>
<link rel="stylesheet" href="css/framework7.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/colors/red.css">
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
<link type="text/css" rel="stylesheet" href="css/animations.css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/myScripts.js"></script>

</head>
<body id="mobile_wrap">

    <div class="statusbar-overlay"></div>

    <div class="panel-overlay"></div>

 <div class="panel panel-left panel-cover">
          <div class="user_login_info">
                <div class="user_thumb">
                <img src="images/profile.jpg" alt="" title="" />
                  <div class="user_details">
                   <p>Hi, <span>John Doe</span></p>
                  </div>  
                  <div class="user_social">
                  <a href="#" data-popup=".popup-social" class="open-popup"><img src="images/icons/white/twitter.png" alt="" title="" /></a>              </div>       
                </div>

                  <nav class="user-nav">
                    <ul>
                      <li><a href="features.html" class="close-panel"><img src="images/icons/white/settings.png" alt="" title="" /><span>Settings</span></a></li>
                      <li><a href="features.html" class="close-panel"><img src="images/icons/white/briefcase.png" alt="" title="" /><span>Account</span></a></li>
                      <li><a href="features.html" class="close-panel"><img src="images/icons/white/message.png" alt="" title="" /><span>Messages</span><strong class="green">12</strong></a></li>
                      <li><a href="features.html" class="close-panel"><img src="images/icons/white/download.png" alt="" title="" /><span>Downloads</span><strong class="blue">5</strong></a></li>
                      <li><a href="index.html" class="close-panel"><img src="images/icons/white/lock.png" alt="" title="" /><span>Logout</span></a></li>
                    </ul>
                  </nav>
          </div>
    </div>

	<!-- RIGHT -->
    <div class="panel panel-right panel-cover"> 
	
        <h2>RIGHT block</h2>
		
        <div class="search_form">
			<form id="SearchForm" method="post">
				<input type="text" name="keyword" value="" class="search_input" placeholder="keyword" />
				<input type="image" name="submit" class="search_submit" id="submit" src="images/icons/white/search.png" />
			</form>
        </div>
		
        <div class="clear"></div>
		
        <h3>POPULAR POSTS</h3>
		
        <ul class="popular_posts">
			<li>
				<a href="blog-single.html" class="close-panel"><img src="images/photos/photo1.jpg" alt="" title="" /></a>
				<span><a href="blog-single.html" class="close-panel">Design is not just what it looks like and feels like.</a></span>        
			</li>       
        </ul>
    </div>

    <div class="views">

      <div class="view view-main">

        <div class="pages  toolbar-through">

          <div data-page="index" class="page homepage">
            <div class="page-content">
            
					
                  <!-- Slider -->
                  <div class="swiper-container swiper-init" data-effect="slide" data-direction="horizontal" data-pagination=".swiper-pagination">
                    <div class="swiper-wrapper">
                    
                      <div class="swiper-slide">
					  
						  <img src="img/logo.png" alt="" title="" style="margin-top:20%;width:200px;">  
							<br />						  
                                                </div>
					  <!-- TWO SWIPE-SLIDER -->
					  <div class="swiper-slide swiper-slide-two" style="background: #fff;">
						  
							  <div id="pages_maincontent">
     
              <h2 class="page_title">About</h2> 
     
              <div class="page_content"> 
              
              <blockquote>
              Mobix is about creating your next mobile project
              </blockquote>
              
              <img src="images/page_photo.jpg" alt="" title="" />
              
			<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
              </p>
			  
	
              
              <h3>Top features</h3>   
              <ul class="features_list">
                  <li><a href="photos.html"><img src="images/icons/black/photos.png" alt="" title="" /><span>Photo gallery</span></a></li>
                  <li><a href="blog.html"><img src="images/icons/black/blog.png" alt="" title="" /><span>Blog layout</span></a></li>
                  <li><a href="tabs.html"><img src="images/icons/black/responsive.png" alt="" title="" /><span>Responsive tabs</span></a></li>
                  <li><a href="toogle.html"><img src="images/icons/black/toogle.png" alt="" title="" /><span>Toogles</span></a></li>
                  <li><a href="#" data-popup=".popup-login" class="open-popup"><img src="images/icons/black/user.png" alt="" title="" /><span>User login</span></a></li>
                  <li><a href="contact.html"><img src="images/icons/black/contact.png" alt="" title="" /><span>Contact form</span></a></li>
                  <li><a href="#" data-popup=".popup-social" class="open-popup"><img src="images/icons/black/heart.png" alt="" title="" /><span>Social share</span></a></li>
                  <li><a href="#" data-panel="right" class="open-panel"><img src="images/icons/black/phone.png" alt="" title="" /><span>Right slide panel</span></a></li>
              </ul>
              
              <a href="features.html" class="button_full">View all features</a>

              <h3>You can use Mobix for:</h3>
              <ul class="simple_list">
              <li>Creating a mobile website</li>
              <li>Creating a mobile web app</li>
              <li>Creating a mobile native app (integrated with solutions like phonegap)</li>
              </ul>

              
              
              </div>
      
      </div>              </div>
						  <div class="swiper-slide">
					  
						  <img src="img/logo.png" alt="" title="" style="margin-top:20%;width:200px;">  
							<br />						  
                          <a href="about.html" class="swiper_read_more">slide down to see more</a>                      </div>
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
			  
				 
					<li><a href="#" data-panel="left" class="open-panel"><img src="images/icons/white/user.png" alt="" title="" /></a></li>
					<!-- 		  
					<li><a href="#" data-popup=".popup-login" class="open-popup"><img src="images/icons/white/user.png" alt="" title="" /></a></li>
					-->
				  
				  <li><a href="register.php"><img src="images/icons/white/photos.png" alt="" title="" /></a></li>
				  <li class="menuicon"><a href="menu.php"><img src="images/icons/white/menu.png" alt="" title="" /></a></li>
				  <li><a href="blog.html"><img src="images/icons/white/blog.png" alt="" title="" /></a></li>
				  <li><a href="#" data-panel="right" class="open-panel"><img src="images/icons/white/contact.png" alt="" title="" /></a></li>
              </ul>
              </div>  
        </div>
		
      </div>
    </div>
    
	<?php include('login.php');?>
		
	<!-- Reg Popup -->
	<div class="popup popup-signup">
		<div class="content-block-login">
			<?php include('include/register.php');?>
		</div>
	</div>
		
	<!-- Forgot Popup -->
	<div class="popup popup-forgot">	
		<div class="content-block-login">
			<h4>forgot</h4>
			<div class="signup_bottom">
					<p>forgot12</p>
			</div>
			<div class="form_logo"><img src="img/small-logo.png" alt="" title="" /></div>	
			<div class="loginform">
				<form id="LoginForm" action="" method=post>
					<input type="text" name=email value="" class="form_input required" placeholder="e-mail"  required autocomplete="off" />
					<input type="submit" name=do class="form_submit" id="submit" value="qwqw" />
				</form>		
			</div>
			<div class="close_loginpopup_button"><a href="#" class="close-popup"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
		</div>
	</div>
		
	 <!-- Social Popup -->
    <div class="popup popup-social">
    <div class="content-block">
      <h4>Слідуй за нами</h4>
      <p>Знайдіть нас в соціальних мережах.</p>
      <ul class="social_share">
      <li><a href="#"><img src="images/icons/black/twitter.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="images/icons/black/facebook.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="images/icons/black/googleplus.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="images/icons/black/dribbble.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="images/icons/black/linkedin.png" alt="" title="" /></a></li>
      <li><a href="#"><img src="images/icons/black/pinterest.png" alt="" title="" /></a></li>
      </ul>
      <div class="close_popup_button"><a href="#" class="close-popup"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
    </div>
    </div>

<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/framework7.js"></script>
<script type="text/javascript" src="js/my-app.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script type="text/javascript" src="js/email.js"></script>
  </body>
</html>