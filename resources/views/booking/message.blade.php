@extends('layout', ['activePage' => 'booking', 'titlePage' => __('backend.booking_management.lbl')])
@section('content')
{{ Breadcrumbs::render('message_booking',$bookingId) }}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-lg-3 col-xl-2 border-right">
                        <div class="card-body border-bottom">
                            <form>
                                <input class="form-control" type="text" placeholder="Search Contact">
                            </form>
                        </div>
                        <div class="scrollable position-relative" style="height: calc(100vh - 111px);">
                            <ul class="mailbox list-style-none">
                                <li>
                                    <div class="message-center">
                                    @foreach($dataMessOwner as $item)
                                        <!-- Message -->
                                        <a href="javascript:void(0)"
                                            class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                            <div class="user-img"><img src="../assets/images/users/1.jpg"
                                                    alt="user" class="img-fluid rounded-circle"
                                                    width="40px"> <span
                                                    class="profile-status online float-right"></span>
                                            </div>
                                            <div class="w-75 d-inline-block v-middle pl-2">
                                                <h6 class="message-title mb-0 mt-1">{{$item->owner_first_name}} {{$item->owner_last_name}}</h6>
                                                <span
                                                    class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                    {{$item->message}}</span>
                                                <span class="font-12 text-nowrap d-block text-muted">{{$item->date_sent}}</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        @endforeach 
                                        @foreach($dataMessRenter as $item)
                                        <!-- Message -->
                                        <a href="javascript:void(0)"
                                            class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                            <div class="user-img"><img src="../assets/images/users/1.jpg"
                                                    alt="user" class="img-fluid rounded-circle"
                                                    width="40px"> <span
                                                    class="profile-status online float-right"></span>
                                            </div>
                                            <div class="w-75 d-inline-block v-middle pl-2">
                                                <h6 class="message-title mb-0 mt-1">{{$item->renter_first_name}} {{$item->renter_last_name}}</h6>
                                                <span
                                                    class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                    {{$item->message}}</span>
                                                <span class="font-12 text-nowrap d-block text-muted">{{$item->date_sent}}</span>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        @endforeach 
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9  col-xl-10">
                        <div class="chat-box scrollable position-relative"
                            style="height: calc(100vh - 111px);">
                            <!--chat Row -->
                            <ul class="chat-list list-style-none px-3 pt-3">
                                <!--chat Row -->
                                <li class="chat-item list-style-none mt-3">
                                    <div class="chat-img d-inline-block"><img
                                            src="../assets/images/users/1.jpg" alt="user"
                                            class="rounded-circle" width="45">
                                    </div>
                                    <div class="chat-content d-inline-block pl-3">
                                        <h6 class="font-weight-medium">James Anderson</h6>
                                        <div class="msg p-2 d-inline-block mb-1">Lorem
                                            Ipsum is simply
                                            dummy text of the
                                            printing &amp; type setting industry.</div>
                                    </div>
                                    <div class="chat-time d-block font-10 mt-1 mr-0 mb-3">10:56 am
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="card-body border-top">
                            <div class="row">
                                <div class="col-9">
                                    <div class="input-field mt-0 mb-0">
                                        <input id="textarea1" placeholder="Type and enter"
                                            class="form-control border-0" type="text">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <a class="btn-circle btn-lg btn-cyan float-right text-white"
                                        href="javascript:void(0)"><i class="fas fa-paper-plane"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection