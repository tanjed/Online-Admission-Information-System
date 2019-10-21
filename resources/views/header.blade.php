<nav class="navbar navbar-expand-sm bg-dark">
    <a class="navbar-brand text-light" href="{{URL::to('/')}}">Online Admission Information System</a>
    <ul class="navbar-nav" style="width: 100%">
        <li class="nav-item">
            <a href="{{URL::to('/blog/timeline')}}" class="nav-link text-light" style="">Blog</a>
        </li>
        <li class="nav-item" >
            <a href="{{URL::to('/search')}}" class="nav-link text-light" style="">Search</a>
        </li>

        @auth
        <li class="nav-item" style="margin-left: 70%">
            <a class="nav-link text-light">{{auth('student')->user()->name}}</a>
        </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{URL::to(route('student.logout'))}}" >Logout</a>
            </li>
        @else
        <li class="nav-item" style="margin-left: 70%">
            <span class="nav-link text-light"><a class="text-light" href="{{URL::to(route('student.signin.show'))}}">Login </a>/ <a class="text-light" href="{{URL::to(route('student.signup.show'))}}">Registration</a></span>
        </li>
        @endauth

    </ul>
</nav>