
<div class="pages">
  <div data-page="projects" class="page no-toolbar no-navbar">
    <div class="page-content">
    
      <div class="page_content_menu">
       <nav class="main-nav">
        <ul>
          <li><a href="index.html"><img src="images/icons/white/home.png" alt="" title="" /><span>Home</span></a></li>
          <li><a href="about.html"><img src="images/icons/white/user.png" alt="" title="" /><span>About</span></a></li>
          <li><a href="features.html"><img src="images/icons/white/settings.png" alt="" title="" /><span>Features</span></a></li>
          <li><a href="photos.html"><img src="images/icons/white/photos.png" alt="" title="" /><span>Gallery</span></a></li>
          <li><a href="videos.html"><img src="images/icons/white/video.png" alt="" title="" /><span>Videos</span></a></li>
          <li><a href="blog.html"><img src="images/icons/white/blog.png" alt="" title="" /><span>Blog</span></a></li>
          <li><a href="tables.html"><img src="images/icons/white/tables.png" alt="" title="" /><span>Tables</span></a></li>
          <li><a href="form.html"><img src="images/icons/white/form.png" alt="" title="" /><span>Inputs</span></a></li>
          <li><a href="slider.html"><img src="images/icons/white/slider.png" alt="" title="" /><span>Slider</span></a></li>
          <li><a href="toggle.html"><img src="images/icons/white/toogle.png" alt="" title="" /><span>Toggle</span></a></li>
          <li><a href="tabs.html"><img src="images/icons/white/docs.png" alt="" title="" /><span>Tabs</span></a></li>
          <li><a href="#" data-popup=".popup-social" class="open-popup"><img src="images/icons/white/heart.png" alt="" title="" /><span>Social</span></a></li>
		  <?php if(is_array($user)) {?>
		  <li><a href="author.php"><img src="images/icons/white/user.png" alt="" title="" /><span><?=$user[nick];?></span></a></li>
		 <?php  }else 
		 { ?>
		 <li><a href="#" data-popup=".popup-login" class="open-popup"><img src="images/icons/white/lock.png" alt="" title="" /><span>Login</span></a></li>
		 <?php  } ?>
          
 
		  
          <li><a href="tel:1234 5678" class="external"><img src="images/icons/white/phone.png" alt="" title="" /><span>Call Now</span></a></li>
          <li><a href="contact.html"><img src="images/icons/white/contact.png" alt="" title="" /><span>Contact</span></a></li>
        </ul>
      </nav>  
      <div class="close_popup_button"><a href="#" class="backbutton"><img src="images/icons/white/menu_close.png" alt="" title="" /></a></div>
     </div> 
      
    </div>
  </div>
</div>