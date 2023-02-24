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
                    <li class="footer__item"><a href="<?php echo esc_url( site_url( '/about#tab1' ) ); ?>" class="footer__link" title="Go to the staff page">Contact Staff</a></li>
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
                        <li class="footer__item">1-800-555-5555</li>
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
                        <li class="footer__item"><a class="footer__link" href="<?php echo esc_url( site_url( '/resources' ) ); ?>" title="Go to the Resources page">Resources</a></li>
                        <li class="footer__item"><a class="footer__link" href="<?php echo esc_url( site_url( '/events' ) ); ?>" title="Go to the Events page">Events</a></li>
                        <li class="footer__item"><a class="footer__link" href="">TTA Request Form</a></li>
                        <li class="footer__item"><a class="footer__link" href="<?php echo esc_url( site_url( '/ovc-faqs' ) );?>" title="Go to our FAQs page">Help Pages</a></li>
                        <li class="footer__item"><a class="footer__link" href="<?php echo esc_url( site_url( '/admin' ) ); ?>" title="Go to the Admin page">Admin</a></li>
                    </ul>
                </div>

                <div class="footer__social footer__mobile">
                    <a href="" class="footer__social-link" title="Go to our Fackbook page"><?php echo svg_icon('footer__icon', 'facebook');?></a>
                    <a href="" class="footer__social-link"  title="Go to our Twitter page"><?php echo svg_icon('footer__icon', 'twitter');?></a>
                    <a href="" class="footer__social-link" title="Go to our other web page"><?php echo svg_icon('footer__icon', 'web');?></a>
                </div>

                <div class="footer__section">
                    <p class="footer__award-info">The website is supported by ICF under 15POVC-21-GK-02595-HT, awarded by the Office for Victims of Crime, Office of Justice Programs, U.S. Department of Justice. The opinions, findings, and conclusions or recommendations expressed in this website are those of the contributors and do not necessarily represent the official position or policies of the U.S. Department of Justice.</p>
                </div>

                

               
            </div>
        </div>
        <a class="backtop" href="#top"><span class="sr-only">Back Top</span> <?php echo svg_icon('backtop__icon', 'angle-up');?></a>
        
    </footer>
  


    <?php wp_footer(); ?>
</body>
</html>
