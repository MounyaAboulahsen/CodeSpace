<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Booking</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .btn-purple {
      background-color: #6a0dad;
      border-color: #6a0dad;
      color: white;
      padding: 10px 20px;
    }
    .btn-purple:hover {
      background-color: #5a0b8e;
      border-color: #5a0b8e;
    }
    .service-item .icon {
      width: 100%;
    }
    .service-item .icon img {
      border-radius: 0;
      width: 100%;
      height: auto;
    }
  </style>
</head>
<body>

<div class="services section" id="services">
  <div class="container">
    <div class="row">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Consultez et participez<em> à nos événements</em></h2>
          </div>
        </div>
        <div class="col-lg-6 col-sm-6">
          @foreach($event as $event)
            <div class="service-item">
              <div class="icon">
                <img src="/eventimage/{{$event->image}}" alt="" class="templatemo-feature">
              </div>
              <h4>{{$event->title}}</h4>
              <p>{{$event->description}}</p>
              <p>Date: {{ date('d/m/Y', strtotime($event->date)) }}</p>
              <p>{{ ucfirst($event->event_type) }}</p>
              <h6>Lieu: {{ $event->place }}</h6>

              @if($event->event_type == 'enPersonne')
                <div>{{ ucfirst($event->event_enP_type) }}</div>
              @elseif($event->event_type == 'virtual')
                <div>Lien : <a href="{{ $event->virtual_link }}">{{ $event->virtual_link }}</a></div>
              @endif

              <button type="button" class="btn btn-purple event_book button" data-toggle="modal" data-title="{{ $event->title }}" data-event-type="{{ $event->event_type }}" data-event-enp-type="{{ $event->event_enP_type }}" data-target="#exampleModal">Réservez une place</button>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Réservez votre place</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/event_attendies') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Prénom :</label>
            <input type="text" class="form-control" name="name">
            <input type="hidden" name="title" class="form-control title" value=''>
            <input type="hidden" name="event_type" class="form-control event_type" value=''>
            <input type="hidden" name="event_enP_type" class="form-control event_enP_type" value=''>
          </div>
          <div class="form-group">
            <label for="recipient-email" class="col-form-label">Email:</label>
            <input type="text" name="email" class="form-control" id="recipient-email">
          </div>
          <div class="form-group">
            <label for="recipient-phone" class="col-form-label">Téléphone:</label>
            <input type="text" name="phone" class="form-control" id="recipient-phone">
          </div>
          <div class="form-group payment-method" style="display: none;">
            <label for="payment-method" class="col-form-label">Méthode de paiement:</label>
            <select name="payment_method" class="form-control" id="payment-method">
              <option value="offline">Paiement hors ligne</option>
              <option value="online">Paiement en ligne</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-purple">Soumettre</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('.event_book').on('click', function() {
      var title = $(this).data('title');
      var eventType = $(this).data('event-type');
      var eventEnPType = $(this).data('event-enp-type');
      $('.title').val(title);
      $('.event_type').val(eventType);
      $('.event_enP_type').val(eventEnPType);

      if (eventEnPType === 'paid') {
        $('.payment-method').show();
      } else {
        $('.payment-method').hide();
      }
    });

    // Handle form submission
    $('form').submit(function(event) {
      event.preventDefault(); // Prevent default form submission
      var paymentMethod = $('#payment-method').val();

      // If payment method is online and event type is paid, redirect to PayPal
      if (paymentMethod === 'online') {
        var eventEnPType = $('.event_enP_type').val();
        if (eventEnPType === 'paid') {
          // You can modify this URL to redirect to the appropriate PayPal page
          window.location.href = 'https://www.paypal.com'; // Example PayPal URL
          return;
        }
      }

      // For other cases or offline payments, submit the form normally
      this.submit();
    });
  });
</script>


</body>
</html>
