<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Global_Reporting_Centre
 */

?>

	</div><!-- #content -->

	<footer class="site-footer">
    <div id="footer-elements" class="grid site-width">
      <?php if (! is_front_page() ) : ?>

			<!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup" class="column">
                <form action="https://twitter.us15.list-manage.com/subscribe/post?u=625d9e0d6500bffb3011fc2a0&amp;id=29cfaf2756" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" class="validate" novalidate>
                    <div id="mc_embed_signup_scroll">
                        <div class="mc-field-group input-group attached">
                            <div id="label-social">
                                <div class="column caps">Get our newsletter</div>
                                <div class="column shrink social">
                                    <a title="GRC on Twitter" href="https://twitter.com/GlobalRepCentre"><i class="fab fa-twitter-square"></i></a>
                                    <a title="GRC on Facebook" href="https://www.facebook.com/globalreportingcentre/"><i class="fab fa-facebook-square"></i></a><a title="GRC on Instagram" href="https://www.instagram.com/globalreportingcentre/"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div id="email-form">
                                <div class="column"><input type="email" value="" name="EMAIL" placeholder="Your Email" class="required email input-group-field" id="mce-EMAIL"></div>
                                <div class="column shrink"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                            </div>
                        </div>
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_625d9e0d6500bffb3011fc2a0_29cfaf2756" tabindex="-1" value=""></div>
                    </div>
                </form>
      </div><!--End mc_embed_signup-->
      <?php else : ?>
        <div class="column shrink" id="home-only">
          <div id="label-social" class="grid">
            <div class="column caps"><a class="button" href="http://eepurl.com/czCx1X">Get our newsletter</a></div>
            <div class="column shrink social">
              <a title="GRC on Twitter" href="https://twitter.com/GlobalRepCentre"><i class="fab fa-twitter-square"></i></a>
              <a title="GRC on Facebook" href="https://www.facebook.com/globalreportingcentre/"><i class="fab fa-facebook-square"></i></a>
              <a title="GRC on Instagram" href="https://www.instagram.com/globalreportingcentre/"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      <?php endif; ?>
            <div class="column" id="menu-footer">
                <div class="grid no-padding">
                    <div class="column">
                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'footer',
                                'menu_id'        => 'footer-menu',
                                'container'      => 'ul',
                                'menu_class'     => 'footer-menu',
                            ) );
                        ?>
                    </div>
                    <div class="column shrink" id="reporting-support">
                      <span class="support"><a href="https://globalreportingcentre.org/donate-to-the-global-reporting-centre/">Donate to the GRC</a></span>
                      <?php $bloginfo = get_bloginfo( 'description' );?>
                        <?php if ($bloginfo) :
                          echo '<span class="slogan"><a href="' . get_home_url() . '/about">' . $bloginfo . '</a></span>';
                      endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-info-container">
            <div class="site-width grid align-to-edges">
                <div class="footer-logos column">
                    <a href="https://journalism.ubc.ca/" title="University of British Columbia"><img width="180" height="40" src="<?php bloginfo('stylesheet_directory'); ?>/img/ubc-logo.png" alt="UBC Logo" /></a>
                    <a href="https://gijn.org/" title="Global Investigative Journalism Network"><img width="136" height="36" src="<?php bloginfo('stylesheet_directory'); ?>/img/gijn-logo.png" alt="GIJN Logo" /></a>
                </div>
                <p class="attribution column">
                    <a href="https://globalreportingcentre.org/privacy-policy/">Privacy Policy</a> | <a title="View License" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">BY-NC-SA 4.0</a> | Global Reporting Centre (<?php echo date("Y"); ?>) | <a href="https://github.com/GlobalRepCentre" title="GRC on GitHub">GitHub</a>
                </p>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92174247-1', 'auto');
  ga('send', 'pageview');

</script>

<?php wp_footer(); ?>

</body>
</html>
