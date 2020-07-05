<nav class="main-header navbar navbar-expand navbar-light navbar-warning">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item  d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="POST" action="{{ route('search_client') }}">
        @csrf
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" id="search" name="client_info" type="search"
                placeholder="Search Client" aria-label="Search" autocomplete="off" maxlength="10" required
                data-placement="right" rel="tooltip" title="Search the client first to sell an item.">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>





    <ul class="navbar-nav ml-auto">


        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset('img/avatar.png')}}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">
                    @php
                    $user = auth()->user();
                    @endphp
                    {{$user->first_name}} {{$user->last_name}}
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-warning">
                    <img src="{{asset('img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">

                    <p>
                        {{$user->first_name}} {{$user->last_name}}
                        <small style="text-transform: uppercase;">{{$user->role}}</small>
                    </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('purchases.index') }}" class="btn btn-warning btn-flat float-left"
                        data-placement="bottom" rel="tooltip" title="Receive Orders">
                        <i class="fa fa-truck"></i>
                    </a>
                    <a href="{{ route('payments') }}" class="btn btn-warning btn-flat float-left"
                        data-placement="bottom" rel="tooltip" title="Process Payment">
                        <i class="fa fa-file-invoice-dollar"></i>
                    </a>
                    <a href="{{ route('employees.index') }}" 
                        class="btn btn-warning btn-flat float-left"
                        data-placement="bottom" rel="tooltip" title="Daily Time Record">
                        <i class="fa fa-clock"></i>
                    </a>

                    
                    <a href="{{ route('logout') }}" class="btn btn-warning btn-flat float-right"
                        data-placement="bottom" rel="tooltip" title="Logout">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>
                    <a href="{{ route('users.edit', $user->id)}}" class="btn btn-warning btn-flat float-right" 
                        data-placement="bottom" rel="tooltip" title="Edit Profile">
                        <i class="fa fa-user-edit"></i>
                    </a>
                    
                </li>

                
            </ul>
        </li>
    </ul>

    
</nav>


<!-- /.navbar -->
<script>
    $(document).ready(function () {
        $('[rel="tooltip"]').tooltip({
            trigger: "hover"
        });

        $('#search').focus();

    });

</script>
