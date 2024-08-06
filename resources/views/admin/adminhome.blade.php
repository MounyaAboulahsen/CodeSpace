<!DOCTYPE html>
<html>
<head>
	@include('admin.css')
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
	@include('admin.mainContainer')
    <!-- end of main container-->
    <!-- the script part-->
     @include('admin.script')
    <!--end of the script part -->
</body>
</html>