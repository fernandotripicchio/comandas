<?php
$cakeDescription = __d('La Posta', 'La Posta');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		La Posta
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('main');
                echo $this->Html->css('grid');
                echo $this->Html->css('theme/jquery-ui');
                echo $this->Html->css('tableboard');
                echo $this->Html->css('menu_board/menu_board');
                echo $this->Html->css('popup');
                echo $this->Html->css('buttons');
                echo $this->Html->css('pedidosShow'); 
                echo $this->Html->css('colorbox/colorbox');
                echo $this->Html->script(array('jquery',
                                               'jquery.validate',
                                               'jquery.colorbox',
                                               'jquery.ui',
                                               'jquery.buttons',
                                               'calendar-spanish'
                                             ));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
     <div id="headerbg">
            <div id="contenido">
                <div class="left">
                  <?=$this->Html->image("logo2.png",array("width"=>160, "height"=>90, "style" => "padding:5px;marging:10px"))?>
                  <br />
                </div>
                <div class="right">

                  <div>

                    <table style="float: right">
                        <tr>
                          <td class="sucursal">
                              Sucursal: <?=$sucursal["Sucursal"]["nombre"]; ?> 
                          </td>  
                          <td>
                               <strong> Usuario: <?=$username; ?> </strong>
                          </td>
                          <? if ($is_admin=="1") { ?> 
                          <td>
                              <?=$this->html->link('Administración' , array('controller' => 'Admin', 'action' => 'index'), array('div'=> false,'class'=> 'right')); ?>
                          </td>
                          <? } ?>
                          <td>
                              <?=$this->html->link('Salir' , array('controller' => 'Users', 'action' => 'logout'), array('div'=> false,'class'=> 'right')); ?>
                          </td>                            
                        </tr>
                      </table>
                  </div>
                <div>
                  <?=$this->element("menu_board");?>
                </div>

              </div>

            </div>
     </div>


<div class="clear"></div>
 <!-- CENTER CONTENT -->
<div id="tabContent">
    <div id="contentHolder">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
    </div>
</div>

<div class="clear"></div>

<div id="footer">
     <div class="pinstripe">&nbsp;</div>
     <div id="copyrightSection">La Posta - San Luis - Argentina - <?php echo date("Y"); ?> </div>
</div>

</body>
</html>
<?=$this->Html->scriptBlock("var root = '".$this->Html->url('/')."';");?>