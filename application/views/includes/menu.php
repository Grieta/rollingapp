<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?= ucfirst($this->session->userdata('name')) ?></p>
            <p class="app-sidebar__user-designation"><?= ucfirst($this->session->userdata('cargo')) ?></p>
        </div>
    </div>

    <ul class="app-menu">
        <li><a class="dash app-menu__item" href="<?php echo base_url(); ?>inicio"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Panel de Control</span></a></li>
        <li><a class="sales app-menu__item" href="<?php echo base_url(); ?>inicio/ventas"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Ventas</span></a></li>
        <li class="treeview"><a class="caja app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Caja</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?php echo base_url(); ?>inicio/"><i class="icon fa fa-circle-o"></i> Cierre de Caja</a></li>

            </ul>
        </li>
        <li class="treeview"><a class="addlinea app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cart-plus"></i><span class="app-menu__label">Importantes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?php echo base_url(); ?>inicio/addlinea"><i class="icon fa fa-circle-o"></i> Añadir Linea/Articulo</a></li>
                <li><a class="treeview-item" href="<?php echo base_url(); ?>inicio/combos"><i class="icon fa fa-circle-o"></i> Añadir Combos</a></li>
                <li><a class="treeview-item" href="<?php echo base_url(); ?>inicio/mp"><i class="icon fa fa-circle-o"></i> Añadir Materia Prima</a></li>

            </ul>
        </li>
                <li class="treeview"><a class="addlinea app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cart-plus"></i><span class="app-menu__label">Inventario</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?php echo base_url(); ?>inicio/inventario"><i class="icon fa fa-circle-o"></i> Añadir Inventario</a></li>
                <li><a class="treeview-item" href="<?php echo base_url(); ?>inicio/rinventario"><i class="icon fa fa-circle-o"></i> Remover Inventario</a></li>

            </ul>
        </li>
    </ul>
</aside>