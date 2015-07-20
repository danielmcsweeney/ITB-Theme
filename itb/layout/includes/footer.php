<?php
$footnote = theme_itb_get_setting('footnote', 'format_html');

$fburl = theme_itb_get_setting('fburl');
$pinurl = theme_itb_get_setting('pinurl');
$twurl = theme_itb_get_setting('twurl');
$gpurl = theme_itb_get_setting('gpurl');

$address = theme_itb_get_setting('address');
$emailid = theme_itb_get_setting('emailid');
$phoneno = theme_itb_get_setting('phoneno');

?>
<footer id="footer">
	<div class="footer-main">
  	<div class="container-fluid">
    	<div class="row-fluid">
      	<div class="span5">
        	<div class="infoarea">
          	<div class="footer-logo"><a href="#"><img src="<?php echo get_footerlogo_url(); ?>" alt="ITB"></a></div>
             <?php echo $footnote; ?>
          </div>
        </div>
      	<div class="span3">
        	
        </div>
      	<div class="span4">
          <div class="contact-info">
            <h2 class="nopadding">Contact us</h2>
            <p><?php echo $address; ?><br>
              <i class="fa fa-phone-square"></i> Phone: <?php echo $phoneno; ?><br>
              <i class="fa fa-envelope"></i> E-mail: <a class="mail-link" href="mailto:<?php echo $emailid; ?>"><?php echo $emailid; ?></a><br>
            </p>
          </div>
          <div class="social-media">
            <h6>Follow us</h6>
            <ul>
              <li class="smedia-01"><a href="<?php echo $fburl; ?>"><i class="fa fa-facebook-square"></i></a></li>
              <li class="smedia-02"><a href="<?php echo $pinurl; ?>"><i class="fa fa-pinterest-square"></i></a></li>
              <li class="smedia-03"><a href="<?php echo $twurl; ?>"><i class="fa fa-twitter-square"></i></a></li>
              <li class="smedia-04"><a href="<?php echo $gpurl; ?>"><i class="fa fa-google-plus-square"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--E.O.Footer-->

<footer>
<?php  echo $OUTPUT->standard_footer_html(); ?>
</footer>
<?php  echo $OUTPUT->standard_end_of_body_html() ?>