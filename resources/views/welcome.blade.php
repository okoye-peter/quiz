<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- css -->
        <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
        <link rel="stylesheet" href="{{asset('WOW-master/css/libs/animate.css')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background: white
            }
        </style>

    </head>
    <body>
        <div class="container-fluid px-0">
            <div class="container-fluid px-0">
                <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <img id="logo" src="{{asset('image/images.png')}}">
            <div class="container py-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="{{ route('check.result') }}" class="nav-link">Check Result</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact.form') }}" class="nav-link">Contact us</a>
                            </li>
                        </ul>    
                    @endguest
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
                <div class="row" id="firstRow">
                    <div class="container-fluid">
                         {{-- <ul class="nav justify-content-center w-100 p-4 links_wrapper">
                            <img id="logo" src="{{asset('image/images.png')}}">
                            <li class="nav-item links">
                                <a href="/" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item links">
                                <a href="{{ route('check.result') }}" class="nav-link">Check Result</a>
                            </li>
                            <li class="nav-item links">
                                <a href="{{ route('contact.form') }}" class="nav-link">Contact us</a>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    <li class="nav-item links">
                                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                                    </li>
                                @else
                                    <li class="nav-item links">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                @if (Route::has('register'))
                                    <li class="nav-item links">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                                @endauth
                            @endif
                        </ul> --}}
                        <div class="mx-5  wow fadeInDown top__element" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;" id="content">
                            <h6>FUEL YOUR FUTURE</h6>
                            <h1>
                                More Than 3+ <br>
                                Courses Online <aside id="dot"></aside>
                            </h1>
                            <p>
                                Get access to high quality learning wherever you are, with online<br>
                                courses, programs and degrees created by leading universities
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid px-0">
                <div class="row" id="secondRow">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0 wow bounceInUp" data-wow-delay="0.5s">
                        <img src="{{asset('image/tree.jpeg')}}" alt="">
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 p-0 wow bounceInUp"  data-wow-delay="0.5s">
                        <p>
                            Life is a gift that has been given to you. <br> It is in your hands to make the best out of it <br> --dare to believe that you can. <br> Through the ups and downs, you'll find a lesson to learn <br> that will make you a better person. <br> Each experience--good and bad--makes you grow. <br> Get along with life and surely, things will become easier for you. <br> Live for today and enjoy every moment. <br> Capture the best that life has to offer you. <br>
                            <img class="sign" src="{{asset('image/download.png')}}" alt="">
                        </p>
                    </div>
                </div>
            </div>

            <div class="container-fluid px-0">
                <div class="row mb-1">
                    <div class="col-12">
                        <h3 class="text-center">Top Scores......</h3>
                    </div>
                    <div class="container-fluid best">
                        <div class="row justify-content-around">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12 shadow bg-white p-0 circle-item wow flipInY" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: flipInY;">
                                <img src="{{asset('image/download.jfif')}}" alt="" class="rounded">
                                <table class="table table-borderless p-4">
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row"><strong>Name: </strong></th>
                                        <td>Taiwo Adeniyi</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Mathematics: </strong></th>
                                        <td class="text-center">99</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>English: </strong></th>
                                        <td class="text-center">95</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Physics: </strong></th>
                                        <td class="text-center">97</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Chemistry: </strong></th>
                                        <td class="text-center">96</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Aggregate: </strong></th>
                                        <td class="text-center">387</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12 shadow bg-white p-0 circle-item wow flipInY" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: flipInY;">
                                <img src="{{asset('image/IMG_20191215_110330.jpg')}}" alt="" class="rounded">
                                <table class="table table-borderless p-4">
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row"><strong>Name: </strong></th>
                                        <td>Taiwo Adeniyi</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Mathematics: </strong></th>
                                        <td class="text-center">99</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>English: </strong></th>
                                        <td class="text-center">95</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Physics: </strong></th>
                                        <td class="text-center">97</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Chemistry: </strong></th>
                                        <td class="text-center">96</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Aggregate: </strong></th>
                                        <td class="text-center">387</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12 shadow bg-white p-0 circle-item wow flipInY" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: flipInY;">
                                <img src="{{asset('image/Ofure-Mary-Ebhomielen.jpg')}}" alt="" class="rounded">
                                <table class="table table-borderless p-4">
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row"><strong>Name: </strong></th>
                                        <td>Taiwo Adeniyi</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Mathematics: </strong></th>
                                        <td class="text-center">99</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>English: </strong></th>
                                        <td class="text-center">95</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Physics: </strong></th>
                                        <td class="text-center">97</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Chemistry: </strong></th>
                                        <td class="text-center">96</td>
                                      </tr>
                                      <tr>
                                        <th scope="row"><strong>Aggregate: </strong></th>
                                        <td class="text-center">387</td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="container-fluid section-about px-0">
                <h3 class="text-center">About Us.</h3>
                <div class="about"></div>
                <p class="text-center px-0 mx-0">
                    Proin et molestie nisl. Nullam non posuere lacus, sit amet placerat risus. Donec ac dolor in lacus placerat facilisis. Fusce vel ligula tortor. <br> 
                    Mauris volutpat erat libero, eget condimentum tellus congue ut. Aenean molestie mauris luctus, tempor dui sed, tincidunt sapien. <br> 
                    Nam accumsan facilisis ligula, id venenatis nulla ultricies in. Ut maximus mattis erat, in congue ante facilisis sed. <br> 
                    Curabitur placerat suscipit pretium. Donec dapibus tristique aliquet. Proin turpis neque, facilisis vitae maximus quis, <br>
                    faucibus eget quam. Quisque viverra tellus ut porta lobortis. Phasellus quis diam vel libero blandit <br> 
                    blandit id non odio. Morbi venenatis ipsum vulputate purus tempus dapibus. Donec sapien <br>
                    dui, mattis ac odio efficitur, porta molestie ipsum. Nunc vulputate urna eget <br> 
                    eros vehicula, vitae interdum leo porttitor.
                </p>
            </div>
    
            <div class="container-fluid px-0">
                <!-- footer -->
                <footer class="row bg-dark">
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 p-5">
                        <h5>
                            ABOUT US
                        </h5>
                        <P>
                            Etiam laoreet in ex quis efficittur.
                        </P>
                        <div class="d-flex justify-content-around ml-4 mt-2" w-100>
                            <i class="fa fa-map-marker mr-3"></i>
                            <aside>
                                <h5>Address:</h5>
                                <p>Lorem ipsum dolor sit amet, consectur adipiscing elit.</p>
                            </aside>
                        </div>
                        
                        <div class="d-flex justify-content-around ml-4 mt-2">
                            <i class="fa fa-volume-control-phone mr-3"></i>
                            <aside>
                                <h5>Address:</h5>
                                <p>Lorem ipsum dolor sit amet, consectur adipiscing elit.</p>
                            </aside>
                        </div>
        
                        <div class="d-flex justify-content-around ml-4 mt-2">
                            <i class="fa fa-envelope-o mr-3"></i>
                            <aside>
                                <h5>Have any question?</h5>
                                <p>
                                    Okoyep98@gmail.com
                                    ShdowEnd@Hack.net.
                                </p>
                            </aside>
                        </div>
                    </div>
        
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 p-5">
                        <h5>FRESH TWEETS</h5>
                        <div class="d-flex ml-3 mt-2 mb-5">
                            <i class="fa fa-twitter mr-2"></i>
                            <aside>
                                @userthemesrel HTML <br> Version Out Now <br>
                                10 Mins Ago
                            </aside>
                        </div>
                        <div class="d-flex ml-3 mt-2 mb-5">
                            <i class="fa fa-twitter mr-2"></i>
                            <aside>
                                @userthemesrel HTML <br> Version Out Now <br>
                                10 Mins Ago
                            </aside>
                        </div>
                        <div class="d-flex ml-3 mt-2 mb-5">
                            <i class="fa fa-twitter mr-2"></i>
                            <aside>
                                @userthemesrel HTML <br> Version Out Now <br>
                                10 Mins Ago
                            </aside>
                        </div>
                    </div>
        
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 p-5">
                        <h5>
                            LATEST UPDATES
                        </h5>
                        <div class="d-flex ml-4 mt-2 mb-5">
                            <span class="border p-2 mr-3">
                                28
                            <h6>APR</h6>
                            </span>
                            <aside>
                                Rendomised words <br> which dont look <br> eveable.
                            </aside>
                        </div>
                        <div class="d-flex ml-4 mt-2 mb-5">
                            <span class="border p-2 mr-3">
                                29
                            <h6>APR</h6>
                            </span>
                            <aside>
                                Rendomised words <br> which dont look <br> eveable.
                            </aside>
                        </div>
                        <div class="d-flex ml-4 mt-2 mb-5">
                            <span class="border p-2 mr-3">
                                30
                            <h6>APR</h6>
                            </span>
                            <aside>
                                Rendomised words <br> which dont look <br> eveable.
                            </aside>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 p-5">
                        <h5>
                            CONNECT WITH US
                        </h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="button-addon2"  style="font-size:0px"><i style="color:white" class="fa fa-check"></i></button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mt-4 ">
                        <a href="#" title="facebook"><i class="fa fa-facebook-f text-white mt-1"></i></a>
                        <a href="#" title="twitter"><i class="fa fa-twitter text-white mt-1"></i></a>
                        <a href="#" title="google-plus"><i class="fa fa-google-plus text-white mt-1"></i></a>
                        <a href="#" title="instagram"><i class="fa fa-instagram text-white mt-1"></i></a>
                        </div>
                    </div>
                    <div style="background:black;width:100%; text-align:center;padding:1em">
                        <p class="mb-0">
                            &copy; Okoye Magnificent
                        </p>
                    </div>
                </footer>    
            </div>
        </div>        

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="{{asset('WOW-master/dist/wow.min.js')}}"></script>
        
        <script>
            new WOW().init();
        </script>
    </body>
</html>
