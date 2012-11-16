<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  	<?php echo $this->Html->charset(); ?>
	<title>Dez Astre</title>
	<?php
		// echo $this->Html->meta('icon');                           TODO
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
<script type="text/javascript" language="javascript" src="js/addon.js"></script>
<script type="text/javascript" language="javascript" src="js/custom.js"></script>
  </head>
  <body>
   
		
		
    <!-- top wrapper -->  
    <div id="topWrapper"> 
      <div id="topBanner"></div> 
    </div>  
    <div id="topnav"> 
      <ul>
        <li id="current" style="border:none">
          <a href="#" shape="rect">Home</a>
        </li>
        <li>
          <a href="#" shape="rect">Products</a>
        </li>
        <li>
          <a href="#" shape="rect">Services</a>
        </li>
        <li>
          <a href="#" shape="rect">News</a>
        </li>
        <li>
          <a href="#" shape="rect">About</a>
        </li>
      </ul> 
    </div>  
    <!-- end top wrapper -->  
    <div id="wrapper"> 
      <div id="container">
      
      <?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
      
        <div id="banner" class="slideshowContainer"> 
          <!-- put your slideshow images here -->  
          <div class="slideshow"> 
            <a href="http://www.flickr.com/photos/12836528@N00/1161507336" title="Facade" target="_blank" shape="rect"> 
              <img src="http://lh6.ggpht.com/_d6vKxl1jKWk/S9XzN29FXdI/AAAAAAABDAg/3lYLjJQdX8E/facade.jpg" /> 
            </a>  
            <a href="http://www.flickr.com/photos/28481088@N00/2495495981" title="Twisted building" target="_blank" shape="rect"> 
              <img src="http://lh6.ggpht.com/_d6vKxl1jKWk/S9XzOZurSSI/AAAAAAABDAk/9RRnvdbw8d0/twisted.jpg" /> 
            </a>  
            <a href="http://www.flickr.com/photos/51035555243@N01/43213643" title="Working late" target="_blank" shape="rect"> 
              <img src="http://lh4.ggpht.com/_d6vKxl1jKWk/S9X8hUDF9qI/AAAAAAABDBI/nUypLbC1y8w/workinglate.jpg" /> 
            </a> 
          </div>  
          <div class="slideshowLeftCorner"></div>  
          <div class="slideshowRightCorner"></div>  
          <div class="slideshowBottom"></div> 
        </div>  
        <!--  content -->  
        <div id="content"> 
          <div style="margin-top:20px;">
            <div class="one_fourth"> 
              <div class="bloc rounded"> 
                <h3>Jquery on board</h3>  
                <p> 
                  <img src="images/chart_bar.png" style="float:right;margin:0 0 0 8px" /> Lorem ipsum dolor sit amet, turpis egestas commodo, eget non ultrices nec lectus, ac interdum, netus aliquam.
                </p> 
              </div> 
            </div>  
            <div class="one_fourth"> 
              <div class="bloc rounded"> 
                <h3>Slideshow</h3>  
                <p> 
                  <img src="images/folder.png" style="float:right;margin:0 0 0 8px" /> Lorem ipsum dolor sit amet, turpis egestas commodo, eget non ultrices nec lectus, ac interdum, netus aliquam.
                </p> 
              </div> 
            </div>  
            <div class="one_fourth"> 
              <div class="bloc rounded"> 
                <h3>Cufon fonts</h3>  
                <p> 
                  <img src="images/link.png" style="float:right;margin:0 0 0 8px" /> Lorem ipsum dolor sit amet, turpis egestas commodo, eget non ultrices nec lectus, ac interdum, netus aliquam.
                </p> 
              </div> 
            </div>  
            <div class="one_fourth last"> 
              <div class="bloc rounded"> 
                <h3>Tableless</h3>  
                <p> 
                  <img src="images/rss2.png" style="float:right;margin:0 0 0 8px" /> Lorem ipsum dolor sit amet, turpis egestas commodo, eget non ultrices nec lectus, ac interdum, netus aliquam.
                </p> 
              </div> 
            </div>  
            <div class="clear"></div>  
            <div> 
              <h1>Heading sample with Cufon font</h1>  
              <p>This template is free. You are free to use it, share it, redistribute it, modify it in any way you want as long as you 
                <strong>keep a link back to doTemplate Website</strong> in the footer. You can remove this link by making a $10 
                <a href="http://www.dotemplate.com/dt/index.jsp#donate" target="_blank" shape="rect">donation</a>.
              </p> 
            </div>  
            <div class="half"> 
              <h3>Heading 3 sample</h3>  
              <p>Lorem ipsum dolor sit amet, turpis egestas commodo, eget non ultrices nec lectus, ac interdum, netus aliquam, vulputate vel reiciendis risus.</p> 
            </div>  
            <div class="half last"> 
              <h3>Lightweight XHTML / CSS template</h3>  
              <p>Lorem ipsum dolor sit amet, turpis egestas commodo, eget non ultrices nec lectus, ac interdum, netus aliquam.</p> 
            </div> 
          </div>  
          <div class="clear"></div> 
        </div>  
        <!-- end content -->  
        <div class="clear" style="height:40px"></div> 
      </div>  
      <!-- end container --> 
    </div>  
    <div id="bottomWrapper">
     
      <div id="footer"></div>
      
      <div id="bottom-links"> 
        <div style="padding-top:20px"> 
          <!-- 
DO NOT REMOVE OR MODIFY THE FOOTER LINK BELOW.
If you want to remove this link please make a 10 dollars donation at www.dotemplate.com
-->  
          <a href="http://www.dotemplate.com" shape="rect">Templates</a> maker
        </div> 
      </div> 
    </div> 
  </body>
</html>
