

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <li {{ request()->is('admin') ? 'class=nav-item active': 'class=nav-item'}}>
        <a href="{{ route('admin')}}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
            Inicio
            </p>
        </a>
        </li>
        <li class="nav-item has-treeview menu-open {{ Request::is('admin.posts*') ? 'active': ''}}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Blog
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    {{-- <a href="{{route('admin.posts.index')}}" {{ request()->is('/admin/posts') ? 'class=nav-link active': 'class=nav-link'}} > --}}
                        <a href="{{route('admin.posts.index')}}" class="nav-link {{ Request::is('/admin/posts') ? 'active': ''}}" >
                        <i class="far fa-eye"></i>
                        <p>Ver todos los posts</p>
                    </a>
                </li>
                <li class="nav-item" data-toggle="modal" data-target="#exampleModal">
                    @if(Request::is('admin/posts/*'))
                        <a href="{{ route('admin.posts.index', '#create')}}" class="nav-link">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                            <p>Crear un post</p>
                        </a>
                    @else
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-pencil-alt"></i>
                            <p>Crear un post</p>
                        </a>
                    @endif
                </li>
            </ul>
        </li>
    </ul>
  </nav>
