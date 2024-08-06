
<!DOCTYPE html>
<html>
<head>
   <base href = "/public">
	@include('admin.css')
    <style>
    .container{
            width: 80%;
            margin : 0 auto;
            padding : 20px;
            padding-top : 90px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
	

<div class="container mt-2">
   <div class="row">
      <div class="col-lg-12 margin-tb">
         <div class="pull-left">
            <h2>Edit event</h2>
         </div>
         <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('events') }}" enctype="multipart/form-data"> Retourner</a>
         </div>
         @if(session()->has('message'))
   <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hideen="true">x</button> 
    {{session()->get('message')}}
   </div>
   @endif
      </div>
   </div>
   @if(session('status'))
   <div class="alert alert-success mb-1 mt-1">
      {{ session('status') }}
   </div>
   @endif
   <form action="{{ url('update_event',$event->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Titre:</strong>
               <input type="text" name="title" value="{{ $event->title }}" class="form-control" placeholder="Event Title">
               @error('title')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Description:</strong>
               <textarea class="form-control" style="height:150px" name="description" placeholder="Event Description">{{ $event->description }}</textarea>
               @error('description')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Date:</strong>
               <input class="date form-control" value="{{ $event->date }}" type="text" name="date" placeholder="Event Date">
               @error('date')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Lieu:</strong>
               <input type="text" name="place" class="form-control" placeholder="Event Place" value="{{ $event->place }}">
               @error('place')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Type:</strong>
               <select class="form-control" name="event_type" id="event_type">
          <option value="">Sélectionner le type d'événement</option>
          <option value="enPersonne">En personne</option>
          <option value="virtual">Virtuelle</option>
        </select>
        @error('event_type')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
      </div>
      </div>
      <div class="row" id="additional_fields">
    <!-- Placeholder for additional fields -->
</div>

         
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <strong>Event Image:</strong>
               <input type="file" name="image" class="form-control" placeholder="Event Title">
               @error('image')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group">
               <img src="{{ Storage::url($event->image) }}" height="200" width="200" alt="" />
            </div>
         </div>
         <button type="submit" class="btn btn-primary ml-3">Submit</button>
      </div>
   </form>
</div>
    <!-- end of main container-->
    <!-- the script part-->
     @include('admin.script')
    <!--end of the script part -->
    <script>
  $(document).ready(function() {
    $('#event_type').change(function() {
      var eventType = $(this).val();
      var additionalFields = $('#additional_fields');
      additionalFields.empty(); // Clear previous fields

      if (eventType === 'enPersonne') {
        additionalFields.append(`
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Type d'événement en personne:</strong>
              <select class="form-control" name="event_enP_type">
                <option value="free">Gratuit</option>
                <option value="paid">Payé</option>
              </select>
            </div>
          </div>
        `);
      } else if (eventType === 'virtual') {
        additionalFields.append(`
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Lien Virtuelle:</strong>
              <input type="text" class="form-control" name="virtual_link" placeholder="Entrez le lien de l'événement">
            </div>
          </div>
        `);
      }
    });
  });
</script>
</body>
</html>