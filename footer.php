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
                    <li class="footer__item"><a href="" class="footer__link">Contact Staff</a></li>
                    <li class="footer__item"><a href="" class="footer__link">Contact HTC | HTCollective@Icf.com</a></li>
                    
                </ul>
            </div>
            <div class="footer__image"  style="background-image: url('<?php echo  get_template_directory_uri()?>/assets/img/about-1.jpg');">
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
                        <a href="" class="footer__social-link"><?php echo svg_icon('footer__icon', 'facebook');?></a>
                        <a href="" class="footer__social-link"><?php echo svg_icon('footer__icon', 'twitter');?></a>
                        <a href="" class="footer__social-link"><?php echo svg_icon('footer__icon', 'web');?></a>
                    </div>
                </div>
                <div class="footer__section">
                    <ul class="footer__list">
                        <li class="footer__item"><a class="footer__link" href="#">Email Updates</a></li>
                        <li class="footer__item"><a class="footer__link" href="#">TTA Request Form</a></li>
                        <li class="footer__item"><a class="footer__link" href="#">Help Pages</a></li>
                    </ul>
                </div>

                <div class="footer__social footer__mobile">
                    <a href="" class="footer__social-link"><?php echo svg_icon('footer__icon', 'facebook');?></a>
                    <a href="" class="footer__social-link"><?php echo svg_icon('footer__icon', 'twitter');?></a>
                    <a href="" class="footer__social-link"><?php echo svg_icon('footer__icon', 'web');?></a>
                </div>

               
            </div>
        </div>
        
    </footer>
    <?php 
    if (is_front_page()){
       echo '<script type="text/javascript" src="//localhost:3000/wp-content/themes/ovc-htc/node_modules/rellax/rellax.min.js?ver=6.1.1" id="rellax-js"></script>';
       echo "<script type='text/javascript'>var rellax = new Rellax('.rellax')</script>";
    } 
    ?>

    <?php wp_footer(); ?>
</body>
</html>
