@extends('layouts.main')

@section('title', 'Services')

@section('content')
  <div class="container" style="padding-top:51px; padding-bottom: 25px;">
    <h1 class="text-center">Full Schedule</h2>
    <div id="calendar"></div>
  </div>
@endsection

@push('scripts')
  <script>

  $(function() {
    var calendarData = {!! $calendarData !!};
    var events = [];
    $.each(calendarData, function(key,value) {
      var event = {
        title: value.loc_name,
        start: value.starttime,
        end: value.endtime,
        url: '/services/' + value.id,
        address: value.loc_address
      }
      events.push(event);
    });


    $( '#calendar' ).fullCalendar({
      defaultView: 'listMonth',
      aspectRatio: '2.25',
      header: {
        left: 'title',
        center: 'today',
        right: 'prev next listMonth agendaWeek agendaDay'
      },
      scrollTime: '10:00:00',
      events: events,
      eventRender: function(event, element) {
        return event.description;
      }
    });
  });
</script>
@endpush
