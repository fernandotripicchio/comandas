<ul class="tabContainer">
     <li><!--
      <a href="/pedidos/add" class="tab blue">
         Nuevo Pedido
         <span class="left"></span>
         <span class="right"></span>
       </a>
       -->
          <?=$this->Html->link('Nuevo Pedido <span class="left"></span>
         <span class="right"></span>', array('controller' => 'pedidos', 'action' => 'add'), array('class' => 'tab blue', 'escape' => false)); ?>

     </li>
     <li>
       <a href="/pedidos/" class="tab green">
          Pedidos
         <span class="left"></span>
         <span class="right"></span>
       </a>
     </li>
     <li>
       <a href="/clientes" class="tab red">
         Clientes
         <span class="left"></span>
         <span class="right"></span>
       </a>
     </li>
     <li>
       <a href="#" class="tab orange">
         Caja
         <span class="left"></span>
         <span class="right"></span>
       </a>
     </li>
</ul>
<div class="clear"></div>



