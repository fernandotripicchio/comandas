<?php
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
           <?=$this->Html->image("logo2.png",array("width"=>170, "height"=>80, "style" => "padding:5px;marging:10px"))?>
           <br />
         </div>
         <div class="right">
           <div>
             <table style="float: right">
                 <tr>
                   <td>
                        <strong> Usuario: <?=$username; ?> </strong>
                   </td>
                   <td>
                       <?=$this->html->link('Salir' , array('controller' => 'Users', 'action' => 'logout'), array('div'=> false,'class'=> 'right')); ?>
                   </td>
                   <td>
                       <?=$this->html->link('Pedidos' , array('admin' => false, 'controller' => 'Pedidos', 'action' => 'index'), array('div'=> false,'class'=> 'right')); ?>
                   </td>
                 </tr>
               </table>
           </div>
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
      <div id="footer">
          <p>La Posta</p>
          <?php echo $this->element('sql_dump'); ?>
      </div>
</body>
</html>