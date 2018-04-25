<aside class="main-sidebar sidebar-dark">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            @if(Auth::user())
                <div class="pull-left image">
                    <img src="/images/user.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
                </div>
            @endif
        </div>
            <ul class="sidebar-menu">
                <li class="header">Barra de Navegación</li>
                <li class="{{ \App\Helpers\Menu::activeMenu('dashboard') }}"><a href="{{ route('admin.dashboard') }}"><i
                                class="fa fa-list"></i> <span>Formulario</span></a></li>
                <li class="{{ \App\Helpers\Menu::activeMenu('grades') }}"><a href="{{ route('admin.grades') }}"><i
                                class="fa fa-tags"></i> <span>Configuraciones</span></a></li>
                <li class="{{ \App\Helpers\Menu::activeMenu('user') }}"><a href="{{ url('admin/user') }}"><i
                                class="fa fa-user"></i> <span>Usuarios</span></a></li>
            </ul>
    </section>
    <!-- /.sidebar -->
</aside>