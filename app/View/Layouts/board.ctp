<?php
$cakeDescription = __d('La Posta', 'La Posta');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('main');
                echo $this->Html->css('grid');
                echo $this->Html->css('theme/jquery-ui');
                echo $this->Html->css('table');
                echo $this->Html->css('menu_board/menu_board');
                echo $this->Html->script(array('jquery','jquery.validate','jquery.ui','jquery.buttons', 'menu_board'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
     <div id="headerbg">
       <div id="contenido">
         <div class="left">
           <h1> <?php echo $cakeDescription ?> - Casa de Comidas </h1>
         </div>
         <div class="right">
         Usuario Logueado :
         <?=$username; ?>
         <?=$this->html->link('Salir' , array('controller' => 'Users', 'action' => 'logout'), array('class'=> 'right')); ?>
         </div>
       </div>
     </div>

     <div id="menu">
           <?=$this->element("menu_board");?>
     </div>



  <!-- CENTER CONTENT -->
<div id="tabContent">

    <div id="contentHolder">

        <!-- The AJAX fetched content goes here -->
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
    </div>

</div>

 <div class="clear"></div>
 <div id="footer"><p>La Posta</p></div>
</body>
</html>