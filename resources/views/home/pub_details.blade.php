<!DOCTYPE html>
<html lang="en">

<head>
<base href="/public">
 @include ('home.homecss');
 
 

</head>

<body>

  <!-- ***** Preloader Start ***** -->
   <div id="js-preloader" class="js-preloader">
    @include('home.header')
  </header>
  <!-- ***** Header Area End ***** -->
  
  
  
  <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="item">
                    <img src="/pubimage/{{$pub->image}}" alt="" class="img-fluid rounded">
                    <div class="down-content mt-4">
                        <h3 class="font-weight-bold">{{$pub->titre}}</h3>
                        <p>{{$pub->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!--cotactUs section end-->

  <!-- footer section-->
 
  @include('home.footer')

  <!--footer section end-->

</body>

</html>