<div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{asset('assets/admin')}}/images/lingga-logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{asset('assets/admin')}}/images/lingga.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{asset('assets/admin')}}/images/lingga-logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{asset('assets/admin')}}/images/lingga.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-item {{ Request::is('admin')?'menuitem-active':'' }}">
                <a href="{{url('admin')}}" class="side-nav-link">
                    <i class="fa-solid fa-house"></i>
                    <span> Home </span>
                </a>
            </li>
            <li class="side-nav-item {{ Request::is('article')?'menuitem-active':'' }}">
                <a href="{{url('admin/article')}}" class="side-nav-link">
                    <i class="fa-regular fa-file-lines"></i>
                    <span> Artikel </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="fa-solid fa-gear"></i>
                    <span> Landing Page </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{url('admin/feature')}}">Feature</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Products Details</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-orders.html">Orders</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-orders-details.html">Order Details</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-customers.html">Customers</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-shopping-cart.html">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-checkout.html">Checkout</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-sellers.html">Sellers</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>