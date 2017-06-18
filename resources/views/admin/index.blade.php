@extends('layouts.main')

@section('title', 'Admin')

@section('content')
<div class="container">
  <div id="admin-sidebar" class="container col-md-2 col-sm-3">
    <ul class="nav nav-pills nav-stacked" role="tablist" id="admin-tabs">
      <li role="presentation" class="active"><a href="#schedule" aria-controls="schedule" role="tab" data-toggle="pill">Schedule</a></li>
      <li role="presentation"><a href="#menu" aria-controls="menu" role="tab" data-toggle="pill">Menu</a></li>
    </ul>
  </div>
  <div class="col-md-10 sol-sm-9 tab-content" id="admin-content">
    <div role="tabpanel" class="tab-pane fade in active" id="schedule">
      In officia minim adipisicing ut deserunt excepteur excepteur minim laboris ex aute anim fugiat duis aute minim aliquip laborum velit est dolore officia labore officia irure ut sit nisi ex excepteur ut ea ex eu proident minim dolore excepteur anim labore et consequat non anim ut labore qui dolor ea culpa eiusmod adipisicing est aute nostrud id fugiat ea sunt adipisicing pariatur non deserunt eiusmod commodo excepteur est officia mollit minim reprehenderit eiusmod dolor dolore in ut anim minim incididunt voluptate do culpa culpa duis occaecat consequat dolor magna ex reprehenderit exercitation sed id est non ex eiusmod in eu exercitation sint aliquip ut do nulla sed sunt aliquip magna culpa ut tempor pariatur est quis est consequat reprehenderit aute mollit cupidatat anim ut ut mollit sunt nostrud pariatur in deserunt nisi incididunt laboris labore excepteur anim tempor dolor id veniam et magna sunt aliquip est in cupidatat magna elit exercitation ad nostrud eu commodo duis ea ut velit in nisi nisi labore non irure labore magna magna est sint aliqua non nisi mollit dolore eiusmod anim cillum et consequat in nisi deserunt laborum anim adipisicing proident.
    </div>
    <div role="tabpanel" class="tab-pane fade" id="menu">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, veniam magnam voluptatem ex praesentium officiis natus. Obcaecati rem voluptatibus, minus. Vero praesentium eveniet modi adipisci minus eum earum quasi dolorem.
    </div>
  </div>
</div>
@endsection