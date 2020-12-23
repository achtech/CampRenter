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
                            <input type="date" id="fc-date-start" placeholder="{{trans('front.date_start')}}">
                        </div>
                        <div class="col-md-4">
                            <input type="date" id="fc-date-end" placeholder="{{trans('front.date_end')}}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="fc-title" placeholder="title">
                            <button style="float: right;" class="button" id="fc-event-save"> {{trans('front.save_new_password')}} <i class="fa fa-save"></i></button>
                        </div>
                    </div>
                    <hr>
            </div>
            <div class="col-md-6 col-md-12 margin-bottom-60">

                <h4 class="headline margin-bottom-30">Previous entries</h4>
                <table id="tableBody" class="basic-table">

                    <tr>
                        <th>Blocked period</th>
                        <th>Note</th>
                    </tr>
                    <tr>
                        <td colspan="2">No data Found</td>
                    </tr>

                </table>
                <div class="row">
                    <div class="col-md-12 margin-top-10">
                    <div style="float: right;">
                    <button id="save-to-database" type="submit" class="button">{{trans('front.apply')}} <i class="fa fa-check-circle"></i></button>
                    <button onclick="window.history.go(-1);" class="button">{{trans('front.cancel')}} <i class="fa fa-check-circle"></i></button>
                    </div>
                </div>
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
            let calendarEl = document.getElementById('calendar');

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
                        html:' <div> <input type="date" id="swal-start" value="'+moment(info.event.start).format('YYYY-MM-DD')+'" placeholder="date Start"> <input type="date" id="swal-end" value="'+moment(info.event.end).format('YYYY-MM-DD')+'" placeholder="date End"> <input type="text" id="swal-title" placeholder="title" value="'+info.event.title+'"> </div>',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: `Update`,
                        denyButtonText: `Remove`,
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
                                text: "You won't be able to revert this!",
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
                var html = "<tr><th>Blocked period</th><th>Note</th><th></th></tr>";
                if(list_calendar != undefined){
                    for(var i =0;i<list_calendar.length;i++){
                        html += "<tr><td>"+moment(list_calendar[i].start).format('DD-MM-YYYY')+" To "+moment(list_calendar[i].end).format('DD-MM-YYYY')+"</td>";
                        html += "<td>"+list_calendar[i].title+"</td>";
                        html += "<td><a >Delete</a></td>";
                        html += "</tr>";
                    }
                }
                $("#tableBody").html(html);

                $("#fc-date-start").val('');
                $("#fc-date-end").val('');
                $("#fc-title").val('');
            });

            $( "#save-to-database" ).click(function() {
                var list_calendar = calendar.getEvents();
                alert(list_calendar);
                var camperId = {{$camper->id}};
                $.ajax({
                    url: '/rentOut/saveCalendar',
                    type: 'post',
                    data: {periods:list_calendar,id_campers : camperId},
                    success: function(response){
                        console.log(response);
                    }
                });
            });
        });
    </script>
@endsection
