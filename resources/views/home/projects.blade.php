<div class="projects section" id="projects">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Nos <em>Publications</em>  <span>Récentes</span></h2>
            <div class="line-dec"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-features owl-carousel">
          @foreach($pub as $pub)
            <div class="item">
              <img src="/pubimage/{{$pub->image}}" alt="">
              <div class="down-content">
                <h4>{{$pub->titre}}</h4>
                <a href="{{url('pub_details',$pub->id)}}"><i class="fa fa-link"></i></a>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>