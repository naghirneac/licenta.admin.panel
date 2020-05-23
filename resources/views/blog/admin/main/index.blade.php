@extends('layouts.app_admin')

@section('content')
   <section class="content-header">
       @component('blog.admin.components.breadcrumb')
           @slot('title') Panoul de administrare @endslot
           @slot('parent') Home @endslot
       @endcomponent
   </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4> Cereri : {{ $countRequests }}</h4>
                        <p>Total</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document-text"></i>
                    </div>
                    <a href="{{route('blog.admin.requests.index')}}" class="small-box-footer">
                        Detalii <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h4> Funcții : {{ $countPositions }}</h4>
                        <p>Total</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="" class="small-box-footer">
                        Detalii <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4> Utilizatori:{{ $countUsers }}</h4>
                        <p>Total</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('blog.admin.users.index')}}" class="small-box-footer">
                        Detalii <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h4> Statistica</h4>
                        <p>Pentru luna mai</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('blog.admin.statistics.index')}}" class="small-box-footer">
                        Detalii <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6" >
            @include('blog.admin.main.include.requests')
        </div>
    </section>
@endsection
