<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>Print</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('print');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>   
  </head>
  <body>
    <div class="container">
        <?php echo $this->fetch('content'); ?>
    </div>
    <!-- end - container -->
  </body>
</html>