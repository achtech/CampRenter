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
@endsection

@section('content')
<!-- Content
================================================== -->

<div class="dashboard-content">
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2><strong>{{trans('front.camper_name')}</strong></h2>
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

		<div class="col-lg-7 col-md-12">
			<h3><strong>{{trans('front.calendar')}</strong></h3>
                <div id='calendar'></div>
                <div class="row margin-top-20">
                    <div class="col-md-4">
                        <input type="date" id="fc-date-start" placeholder="{{trans('front.date_start')}">
                    </div>
                    <div class="col-md-4">
                        <input type="date" id="fc-date-end" placeholder="{{trans('front.date_end')}">
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="fc-title" placeholder="title">
                        <button class="button" id="fc-event-save" style="width: 100%"> {{trans('front.save_new_password')} <i class="fa fa-save"></i></button>
                    </div>
                </div>
                <hr>
                <button class="button" id="save-to-database" style="width: 100%"> {{trans('front.apply')}} <i class="fa fa-database"></i></button>

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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid'],
                defaultView: 'dayGridMonth',
                timeZone: 'UTC',
                displayEventTime: false,
                events: [
                    {
                        title: 'Exemple 1',
                        start: '2020-11-11'+'T12:00:00Z',
                        end: '2020-11-14'+'T12:00:00Z',
                    }
                ],
                eventClick: function (info){
                    Swal.fire({
                        title: info.event.title,
                        icon: 'info',
                        html:' <div> <input type="date" id="swal-start" value="'+moment(info.event.start).utc().format('YYYY-MM-DD')+'" placeholder="date Start"> <input type="date" id="swal-end" value="'+moment(info.event.end).utc().format('YYYY-MM-DD')+'" placeholder="date End"> <input type="text" id="swal-title" placeholder="title" value="'+info.event.title+'"> </div>',
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
                            info.event.setStart(date_star+'T12:00:00Z');
                            info.event.setEnd(date_end+'T12:00:00Z');
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
                const date_star = $("#fc-date-start").val();
                const date_end = $("#fc-date-end").val();
                const title = $("#fc-title").val();
                calendar.addEvent({
                    title: title,
                    start: date_star+'T12:00:00Z',
                    end: date_end+'T12:00:00Z',
                });
                $("#fc-date-start").val('');
                $("#fc-date-end").val('');
                $("#fc-title").val('');
            });

            $( "#save-to-database" ).click(function() {
               console.log(calendar.getEvents())
            });
        });
    </script>
@endsection
