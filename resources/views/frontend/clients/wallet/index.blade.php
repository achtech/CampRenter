@extends('frontend.layout.layout_panel',['activePage'=>'FC_wallet'])
@section('content')

	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Wallet</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Dashboard</li>
							<li>Wallet</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content wallet-totals"><h4>84.50</h4> <span>Withdrawable Balance <strong class="wallet-currency">USD</strong></span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Money-2"></i></div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content wallet-totals"><h4>245.15</h4> <span>Total Earnings <strong class="wallet-currency">USD</strong></span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Money-Bag"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-5">
					<div class="dashboard-stat-content"><h4>3</h4> <span>Total Orders</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Shopping-Cart"></i></div>
				</div>
			</div>

			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-6">
					<div class="dashboard-stat-content"><h4>3</h4> <span>Total Orders</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Shopping-Cart"></i></div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-7">
					<div class="dashboard-stat-content"><h4>3</h4> <span>Total Orders</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Shopping-Cart"></i></div>
				</div>
			</div>
			<!-- Item -->
			<div class="col-lg-2 col-md-6">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4>3</h4> <span>Total Orders</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Shopping-Cart"></i></div>
				</div>
			</div>
		
		</div>

		<div class="row">
			
			<!-- Invoices -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>Earnings <div class="comission-taken">Fee: <strong>15%</strong></div></h4>
					<ul>
						
						<li><i class="list-box-icon sl sl-icon-basket"></i>
							<strong>Sunway Apartment</strong>
							<ul>
								<li class="paid">$99.00</li>
								<li class="unpaid">Fee: $14.50</li>
								<li class="paid">Net Earning: <span>$84.50</span></li>
								<li>Order: #00124</li>
								<li>Date: 01/02/2019</li>
							</ul>
						</li>
						
						<li><i class="list-box-icon sl sl-icon-basket"></i>
							<strong>Sunway Apartment</strong>
							<ul>
								<li class="paid">$67.00</li>
								<li class="unpaid">Fee: $10.05</li>
								<li class="paid">Net Earning: <span>$56.95</span></li>
								<li>Order: #00123</li>
								<li>Date: 22/01/2019</li>
							</ul>
						</li>
						
						<li><i class="list-box-icon sl sl-icon-basket"></i>
							<strong>Sunway Apartment</strong>
							<ul>
								<li class="paid">$122.00</li>
								<li class="unpaid">Fee: $18.30</li>
								<li class="paid">Net Earning: <span>$103.70</span></li>
								<li>Order: #00122</li>
								<li>Date: 18/01/2019</li>
							</ul>
						</li>

					</ul>
				</div>
			</div>
						
			<!-- Invoices -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
					<h4>Payout History</h4>
					<ul>
						
						<li><i class="list-box-icon sl sl-icon-wallet"></i>
							<strong>$84.50</strong>
							<ul>
								<li class="unpaid">Unpaid</li>
								<li>Period: 02/2019</li>
							</ul>
						</li>
								
						<li><i class="list-box-icon sl sl-icon-wallet"></i>
							<strong>$189.20</strong>
							<ul>
								<li class="paid">Paid</li>
								<li>Period: 01/2019</li>
							</ul>
						</li>
		
					</ul>
				</div>
			</div>
			<!-- Copyrights -->
			@include('frontend.layout.footer_panel')
		</div>

	</div>
	<!-- Content / End -->
@endsection