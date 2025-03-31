<?php
/**
 * * The template for displaying the footer
 *
 * @package your-wp-project
 */

?>
    <!--Footer-->
    <footer class="footer">
        <div class="footer__top">
            <div class="footer__contact">
                <h2 class="footer__header">Contact Us</h2>
                <ul class="footer__list">
                    
                    <li class="footer__item"><a href="mailto:HTCollective@Icf.com" class="footer__link">Contact HTC | HTCollective@Icf.com</a></li>
                    
                </ul>
            </div>
            <div class="footer__image">
                &nbsp;
            </div>
            
        </div>
        <div class="footer__bottom">
            <h2 class="footer__header">Contact us</h2>
            <div class="footer__wrapper">
                <div class="footer__section">
                    <ul class="footer__list">
                
                        <li class="footer__item">htcollective@icf.com</li>
                    </ul>
                    <div class="footer__social">
                        <a href="" class="footer__social-link" title="Go to our Fackbook page"><?php echo svg_icon('footer__icon', 'facebook');?></a>
                        <a href="" class="footer__social-link" title="Go to our Twitter page"><?php echo svg_icon('footer__icon', 'twitter');?></a>
                        <a href="" class="footer__social-link" title="Go to our other web page"><?php echo svg_icon('footer__icon', 'web');?></a>
                    </div>
                </div>
                <div class="footer__section">
                    <ul class="footer__list">
                        <li class="footer__item"><a class="footer__link" href="mailto:htcollective@icf.com" title="Email us now">Email Updates</a></li>
                        <li class="footer__item"><a class="footer__link" href="<?php echo esc_url( site_url( '/grantees' ) ); ?>" title="Go to the Grantees page">Grantees</a></li>
                        <li class="footer__item"><a class="footer__link" href="<?php echo esc_url( site_url( '/admin' ) ); ?>" title="Go to the Admin page">Admin</a></li>
                    </ul>
                </div>

                <div class="footer__social footer__mobile">
                    <a href="" class="footer__social-link" title="Go to our Fackbook page"><?php echo svg_icon('footer__icon', 'facebook');?></a>
                    <a href="" class="footer__social-link"  title="Go to our Twitter page"><?php echo svg_icon('footer__icon', 'twitter');?></a>
                    <a href="" class="footer__social-link" title="Go to our other web page"><?php echo svg_icon('footer__icon', 'web');?></a>
                </div>

                <div class="footer__section">
                    <p class="footer__award-info"> <?php 
        $footer_text = get_theme_mod('ovchtc_footer_text');
        if (!empty($footer_text)) {
            echo wp_kses_post($footer_text);
        } else {
            echo 'Set your footer text in Appearance > Customize > Footer Settings.';
        }
        ?></p>
                </div>

                

               
            </div>
        </div>
        <a class="backtop" href="#top"><span class="sr-only">Back Top</span> <?php echo svg_icon('backtop__icon', 'angle-up');?></a>
        
    </footer>
  


    <?php wp_footer(); ?>
</body>
</html>
