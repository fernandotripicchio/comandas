<ul class="tabContainer">
     <li>
          <?=$this->Html->link('Nuevo Pedido <span class="left"></span>
         <span class="right"></span>', array('controller' => 'pedidos', 'action' => 'add'), array('class' => 'tab blue', 'escape' => false)); ?>
     </li>
     <li>
        <?=$this->Html->link('Pedidos <span class="left"></span>
         <span class="right"></span>', array('controller' => 'pedidos', 'action' => 'index'), array('class' => 'tab green', 'escape' => false)); ?>
     </li>
     <li>
          <?=$this->Html->link('Clientes <span class="left"></span>
         <span class="right"></span>', array('admin' => false, 'controller' => 'clientes', 'action' => 'index'), array('class' => 'tab green', 'escape' => false)); ?>

     </li>
     <li>
          <?=$this->Html->link('Productos <span class="left"></span>
         <span class="right"></span>', array('admin' => false, 'controller' => 'productos', 'action' => 'index'), array('class' => 'tab green', 'escape' => false)); ?>

     </li>
     
     <li>
          <?=$this->Html->link('Caja <span class="left"></span>
         <span class="right"></span>', array('admin' => false, 'controller' => 'cajas', 'action' => 'index'), array('class' => 'tab green', 'escape' => false)); ?>

     </li>
</ul>
<div class="clear"></div>



