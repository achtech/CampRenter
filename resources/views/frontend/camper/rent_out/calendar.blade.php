@extends('frontend.layout.layout_panel',['activePage'=>'calendar'])
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css"
          integrity="sha512-IBfPhioJ2AoH2nST7c0jwU0A3RJ7hwIb3t+nYR4EJ5n9P6Nb/wclzcQNbTd4QFX1lgRAtTT+axLyK7VUCDtjWA=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.css"
          integrity="sha512-mK6wVf3xsmNcJnp0ZI+YORb6jQBsAIIwkOfMV47DHIiwvkSgR0t7GNCVBiotLQWWR8AND/LxWHAatnja1fU7kQ=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css"
          integrity="sha512-CN6oL2X5VC0thwTbojxZ02e8CVs7rii0yhTLsgsdId8JDlcLENaqISvkSLFUuZk6NcPeB+FbaTfZorhbSqcRYg=="
          crossorigin="anonymous"/>

    <link rel='stylesheet' href='https://unpkg.com/@fullcalendar/list@4.4.2/main.min.css'>
@endsection

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{trans('front.camper_name')}}</strong></h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
{{ Breadcrumbs::render('rentOut') }}
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- sub_menu -->
		@include('frontend.camper.rent_out.sub_menu',['active_page'=>'calendar'])
                <div class="col-lg-6 col-md-12">
                    <h3><strong>{{trans('front.calendar')}}</strong></h3>
                        <div id='calendar'></div>
                        <div class="row margin-top-20">
                            <div class="col-md-4">
                                <input type="text" id="fc-date-start" placeholder="{{trans('front.date_start')}}" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="fc-date-end" placeholder="{{trans('front.date_end')}}" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="fc-title" placeholder="title">
                                <button style="float: right;" class="button" id="fc-event-save"> {{trans('front.save_new_password')}} <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                        <hr>
                </div>
                <div class="col-md-6 col-md-12 margin-bottom-60">
                <form  action="{{route('frontend.camper.saveCalendar')}}" method="POST" id="calendarForm">
                    @csrf
                    <input type="hidden" name="id_campers" value="{{$camper->id}}" />

                    <h4 class="headline margin-bottom-30">{{trans('front.previous_entries')}}</h4>
                    <table id="tableBody" class="basic-table">

                        <tr>
                            <th>{{trans('front.blocked_period')}}</th>
                            <th>{{trans('front.note')}}</th>
                            <th></th>
                        </tr>
                        @if(count($blokedPeriods)==0)
                        <tr>
                            <td colspan="2">{{trans('front.no_data_found')}}</td>
                        </tr>
                        @else
                            @foreach($blokedPeriods as $item)
                                <tr>
                                    <td>
                                    <input type='hidden' name="period[{{$loop->index}}][start]" value="{{date('d-m-Y',strtotime($item->start_date))}}"/>
                                    <input type='hidden' name="period[{{$loop->index}}][end]" value="{{date('d-m-Y',strtotime($item->end_date))}}" />
                                    <input type='hidden' name="period[{{$loop->index}}][title]" value="{{$item->comment}}" />

                                    {{trans('front.from')}} <strong>{{date('d-m-Y',strtotime($item->start_date))}}</strong> {{trans('front.to')}} <strong>{{date('d-m-Y',strtotime($item->end_date))}}</strong> </td>
                                    <td>{{$item->comment}}</td>
                                    <td><a class="delete" href="#"><i class="fa fa-remove"></i></a></td>
                                </tr>
                            @endforeach
                        @endif

                    </table>
                    <div class="row">
                        <div class="col-md-12 margin-top-10">
                        <div style="float: right;">
                            {{Form::submit(trans('front.apply'),['style' => 'width:200px','id'=>'save-to-database','class'=>'button border','name' => 'action'])}}
							{{Form::submit(trans('front.cancel'),['onclick'=>'window.history.go(-1); return false;', 'style' => 'width:200px','class'=>'button border','name' => 'action'])}}
                        </div>
                    </div>
                </form>
            </div>
    </div>

