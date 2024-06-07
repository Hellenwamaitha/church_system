<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin/dashboard" class="brand-link">
        <span class="brand-text font-weight-light">Main DashBoard</span>
    </a>
    <style>
        /* CSS to change icon color on hover */
        .nav-item:hover .nav-link i {
            color: #FFD700; /* Change to the desired color */
        }

        /* CSS to add an effect on hover */
        .nav-item:hover .nav-link i {
            filter: brightness(1.2); /* Change brightness on hover */
        }
    </style>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(auth()->user()->profile_picture); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if(Auth::user()->hasRole('finance_officer')): ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Budget Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/finance/offeringtithes/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Offerings and Tithes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/finance/expenses/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expense Tracking</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/finance/financialreport/index" class="nav-link">
                            <i class="fas fa-file-alt mr-2"></i>
                            <p>Financial Reporting</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(Auth::user()->hasRole('admin')): ?>
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/members/index" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Members</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                General Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/events/index" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Event Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/budget/create" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Resource Allocation</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users/index" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>Add Users</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>




<?php /**PATH /home/hellen/managementapp/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>