<div class="pages">
    <div data-page="projects" class="page no-toolbar no-navbar">
        <div class="page-content">
            <div class="navbarpages">
                <div class="nav_left_logo"><a href="main/index"><img src="/mobile/img/small-logo.png" alt="" title="" /></a></div>
                <div class="nav_right_button"><a href="#"><img src="/mobile/img/icons/white/menu.png" alt="" title="" /></a></div>
            </div>
            <?php if ($poet):?>
            <div id="pages_maincontent">

                <h2 class="page_title">Профайл користувача (<?=$poet->nick?>)</h2>
                <blockquote>
                    <p style="text-align: center;">E-mail(логін): <b><?=$poet->email?></b></p>
                </blockquote>
                <div class="page_content">

                    <div class="contactform">
                        <form>

                            <label>Пароль :</label>
                            <input type="text" name="password" value="<?=$poet->password?>" class="form_input" />
                            <label>Місто :</label>
                            <input type="text" name="city" value="<?=$poet->city?>" class="form_input" />
                            <label>Стать :</label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="male" checked="checked">
                                <div class="item-inner">
                                    <div class="item-title">Чоловiча</div>
                                </div>
                            </label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="female">
                                <div class="item-inner">
                                    <div class="item-title">Жіноча</div>
                                </div>
                            </label>
                            <label>Смайли :</label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="" checked="checked">
                                <div class="item-inner">
                                    <div class="item-title">використовувати</div>
                                </div>
                            </label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="">
                                <div class="item-inner">
                                    <div class="item-title">не дублювати</div>
                                </div>
                            </label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="">
                                <div class="item-inner">
                                    <div class="item-title">не використовувати</div>
                                </div>
                            </label>
                            <label>Стрічка творів друзів :</label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="">
                                <div class="item-inner">
                                    <div class="item-title">вимкнути</div>
                                </div>
                            </label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="">
                                <div class="item-inner">
                                    <div class="item-title">показувати</div>
                                </div>
                            </label>
                            <label>Міні-чат зверху сторінки :</label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="">
                                <div class="item-inner">
                                    <div class="item-title">вимкнути</div>
                                </div>
                            </label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="">
                                <div class="item-inner">
                                    <div class="item-title">показувати</div>
                                </div>
                            </label>
                            <label>Відображення картинок в повідомленнях :</label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="">
                                <div class="item-inner">
                                    <div class="item-title">вимкнути</div>
                                </div>
                            </label>
                            <label class="label-radio item-content">
                                <!-- Checked by default -->
                                <input type="radio" name="my-radio" value="">
                                <div class="item-inner">
                                    <div class="item-title">показувати</div>
                                </div>
                            </label>
                            <label>Публікувалися десь?</label>
                            <textarea name="message" class="form_textarea" rows="" cols=""></textarea>
                            <label>Про себе :</label>
                            <textarea name="message" class="form_textarea" rows="" cols=""></textarea>
                            <input type="submit" name="submit" class="form_submit" id="submit" value="Send" />
                        </form>
                    </div>



                </div>

            </div>
    <?php endif; ?>
</div>
</div>
</div>
