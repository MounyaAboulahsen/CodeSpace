<!DOCTYPE html>
<html lang="en">

<head>

 @include ('home.homecss');

</head>

<body>

  <!-- ***** Preloader Start ***** -->
   <div id="js-preloader" class="js-preloader">
    @include('home.header')
  </header>
  <!-- ***** Header Area End ***** -->
  <!-- banner section-->

  @include('home.banner')

   <!-- banner section end-->
   <!-- services section-->

   @include('home.services')

  <!--end of serivces section-->
   <!--projects section-->
   @include('home.projects')
  <!--projects section end-->

  <!--infos section-->

 

  <!--infos section end-->

  <!--contactUs section-->

  @include('home.contactUs')

  <!--cotactUs section end-->

  <!-- footer section-->
 
  @include('home.footer')

  <!--footer section end-->

</body>

</html>