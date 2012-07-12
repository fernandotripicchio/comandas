<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('La Posta', 'La Posta');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('main');
                echo $this->Html->css('grid');
                echo $this->Html->css('theme/jquery-ui');
                echo $this->Html->css('table');
                echo $this->Html->css('menu/menu');
                echo $this->Html->script(array('jquery','jquery.validate','jquery.ui','jquery.buttons', 'menu'));
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
           <?=$this->element("menu");?>
     </div>



  <!-- CENTER CONTENT -->
<div id="container">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>

</div>
	<!--CLEAR FOOTER TO PREVENT BUNCHING-->
	<div class="clear"></div>
 <div id="footer"><p>La Posta</p></div>

<!--
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">

			<?//php echo $this->Session->flash(); ?>

			<?//php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		<?//php echo $this->element('sql_dump'); ?>
                  

		</div>
	</div>
	-->
</body>
</html>