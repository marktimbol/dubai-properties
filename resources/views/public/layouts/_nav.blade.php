<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Airbnb</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/properties/rent">Rent <span class="sr-only">(current)</span></a>
                </li>
                 <li><a href="/properties/buy">Buy</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Add Property</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Per Emirate <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/properties/city/dubai">Dubai</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if( ! Auth::check() )
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @else
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                             {{ Auth::user()->name }} <span class="caret"></span>
                         </a>
                         <ul class="dropdown-menu">
                             <li><a href="#">Account Settings</a></li>
                             <li><a href="/user/rooms">My Rooms</a></li>
                             <li role="separator" class="divider"></li>
                             <li><a href="#">Separated link</a></li>
                             <li><a href="/logout">Logout</a></li>
                         </ul>
                     </li>
                     
                @endif
            </ul>
        </div>
    </div>
</nav>