</div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/moment/main.min.js"
            integrity="sha512-vRPhNmrqBLazLcQnrmaezKvTfLXlg91HMt830GlhNln3UcIk9Q/ruFkZLwOEIqwQNHBk3CftwtMJOgT9UOURjw=="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"
            integrity="sha512-bg9ZLPorHGcaLHI2lZEusTDKo0vHdaPOjVOONi4XLJ2N/c1Jn2RVI9qli4sNAziZImX42ecwywzIZiZEzZhokQ=="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.js"
            integrity="sha512-uuua5cS/LUZHEtZiY2s+SRn0h46TbLZjcaf7fztYqdzM+a0t81kw05yLZSjwF3l3lonm53GZ45rSSzAWAwA5Sg=="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"
            integrity="sha512-kebSy5Iu+ouq4/swjgEKwa217P2jf/hNYtFEHw7dT+8iLhOKB5PG5xaAMaVyxRK7OT/ddoGCFrg8tslo8SIMmg=="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src='https://unpkg.com/@fullcalendar/list@4.4.2/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var oldEvent =<?php echo json_encode($blokedPeriods); ?>;
            let calendarEl = document.getElementById('calendar');
            /*var tabEvent = ([{
                    title: oldEvent[0].comment,
                    start: oldEvent[0].start_date,
                    end: oldEvent[0].end_date,
                }]);
*/
            let calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'list','dayGrid'],
                defaultView: 'dayGridMonth',
                displayEventTime: false,
                events: [],
                header: {
                    left: '',
                    center: 'title',
                    right: 'today prev,next'
                },

                eventClick: function (info){
                    Swal.fire({
                        title: info.event.title,
                        icon: 'info',
                        html:' <div> <input type="date" id="swal-start" value="'+moment(info.event.start).format('YYYY-MM-DD')+'" placeholder="{{trans('front.date_start')}}"> <input type="date" id="swal-end" value="'+moment(info.event.end).format('YYYY-MM-DD')+'" placeholder="{{trans('front.date_end')}}"> <input type="text" id="swal-title" placeholder="{{trans('front.title')}}" value="'+info.event.title+'"> </div>',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: `{{trans('front.client_camper_edit')}}`,
                        denyButtonText: `{{trans('front.client_camper_delete')}}`,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const date_star = $("#swal-start").val();
                            const date_end = $("#swal-end").val();
                            const title = $("#swal-title").val();
                            info.event.setProp('title', title);
                            info.event.setStart(date_star);
                            info.event.setEnd(date_end);
                            Swal.fire('Saved!', '', 'success')
                        } else if (result.isDenied) {
                            Swal.fire({
                                title: 'Are you sure?',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    info.event.remove()
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                }
                            })
                        }
                    })
                }
            });

            calendar.render();

            $( "#fc-event-save" ).click(function() {
                const date_star = moment($("#fc-date-start").val()).format('YYYY-MM-DD');
                const date_end = moment($("#fc-date-end").val()).format('YYYY-MM-DD');
                const title = $("#fc-title").val();
                calendar.addEvent({
                    title: title,
                    start: date_star,
                    end: date_end,
                });
                var table = document.getElementById("tableBody");
                var list_calendar = calendar.getEvents();
                var html = "<tr><th>{{trans('front.blocked_period')}}</th><th>Note</th><th></th></tr>";
                var oldEvent =<?php echo json_encode($blokedPeriods); ?>;
                var count = 0;
                if(oldEvent != undefined && oldEvent.length>0){
                    for(count =0;count<oldEvent.length;count++){
                        html += "<tr><td>";
                        html += "<input type='hidden' name='period["+count+"][start]' value='"+moment(oldEvent[count].start_date).format('YYYY-MM-DD')+"'/>";
                        html += "<input type='hidden' name='period["+count+"][end]' value='"+moment(oldEvent[count].end_date).format('YYYY-MM-DD')+"'/>";
                        html += "<input type='hidden' name='period["+count+"][title]' value='"+oldEvent[count].comment+"'/>";
                        html += "{{trans('front.from')}} <strong>"+moment(oldEvent[count].start_date).format('DD-MM-YYYY')+"</strong> {{trans('front.to')}} <strong>"+moment(oldEvent[count].end_date).format('DD-MM-YYYY')+" </strong></td>";
                        html += "<td>"+oldEvent[count].comment+"</td>";
                        html += "<td><a class='delete' href='#'><i class='fa fa-remove'></i></a></td>";
                        html += "</tr>";
                    }
                }

                if(list_calendar != undefined){
                    for(var i =0;i<list_calendar.length;i++){

                        html += "<tr><td>";
                        html += "<input type='hidden' name='period["+count+"][start]' value='"+moment(list_calendar[i].start).format('YYYY-MM-DD')+"'/>";
                        html += "<input type='hidden' name='period["+count+"][end]' value='"+moment(list_calendar[i].end).format('YYYY-MM-DD')+"'/>";
                        html += "<input type='hidden' name='period["+count+"][title]' value='"+list_calendar[i].title+"'/>";
                        html += "{{trans('front.from')}} <strong>"+moment(list_calendar[i].start).format('DD-MM-YYYY')+"</strong> {{trans('front.to')}} <strong>"+moment(list_calendar[i].end).format('DD-MM-YYYY')+" </strong></td>";
                        html += "<td>"+list_calendar[i].title+"</td>";
                        html += "<td><a class='delete' href='#''><i class='fa fa-remove'></i></a></td>";
                        html += "</tr>";
                        count+=1;
                    }
                }
                $("#tableBody").html(html);

                $("#fc-date-start").val('');
                $("#fc-date-end").val('');
                $("#fc-title").val('');
            });
        });
        $(document).on("click", ".delete", function(e) {
                e.preventDefault();
                $(this).parent().parent().remove();
            });

    </script>
@endsection
