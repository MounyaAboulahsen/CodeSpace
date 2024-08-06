<!DOCTYPE html>
<html>
<head>
    <base href="/public/admincss/vendor/">

    @include('admin.css')
	
   <style>
        .form-container{
            width: 80%;
            margin : 0 auto;
            padding : 20px;
            padding-top : 90px;
        }
        .form-group{
            margin-bottom : 20px;
        }
        .form-label{
            font-weight : bold;
        }
    </style>

   

</head>
<body>
    <!--preLoader-->
	@include('admin.preLoader')
    <!--preLoader-->
    <!-- header-->
	@include('admin.header')
    <!--end of header-->
    <!-- right sidebar-->
	@include('admin.rightSideBar')
    <!--end of right sidebar-->
    <!--left side bar-->
	@include('admin.leftSideBar')
    <!-- end of left sidebar-->
    <!-- main container-->
    <div class="form-container"> 
    @if(session()->has('message'))
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hideen="true">x</button> 

    {{session()->get('message')}}
   </div>

   @endif

    <h1 class="pub_title">Modifier publication</h1>
       <form action="{{url('update_pub',$pub->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="form-group">
		<label>Titre</label>
		<input class="form-control" type="text" name="titre" value="{{$pub->titre}}">
	</div>
	<div class="form-group">
		<label>Contenu</label>
		<textarea class="form-control" name="description" >{{$pub->description}}</textarea>
	</div>
    <div>
        <label>Ancienne image</label>
        <img height="100px" width="180px" src="/pubimage/{{$pub->image}}">
    </div>
	<div class="form-group">
		<label>Mettre à jour l'image</label>
		<input type="file" class="form-control-file form-control height-auto" name="image">
	</div>
    <div>
    <input class="btn btn-primary" type="submit" value="Modifier">
    </div>
       </form>
    </div>
	
    <!-- end of main container-->
    <!-- the script part-->
     @include('admin.script')
    <!--end of the script part -->
</body>
</html>