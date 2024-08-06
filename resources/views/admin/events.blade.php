<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <meta charset="UTF-8">
    <title>Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .events_container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            padding-top: 90px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
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
    <div class="events_container">
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Evénements</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ url('events_create') }}">Créer un neveau événement</a>
                    </div>
                </div>
            </div>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td class="image-cell">
                        <img src="eventimage/{{ $event->image }}" alt="Evénement Image">
                        </td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->description }}</td>
                        <td>
                            <form action="{{ url('events_destroy', $event->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ url('events_edit', $event->id) }}">Modifier</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="confirmation(event)">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- end of main container-->
    <!-- the script part-->
    @include('admin.script')
    <script type="text/javascript">
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title: "Avez-vous sûr de supprimer ceci ?",
                text: "Vous ne pourrez pas annuler cette suppression",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
    <!--end of the script part-->
</body>
</html>
