<!DOCTYPE html>
<html>
<head>
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
    <!-- form start here-->
<div class="form-container">   
    <h1 class="pub_title">Ajouter publication</h1>
    
@if(session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hideen="true">x</button> 

    {{session()->get('message')}}
</div>

@endif
<form action="{{url('add_pub')}}" method="POST" enctype="multipart/form-data">
    @csrf
	<div class="form-group">
		<label>Titre</label>
		<input class="form-control" type="text" name="titre">
	</div>
	<div class="form-group">
		<label>Contenu</label>
		<textarea class="form-control" name="description"></textarea>
	</div>
	<div class="form-group">
		<label>Image</label>
		<input type="file" class="form-control-file form-control height-auto" name="image">
	</div>
    <div>
    <input class="btn btn-primary" type="submit" value="Submit">
    </div>
	
</form>
</div>
    <!--end of the form section-->
    <!-- main container-->
	@include('admin.script')
    <!-- end of main container-->
</body>
</html>