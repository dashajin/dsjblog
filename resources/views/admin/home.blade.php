@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.leftnav')
<div id="wrapper">
    <!-- /. NAV TOP  -->
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <!-- <div id="page-inner"> -->
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">DASHBOARD</h1>
                <h1 class="page-subhead-line text-center" style="font-size: 40px;">{{ config('app.admin.motto') }}</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-3">
                <div class="main-box mb-red">
                    <a href="#">
                        <i class="fa fa-bolt fa-5x"></i>
                        <h5>Zero Issues</h5>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="main-box mb-dull">
                    <a href="#">
                        <i class="fa fa-plug fa-5x"></i>
                        <h5>40 Task In Check</h5>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="main-box mb-pink">
                    <a href="#">
                        <i class="fa fa-dollar fa-5x"></i>
                        <h5>200K Pending</h5>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="main-box mb-blue">
                    <a href="#">
                        <i class="fa fa-user fa-5x"></i>
                        <h5>600 Users</h5>
                    </a>
                </div>
            </div>

        </div>
        <!-- /. ROW  -->
        <hr />
        <!--/.Row-->
        <!-- </div> -->
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
@endsection


