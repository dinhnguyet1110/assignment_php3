
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <h2 class="mt-3 text-white mb-3">Quản trị tin tức</h2>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                    
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarCatalogues" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCatalogues">
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Quản lý loại tin</span> 
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCatalogues">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.category.index') }}" class="nav-link" data-key="t-horizontal">Danh sách</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.category.create') }}" class="nav-link" data-key="t-horizontal">Thêm mới</a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Quản lý tin</span> 
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarProducts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.new.index') }}" class="nav-link" data-key="t-horizontal">Danh sách</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.new.create') }}" class="nav-link" data-key="t-horizontal">Thêm mới</a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Quản lý người dùng</span> 
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarProducts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.user.index') }}" class="nav-link" data-key="t-horizontal">Danh sách</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.user.create') }}" class="nav-link" data-key="t-horizontal">Thêm mới</a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        
        <!-- Left Sidebar End -->