
<?php 
     use App\Setting;

     $setting=Setting::first();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="" >
        <title> approots | one page </title>
         <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/media.css')}}">
        <script src="{{asset('js/html5shiv.min.js')}}"></script>
        <script src="{{asset('js/respond.min.js')}}"></script>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <header>

           <nav class="navbar navbar-default navbar-fixed-top " id="myScrollspy" >
                @foreach ($errors->all() as $error)
        <p class="alert alert-danger" >{{ $error }}</p>
        @endforeach
        @if (session('status'))
        <div class="alert alert-success"  role="alert">
            {{ session('status') }}
           
        </div>
        @endif

        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html"><img class="navbar-brand hvr-grow" alt="logo" src="{{ route('image_show', $setting->icon)}}"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav  navbar-right">
                    <li class="active"><a href="#">home</a></li>
                    <li><a href="#service">service</a></li>
                    <li><a href="#about">about us</a></li>
                    <li><a href="#portfolio">portfolio </a></li>
                    <li><a href="#contact">contact </a></li>
                    <li><a href="#contact">contact </a></li>


                </ul>
            </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
    </nav>
<!-- end nav--> 
<!----- start img in head---->
            <div class="img-head">

                 <img src="{{ route('image_show', $setting->cover)}}" alt="" width="100%" height="100%">
             {{--   <img src="{{asset('img/backround2.png')}}" width="100%"  alt=""> --}}
            </div>
<!---- end img in head ------>            
        </header>
        <main>
            <section class="container" id="service">
                <div class="row">
                   
                     
                     @foreach($services as $service)
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                        <div class="serv text-center">
                            <div class="serv-data">
                                 <img src="{{ route('image_show', $service->image)}}" alt="" >
                                <h3> {{ $service->name }}</h3>
                                <p> {{ $service->desc }}  </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <section class=" about-us" id="about">
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-12 about text-center">
                            <h4> approot team </h4>
                            <p> {{ $setting->desc }}</p>
                            <img src="{{ route('image_show', $setting->icon)}}" alt="" width="1px" height="1px">
                        </div>
                    </div>
                </div>
            </section>
            <section class="container  " id="portfolio">
                <div class="row">
 @foreach($projects as $project)
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                        <div class="prod">
                            
                               
                                 <div class="prod-content">
                                <a href="prodinfo.html"> {{$project->name }}</a>
                            </div>
                            <a href="{{ $project->url }}">
                                <img src="{{ route('image_show', $project->image)}}" alt="" width="200px" height="200px">
                            </a>
                              
                        </div>
                    </div>
 @endforeach 
                </div>
            </section>
        </main>
        <footer class="foot" id="contact">
            <section class="container">
                <div class="row">
                    
                    <div class="col-lg-4  col-md-6 col-sm-6 col-xs-6 text-center">
                        <div class="foot-data ">
                            <img src="{{ route('image_show', $setting->icon)}}" alt="" width="1px" height="1px">
                             <p> {{ $setting->desc }}</p>
                        </div>
                    </div>
                  
                              <div class=" col-lg-4 col-lg-offset-3 col-md-6 col-sm-6 col-xs-6 text-center ">
                        <div class="contact">
                            <h4> contact us via</h4>
                           

                            @foreach($emails as $email)
                             <div class="contact-sec">
                                 <a href="#">
                                    <img src="{{asset('img/gmail.png')}}" alt="">
                                     <p>{{ $email->email }}</p>
                                 </a>
                            </div>
                            @endforeach
                            @foreach($socials as $social)
                             <div class="contact-sec">
                                 <a href="#">
                                      <img src="{{ route('image_show', $social->image)}}" >
                                     <p>{{ $social->url }}</p>
                                 </a>
                            </div>
                            @endforeach
                              @foreach($mobiles as $mobile)
                             <div class="contact-sec">
                                 <a href="#">
                                    <img src="{{asset('img/viber.png')}}" alt="">
                                     <p>{{ $mobile->mobile }}</p>
                                 </a>
                            </div>
                            @endforeach
                        </div>
                    </div>



                    



                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center subscribe">
                        <h5>SUBSCRIBE NEWSLETTER</h5>
                        <form class="form-inline" action="{{ route('site.subscribe')}}" method="post" >
                            {{csrf_field()}}
                              <div class="form-group mb-2">
                                <label  class="sr-only">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="type your mail" >
                              </div>
                              <button type="submit" class="btn btn-primary mb-2">subscribe</button>
                            </form>
                    </div>
                </div>
            </section>
        </footer>
    <!--- js linkes-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/fontawesome-all.min.js')}}"></script>
        <script src="{{asset('js/smooth-scroll.polyfills.min.js')}}"></script>
        <script src="{{asset('js/appro.js')}}"></script>
    </body>
</html>