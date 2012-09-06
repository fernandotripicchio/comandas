<?php
$cakeDescription = __d('La Posta', 'La Posta');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Login
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('main');
                echo $this->Html->css('grid');
                echo $this->Html->css('theme/jquery-ui');
                echo $this->Html->script(array('jquery','jquery.validate','jquery.ui','jquery.buttons'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>


  <!-- CENTER CONTENT -->
<div id="container">
			<?php echo $this->Session->flash(); ?>
                        <?=$this->Html->image("logo2.png",array("width"=>260, "height"=>170, "class"=> "center_image"))?>
			<?php echo $this->fetch('content'); ?>

</div>
 <!--CLEAR FOOTER TO PREVENT BUNCHING-->
 <div class="clear"></div>
 <div id="footer">
 
 </div>


</body>
</html>