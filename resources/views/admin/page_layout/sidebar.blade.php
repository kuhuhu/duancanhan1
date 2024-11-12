       <aside class="left-sidebar" data-sidebarbg="skin5">
           <!-- Sidebar scroll-->
           <div class="scroll-sidebar">
               <!-- Sidebar navigation-->
               <nav class="sidebar-nav">
                   <ul id="sidebarnav" class="p-t-30">
                       <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('admin') }}" aria-expanded="false"><i
                                   class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                       <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('admin.account') }}" aria-expanded="false"><i
                                   class="mdi mdi-chart-bar"></i><span class="hide-menu">User Management</span></a></li>
                       <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('admin.category') }}" aria-expanded="false"><i
                                   class="mdi mdi-chart-bubble"></i><span class="hide-menu">Category
                                   Management</span></a></li>
                       <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('admin.product') }}" aria-expanded="false"><i
                                   class="mdi mdi-border-inside"></i><span class="hide-menu">Product
                                   Management</span></a></li>
                       <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('admin.order') }}" aria-expanded="false"><i
                                   class="mdi mdi-receipt"></i><span class="hide-menu">Order
                                   Management</span></a></li>

                       <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                               href="{{ route('homepage') }}" aria-expanded="false"><i
                                   class="mdi mdi-blur-linear"></i><span class="hide-menu">Return to the user
                                   page</span></a></li>
                   </ul>
               </nav>
               <!-- End Sidebar navigation -->
           </div>
           <!-- End Sidebar scroll-->
       </aside>
