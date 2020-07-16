<aside class="main-sidebar elevation-4 sidebar-dark-warning">
  <a href="/" class="brand-link navbar-warning text-center">
    <span class="brand-text font-weight-light" style="color:#1f2d3d">WebERP</span>
  </a>

  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
          <a href="/" class="nav-link bg-warning">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fa fa-box"></i>
            <p>
              Purchases
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo e(route('items_index')); ?>" class="nav-link">
                <i class="nav-icon fa fa-cart-plus"></i>
                <p>Items</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('purchases.index')); ?>" class="nav-link">
                <i class="nav-icon fa fa-cart-arrow-down"></i>
                <p>Orders</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo e(route('suppliers_index')); ?>" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>Suppliers</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fa fa-comments-dollar"></i>
            <p>
              Sales
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?php echo e(route('sales')); ?>" class="nav-link">
                <i class="nav-icon fa fa-money-bill-alt"></i>
                <p>Revenue</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('clients_index')); ?>" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>Clients</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('interests.index')); ?>" class="nav-link">
                <i class="nav-icon fa fa-dollar-sign"></i>
                <p>Interest</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fa fa-money-check-alt"></i>
            <p>
              Accounting
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo e(route('utilities.index')); ?>" class="nav-link">
                <i class="nav-icon fa fa-bolt"></i>
                <p>Utilities</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fa fa-user"></i>
            <p>
              Human Resource
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo e(route('employees.index')); ?>" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>Employees</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?php echo e(route('analytics.index')); ?>" class="nav-link bg-warning">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Analytics
            </p>
          </a>
        </li>
        <?php
          $user = auth()->user();
        ?>
        <?php if($user->role != 'standard'): ?>
        <li class="nav-item">
          <a href="/" class="nav-link bg-warning">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Settings

            </p>
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</aside><?php /**PATH C:\xampp\htdocs\laravel\laravel_erp\resources\views/partials/nav.blade.php ENDPATH**/ ?>