<header class="bg-faded">
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Foreign Currencies Exchange</a>
            
               <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    {% if auth %}
                    <li class="nav-item"><a href="{{ urlFor('currencies')}}" class="nav-link">Currencies</a></li>
                    <li class="nav-item"><a href="{{ urlFor('orders') }}" class="nav-link">Orders</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth.first_name }} {{ auth.last_name }}</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ urlFor('change.password') }}">Change Password</a>
                            <a class="dropdown-item" href="{{ urlFor('logout') }}">Logout</a>
                        </div>
                    </li>
                    {% else %}
                    <li class="nav-item"><a href="{{ urlFor('home')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ urlFor('signup') }}" class="nav-link">Sign Up</a></li>
                    {% endif %}

                </ul>
            </div>
        </nav>
    </div>

</header>
