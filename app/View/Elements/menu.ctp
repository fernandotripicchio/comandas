<div id="menu">
    <ul class="menu">
        <li>
          <?=$this->Html->link('<span>Usuarios</span>', array('controller' => 'users', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Agregar Usuario</span>', array('controller' => 'users', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
               </ul>
            </div>
        </li>

        <li>
          <?=$this->Html->link('<span>Productos</span>', array('controller' => 'productos', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
              <ul>
                <li>
                   <?=$this->Html->link('<span>Agregar Producto</span>', array('controller' => 'productos', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                 </li>
            </ul>
            </div>
        </li>

        <li>
          <?=$this->Html->link('<span>Clientes</span>', array('controller' => 'clientes', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
              <ul>
                <li>
                   <?=$this->Html->link('<span>Agregar Clientes</span>', array('controller' => 'clientes', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                 </li>
            </ul>
            </div>
        </li>
        <li class="last"><a href="#"><span>Pedidos</span></a></li>
    </ul>
</div>