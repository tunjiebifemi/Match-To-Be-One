<div class="container">
    <nav class="header-navbar navbar-expand-sm navbar navbar-with-menu navbar-transparent border-grey border-lighten-2">
        <div class="navbar-wrapper mt-3">
            <div class="navbar-header">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="navbar-brand nav-link"><img class="brand-logo" src=" {{asset('app-assets/images/logo/group-16.png')}} "
                                alt="branding logo"></a>
                    </li>
                    <li class="nav-item d-md-none float-right"><a data-toggle="collapse" data-target="#navbar-mobile10"
                            class="nav-link open-navbar-container"><i class="la la-bars pe-2x icon-rotate-right"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content float-right">
                <div id="navbar-mobile10" class="bg-white rounded collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link"></a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ url('/blog') }}" role="button">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>         
   