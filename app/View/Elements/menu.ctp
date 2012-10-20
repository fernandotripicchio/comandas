<div id="menu">
    <ul class="menu">
        <li>
          <?=$this->Html->link('<span>Usuarios</span>', array('admin' => true,'controller' => 'users', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
               <ul>
                <li>
                    <?=$this->Html->link('<span>Agregar Usuario</span>', array('admin' => true,'controller' => 'users', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                </li>
               </ul>
            </div>
        </li>

        <li>
          <?=$this->Html->link('<span>Productos</span>', array('admin' => true,'controller' => 'productos', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
              <ul>
                <li>
                   <?=$this->Html->link('<span>Agregar Producto</span>', array('admin' => true,'controller' => 'productos', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                 </li>
            </ul>
            </div>
        </li>

        <li>
          <?=$this->Html->link('<span>Clientes</span>', array('admin' => true,'controller' => 'clientes', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
              <ul>
                <li>
                   <?=$this->Html->link('<span>Agregar Clientes</span>', array('admin' => true,'controller' => 'clientes', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                 </li>
            </ul>
            </div>
        </li>

        <li>
          <?=$this->Html->link('<span>Cadetes</span>', array('admin' => true,'controller' => 'cadetes', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
              <ul>
                <li>
                   <?=$this->Html->link('<span>Agregar Cadete</span>', array('admin' => true,'controller' => 'cadetes', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                 </li>
            </ul>
            </div>
        </li>

        <li>
          <?=$this->Html->link('<span>Tipo Movimientos</span>', array('admin' => true,'controller' => 'tipo_movimientos', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
            <div>
              <ul>
                <li>
                   <?=$this->Html->link('<span>Agregar Tipo</span>', array('admin' => true,'controller' => 'tipo_movimientos', 'action' => 'add'), array('class' => 'parent', 'escape' => false)); ?>
                 </li>
            </ul>
            </div>
        </li>

        <li class="last">
          <?=$this->Html->link('<span>Pedidos</span>', array('admin' => true,'controller' => 'Pedidos', 'action' => 'index'), array('class' => 'parent', 'escape' => false)); ?>
        </li>
    </ul>
</div>