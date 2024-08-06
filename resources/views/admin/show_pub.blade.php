<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
       integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" 
        referrerpolicy="no-referrer">
    </script>

    @include('admin.css')
    <style>
       .container{
            width: 80%;
            margin : 0 auto;
            padding : 20px;
            padding-top : 90px;
        }
        .title {
            font-size: 30px;
            font-weight: bold;
            color: black;
            text-align: center;
            margin-bottom: 30px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        .table th {
            background-color: skyblue;
            font-weight: bold;
            text-align: center;
        }
        .image-cell img {
            max-width: 150px;
            max-height: 100px;
            display: block;
            margin: 0 auto;
        }
        .delete-btn {
            background-color: #ff4444;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #cc0000;
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
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-danger">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
               {{ session()->get('message') }}
            </div>
        @endif
        <h1 class="title">Publications Publiées</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pub as $publication)   
                    <tr>
                        <td>{{ $publication->id }}</td>
                        <td>{{ $publication->titre }}</td>
                        <td>{{ $publication->description }}</td>
                        <td class="image-cell">
                            <img src="pubimage/{{ $publication->image }}" alt="Publication Image">
                        </td>
                        <td>
                            <a href="{{ url('delete_pub', $publication->id) }}" class="btn btn-danger" onclick ="confirmation(event)">Supprimer</a>
                            <a href="{{url('edit_pub',$publication->id)}}" class="btn btn-primary">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- end of main container-->
    <!-- the script part-->
    @include('admin.script')
    <script type="text/javascript">
        function confirmation(ev)
        {
            ev.preventDefault();
            var urlToRedirect=ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
           
            swal({
                title:"Avez-vous sûr de supprimer ceci ?",
                text : "Vous ne pourrez pas annuler cette suppression",
                icon : "warning",
                buttons : true,
                dangerMode : true,
            })

            .then((willcancel)=>
            {
              if(willcancel)
              {
                window.location.href=urlToRedirect;
              }
            });
        }
    </script>
    <!--end of the script part -->
</body>
</html>
