<body class="antialiased">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/901630e084.js" crossorigin="anonymous"></script>

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




    <div style="float:left;" class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto" style="margin-left: 1.5rem">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/blog">Blog</a>
            </li>
            @auth
                <li class="nav-item active">
                    <a class="nav-link" href="/favourites">Favourites</a>
                </li>
                <li class="nav-item active dropdown">
                    <div class="dropdown">
                        <button onclick="myFunction()" class="nav-link dropbtn"
                            style="background:#f7fafc;margin-top:-7px;">Charts</button>

                        <div id="myDropdown" class="dropdown-content">


                            @foreach (json_decode($usercharts, true) as $data)
                                <div>
                                    <div style="display: flex; justify-content: space-between;">
                                        <a href="/chart/{{ $data['id'] }}">{{ $data['chart_name'] }}</a>
                                        <form method="POST" id="delete-form" action="/deletechart/{{ $data['id'] }}" style="margin:auto;">
                                            {{ csrf_field() }}
                                            <button style="" name="_method" value="post" type="submit"
                                                class="bi bi-trash btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-trash"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg></button>
                                        </form>



                                        <div style="margin:auto;">
                                            <form method="POST" id="favourite-form"
                                                action="/favouriteChart/{{ $data['id'] }}">
                                                {{ csrf_field() }}
                                                <button style="margin:auto;" name="_methodFavourite"
                                                    value="post" type="submit">

                                                    @if ($data['if_favourite'] == 1)
                                                        <span style="color: goldenrod;">

                                                            <i color:yellow; class="fa-solid fa-star"></i>

                                                        </span>
                                                    @else
                                                        <i color:yellow; class="fa-solid fa-star"></i>
                                                    @endif
                                                </button>
                                            </form>

                                        </div>

                                        <div style="margin:auto">
                                            <div style="">
                                                <a href="/editchart/{{ $data['id'] }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg></a>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                <li class="nav-item active">
                    <a class="nav-link" href="/addchart">+</a>
                </li>
        </div>
        </li>

    @endauth
    </ul>
    </div>
    <ul style="float:right;" class="navbar-nav mr-auto">
        <li class="nav-item active">

            @if (Route::has('login'))
                <div class="top-0 right-0 px-6 py-4 ">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><i
                                class="fa-solid fa-user"></i></a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><i
                                class="fa-solid fa-right-to-bracket"></i></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><i
                                    class="fa-solid fa-user-plus"></i></a>
                        @endif
                    @endauth
                </div>
            @endif
        </li>
    </ul>
</nav>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show w-50 m-3" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@if ($message = Session::get('fail'))
<div class="alert alert-danger alert-dismissible fade show w-50 m-3" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

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
    .login-mobile {}

    @media only screen and (min-width: 992px) {
        .login-mobile {
            display: none;
             !important
            /* remove the element from page and DOM. */
            visibility: hidden;
             !important;
        }
    }

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
