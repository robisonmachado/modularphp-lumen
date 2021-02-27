@php
    $url = 'http://localhost/Controle-de-Estoque/views/';
@endphp


<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="'.$url.''.$foto.'" class="img-circle" style="height:50px; width:50px;" alt="User Image">

        </div>
        <div class="pull-left info">
          <p>'.$usuario.'</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Pesquisa...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li class="active treeview">
          <a href="'.$url.'">
            <i class="fa fa-dashboard"></i> <span>INÍCIO</span>

          </a>

        </li>


<!-- Produtos -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Produtos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="'.$url.'prod/"><i class="fa fa-circle-o"></i>Produtos</a></li>
            <li><a href="'.$url.'prod/addprod.php"><i class="fa fa-circle-o"></i>Add Produtos</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Empresa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="'.$url.'empresa/"><i class="fa fa-circle-o"></i>Empresa</a></li>
            <li><a href="'.$url.'empresa/addempresa.php"><i class="fa fa-circle-o"></i>Add Empresa</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Entrada</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="'.$url.'itens/"><i class="fa fa-circle-o"></i>Itens</a></li>
			<li><a href="'.$url.'itens/totalitens.php"><i class="fa fa-circle-o"></i>Total Itens</a></li>
            <li><a href="'.$url.'itens/additens.php"><i class="fa fa-circle-o"></i>Add Itens</a></li>
          </ul>
        </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
