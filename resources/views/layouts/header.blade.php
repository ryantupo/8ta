<body class="antialiased">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <a href="/"><img src="{{ asset('images/8taLogoSmall.png') }}" class="w-30 p-6" alt="8talogo"
                title="" /></a>
    </div>
</body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" style="margin-left:5px;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto" style="margin-left: 1.5rem">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/blog">Blog</a>
            </li>
            @auth
                <li class="nav-item active dropdown">
                    <div class="dropdown">
                        <button onclick="myFunction()" class="nav-link dropbtn"
                            style="background:#f7fafc;margin-top:-7px;">Charts</button>

                        <div id="myDropdown" class="dropdown-content">


                            @foreach (json_decode($usercharts, true) as $data)
                                <div style="display: flex; justify-content: space-between;">
                                    <a href="/chart/{{ $data['id'] }}">{{ $data['chart_name'] }}</a>
                                    <form method="POST" id="delete-form" action="/deletechart/{{ $data['id'] }}">
                                        {{csrf_field()}}
                                        <button name="_method" value="post" type="submit" class="bi bi-trash btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                          </svg></button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="/addchart">+</a>
                </li>
                <li class="nav-item active">
                @endauth

                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/home') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

            </li>
        </ul>
    </div>
</nav>


<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

<style>
    .dropbtn {
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: rgb(255, 255, 255);
    }

    .show {
        display: block;
    }

    .navbar-collapse.in {
        display: block !important;
    }

    .navbar-light .navbar-toggler {
        color: rgba(0, 0, 0, .55);
        border-color: rgba(0, 0, 0, 0) !important;
    }

</style>
