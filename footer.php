<?php global $landsky_option; ?>
<!-- Начало POPup форма регитрасции -->
<div class="popup" id="send_mail">
        <form action="#" id="feedback">
                <svg id="close_pop" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.021 512.021" style="enable-background:new 0 0 512.021 512.021;" xml:space="preserve"><g><path d="M301.258,256.01L502.645,54.645c12.501-12.501,12.501-32.769,0-45.269c-12.501-12.501-32.769-12.501-45.269,0l0,0   L256.01,210.762L54.645,9.376c-12.501-12.501-32.769-12.501-45.269,0s-12.501,32.769,0,45.269L210.762,256.01L9.376,457.376   c-12.501,12.501-12.501,32.769,0,45.269s32.769,12.501,45.269,0L256.01,301.258l201.365,201.387   c12.501,12.501,32.769,12.501,45.269,0c12.501-12.501,12.501-32.769,0-45.269L301.258,256.01z"/></g>            <h5>Напишите нам, и мы приедем!</h5>
            <div class="wrap_form">
                <div>
                    <input type="text" id="name" name="name" class="name" required="required" placeholder="Имя*">
                    <input type="text" id="email" name="email" class="email" required="required" placeholder="E-mail*">
                    <input type="text" id="theme" name="theme" class="theme" required="required" placeholder="Тема сообщения*" value="Заказать дизайн">
                </div>
                <textarea name="message" id="message" cols="30" rows="5" placeholder="Хочу себе ландшафтный дизайн"></textarea>
            </div>
            <input type="submit" id="sendmail" class="but_send" name="sendmail" value="Отправить">
        </form>
    </div>
<!-- Конец POPup форма регитрасции -->

<!-- Кнопка Скрол Вверх -->
<div id="scroll-top">
    <a href="#top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.4,9.88,10.81,5.29a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42L14,11.29a1,1,0,0,1,0,1.42L9.4,17.29a1,1,0,0,0,1.41,1.42l4.59-4.59A3,3,0,0,0,15.4,9.88Z"/></svg></a>
</div>


<!-- ФУТЕР -->
<footer id="footer">
    <div class="wrap_footer">
        <div class="left">
            <div class="block_logo"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" > <?php bloginfo( 'name' ); ?> </a></div>
            
            <?php if($landsky_option['leg_address']) {?>
                <p class="info">
                    <?php echo esc_html($landsky_option['leg_address']); ?>
                </p>
            <?php } ?>
            <ul class="social">
                <?php if ($landsky_option['facebook']){ ?>
                    <li><a href="<?php echo esc_html($landsky_option['facebook']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt=""></a></li>
                <?php }; ?>

                <?php if ($landsky_option['instagramm']){ ?>    
                    <li><a href="<?php echo esc_html($landsky_option['instagramm']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt=""></a></li>
                <?php }; ?>

                <?php if ($landsky_option['twitter']){ ?>
                    <li><a href="<?php echo esc_html($landsky_option['twitter']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png" alt=""></a></li>
                <?php }; ?>

                <?php if ($landsky_option['vk']){ ?>
                    <li><a href="<?php echo esc_html($landsky_option['vk']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/vk.png" alt=""></a></li>
                <?php }; ?>

                <?php if ($landsky_option['telegram']){ ?>
                    <li><a href="<?php echo esc_html($landsky_option['telegram']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/telegram.png" alt=""></a></li>
                <?php }; ?>

            </ul>
        </div>
        <div class="center">
            <h5 id="but_nav_footer">Навигация 
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="32" height="32"><path d="M15.4,9.88,10.81,5.29a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42L14,11.29a1,1,0,0,1,0,1.42L9.4,17.29a1,1,0,0,0,1.41,1.42l4.59-4.59A3,3,0,0,0,15.4,9.88Z"/></svg>
            </h5>
            <nav>
                <?php wp_nav_menu( [
                    'menu'            => 'main_header',
                    'container'       => false,
                    'menu_class'      => 'footer_menu',
                    'echo'            => true,
                    'fallback_cb'     => '',
                    'depth'           => 1,
                ] ); ?>
        </nav>
        </div>
        <div class="right">
            <h5>Контакты</h5>

            <?php if ($landsky_option['email']){ ?>
                <div class="mail"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail_icon.png" alt=""><a href="mailto:<?php echo esc_html($landsky_option['email']); ?>"><?php echo esc_html($landsky_option['email']); ?></a></div>
            <?php }; ?>
            <?php if ($landsky_option['num_tel']){ ?>
                <div class="phone"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone_icon.png" alt=""><a href="tel:<?php echo esc_html($landsky_option['num_tel']); ?>"><?php echo esc_html($landsky_option['num_tel']); ?></a></div>
            <?php }; ?>
        </div>
    </div>
    <div class="copyright"><?php echo esc_html($landsky_option['copyright']); ?></div>
    <div class="developer">Сайт разработал <a href="https://t.me/wp_devsite">wp_dev</a></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
