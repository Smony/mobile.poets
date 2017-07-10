<div class="pages">
    <div data-page="projects" class="page no-toolbar no-navbar">
        <div class="page-content">
            <div class="navbarpages">
                <div class="nav_left_logo"><a href="main/index"><img src="/mobile/img/small-logo.png" alt="" title="" /></a></div>
                <div class="nav_right_button"><a href="#"><img src="/mobile/img/icons/white/menu.png" alt="" title="" /></a></div>
            </div>
            <?php if ($poet):?>
            <div id="pages_maincontent">
                <h2 class="page_title"><?=$poet->realname?>&nbsp;(<?=$poet->nick?>)</h2>
                <div class="page_content">
                    <blockquote>
                        <?php if($poet->photo): ?>
                            <img src="http://poetryclub.com.ua/<?=$poet->photo?>" alt="" height="" width="100%" title=""/>
                        <?php endif; ?>
                    </blockquote>
                    <h3><?=$poet->nick?></h3>
                    <ul class="responsive_table">
                        <li class="table_row">
                            <div class="table_section">ID</div>
                            <div class="table_section"><?=$poet->id?></div>
                        </li>
                        <li class="table_row">
                            <div class="table_section">На сайтi з</div>
                            <div class="table_section"><?=date("d/m/Y", $poet->datareg)?></div>
                        </li>
                        <li class="table_row">
                            <div class="table_section">Місто</div>
                            <div class="table_section"><?=$poet->city?></div>
                        </li>
                        <li class="table_row">
                            <div class="table_section">День народж</div>
                            <div class="table_section"><?=$poet->birthdate?></div>
                        </li>
                        <li class="table_row">
                            <div class="table_section">Опубліковано</div>
                            <div class="table_section"><?=$count_poems?> творів</div>
                        </li>
                        <li class="table_row">
                            <div class="table_section"><a href="#">Коментарі</a></div>
                            <div class="table_section"><?=$count_comments?> запису(ів) <a href="#">дивитися</a></div>
                        </li>
                        <li class="table_row">
                            <div class="table_section"><a href="#">Щоденник</a></div>
                            <div class="table_section"><?=$count_diarys?> запису(ів) <a href="#">дивитися</a></div>
                        </li>
                        <li class="table_row">
                            <div class="table_section"><a href="#">Фотоальбом</a></div>
                            <div class="table_section"><?=$count_alboms?> фото <a href="#">дивитися</a></div>
                        </li>
                        <li class="table_row">
                            <div class="table_section"><a href="#">Обране</a></div>
                            <div class="table_section"><?=$count_favorite?> запису(ів) <a href="#">дивитися</a></div>
                        </li>
                       <!-- <li class="table_row">
                            <div class="table_section"><a href="#">Чорний список</a></div>
                            <div class="table_section"><?/*=$count_banlist*/?>/0 запису(ів)  запису(ів) <a href="#">дивитися</a></div>
                        </li>-->
                        <!-- <li class="table_row">
                            <div class="table_section"><a href="#">Білий список</a></div>
                            <div class="table_section">0/0 запису(ів)  запису(ів) <a href="#">дивитися</a></div>
                        </li>-->
                        <li class="table_row">
                            <div class="table_section"><a href="#">Гостьова книга</a></div>
                            <div class="table_section"><?=$count_guestbook?> запису(ів) <a href="#">дивитися</a></div>
                        </li>
                    </ul>
                    <div class="btn_author">
                        <a href="#" class="rename_author">Змінити ім'я або емайл</a>
                        <a href="#" class="rename_author">Видалити профайл</a>
                        <?php if($poet->is_blocked): ?>
                            <a href="#" class="rename_author_no"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <?php if($poet->ischatclose): ?>
                            <a href="#" class="rename_author_no"><i class="fa fa-comments" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    </div>

                 </div>
            </div>
        </div>
    </div>
		    <?php endif; ?>
        </div>
    </div>
</div>

