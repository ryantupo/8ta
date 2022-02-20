<body class="antialiased">
    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <a href="/"><img src="{{ asset('images/8taLogoSmall.png') }}" class="w-30 p-6" alt="8talogo" title="" /></a>
    </div>
</body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
                    <button onclick="myFunction()" class="nav-link dropbtn" style="background:#f7fafc;margin-top:-7px;">Charts</button>

                    <div id="myDropdown" class="dropdown-content">

                    @foreach (json_decode($usercharts, true) as $data)

                    <a href="/chart/{{ $data['id'] }}">{{ $data['chart_name'] }}</a>
                        @endforeach
                    </div>
                  </div>
            </li>

            @endauth
            <li class="nav-item active">

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
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown a:hover {background-color: rgb(255, 255, 255);}

    .show {display: block;}
    </style>


