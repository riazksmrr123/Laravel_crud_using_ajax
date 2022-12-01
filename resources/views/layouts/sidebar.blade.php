<div class="hold-transition sidebar-mini layout-fixed">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('customers') }}" class="brand-link">
            <div style="text-align: center">
                <span class="brand-text font-weight-light mx-auto">Dashboard</span>
            </div>
        </a>
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item" id="city">
                        <a href="#" class="nav-link">
                            <i class="mr-1 fas fa-city"></i>
                            <p>
                                Cities
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('cities/index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('cities/add') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul> 
                    </li>
                        {{-- customers manue --}}
                    <li class="mr-1 nav-item" id="customer">
                        <a href="#" class="nav-link">
                            <i class="fa fa-solid fa-user"></i>
                            <p>
                                Customers
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ url('customers') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" id="addCustomer_menu" class="nav-link">
                                        {{-- <a href="addnewcity" class="nav-link"> --}}
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                    </li>
                    {{-- end customers manue --}}

                    {{-- product manue --}}
                    <li class="nav-item" id="product">
                        <a href="#" class="nav-link">
                            <i class="mr-1 fa fa-sharp fa-solid fa-circle"></i>
                            <p>
                                Products
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ url('products/index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('products/create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                    </li>
                    {{-- end product manue --}}

                    {{-- orders --}}
                    <li class="nav-item" id="orders">
                        <a href="#" class="nav-link">
                            <i class="mr-1 fa fa-solid fa-file-invoice"></i>
                            <p>
                                Orders
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ url('orders/index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ url('products/create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li> --}}
                            </ul>
                    </li>

                    {{-- ./orders --}}

                   
                </ul>
            </nav>

            {{-- end customers menue --}}
        </div>
    </aside>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
