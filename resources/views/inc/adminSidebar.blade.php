<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="mt-5 ml-2 main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        @if (Auth::user())
          <li class=" nav-item"><a class="sidebar-txt-hov" href="{{ url('/explore') }}"><i class="la la-th-large"></i><span class="menu-title">Explore</a>
          </li>
        @endif
          <li class="nav-item"><a class="sidebar-txt-hov" href="{{ url('/about') }}"><i class="la la-question-circle"></i><span class="menu-title">About</span></a>
          </li>
          <li class="nav-item"><a class="sidebar-txt-hov" href="{{ url('/blog') }}"><i class="la la-pencil-square"></i><span class="menu-title">Blog</span></a>
          </li>
        @if (Auth::user())
          <li class="nav-item"><a class="sidebar-txt-hov" href="{{ url('/friends') }}"><i class="la la-dot-circle-o"></i><span class="menu-title">Friends</span></a>
          </li>
          <li class="nav-item"><a class="sidebar-txt-hov" href="{{ url('/friendRequest') }}"><i class="la la-dot-circle-o"></i><span class="menu-title">Friend Requests</span></a>
          </li>
          <li class="nav-item"><a class="sidebar-txt-hov" href="{{ url('/chat') }}"><i class="la la-comments"></i><span class="menu-title">Chat</span></a>
          </li>
        @endif

        
      
        <li class="mt-5 nav-item">
          <a class="sidebar-txt-hov" href=" {{ route('adminDashboard') }} "><span class="menu-title">Dashboard</span></a>
        </li>
        <li class=" nav-item">
          <a class="sidebar-txt-hov" href=" {{ route('viewUsers') }} "><span class="menu-title">Users</span></a>
        </li>
        @if(Auth::user()->super_admin)                    
          <li class=" nav-item">
            <a class="sidebar-txt-hov" href=" {{ route('adminRole') }} "><span class="menu-title">Roles</span></a>
          </li>
        @endif
        <li class=" nav-item">
          <a class="sidebar-txt-hov" href=" {{ url('contact') }} "><span class="menu-title">Contact</span></a>
        </li>
        @if (Auth::user())
          <li class=" nav-item mt-5">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            ><span class="menu-title btn btn-orange btn-block"><b>Logout</b></span></a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>

          </li>
        @endif
        <!-- <button type="submit" class="btn btn-primary mt-1">Submit</button> -->
      </ul>
    </div>
</div>