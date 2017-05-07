<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a href="#"> <h3 class="text-center">DASHAJIN</h3> </a>
            </li>
            <li>
                <div class="user-img-div">
                    <img src="/template/img/user.png" class="img-thumbnail" />

                    <div class="inner-text">
                        @if(!Auth::guard('admins')->guest())
                            {{ Auth::guard('admins')->user()->name }}
                            <br />
                            {{ Auth::guard('admins')->user()->email }}
                        @endif
                        <br />
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ url('admin/home') }}"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>
            <li>
                <a href="{{ url('admin/article') }}"><i class="fa fa-book "></i>Articles</a>
            </li>
            <li>
                <a href="{{ url('admin/category') }}"><i class="fa fa-list "></i>Categories</a>
            </li>
            <li>
                <a href="{{ url('admin/comment') }}"><i class="fa fa-comments "></i>Comments</a>
            </li>
        </ul>
    </div>
</nav>