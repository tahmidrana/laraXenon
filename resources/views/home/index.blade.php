@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-3">
            <a href="#">
                <div class="xe-widget xe-counter xe-counter-blue" data-count=".num" data-from="0" data-to="50" data-duration="2" data-easing="false" data-delay="0">
                    <div class="xe-icon">
                        <i class="linecons-user"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num">50</strong>
                        <span>Total Client</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a href="#">
                <div class="xe-widget xe-counter xe-counter-turquoise" data-count=".num" data-from="0" data-to="120" data-suffix="" data-duration="2" data-easing="false" data-delay="0">
                    <div class="xe-icon">
                        <i class="fa-clipboard"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num">120</strong>
                        <span>Total Complaints</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a href="#">
                <div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="0" data-to="45" data-duration="2" data-easing="true" data-delay="0">
                    <div class="xe-icon">
                        <i class="fa-file-text"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num">45</strong>
                        <span>Total Advice</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a href="#">
                <div class="xe-widget xe-counter xe-counter-red"  data-count=".num" data-from="0" data-to="73" data-prefix="" data-suffix="" data-duration="2" data-easing="true" data-delay="0">
                    <div class="xe-icon">
                        <i class="fa fa-2x fa-file"></i>
                    </div>
                    <div class="xe-label">
                        <strong class="num">73</strong>
                        <span>Total Case</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php
        //$user = Auth::user();
        //echo $user->hasRole('admin') ? 'Yes' : 'No';
        //echo $user->hasPermissionTo('post.add_post') ? 'Yes' : 'No';
        //echo $user->can(App\Models\Permission::find(1)) ? 'Yes' : 'No';
    ?>
    
@endsection


@section('scripts')

@endsection
