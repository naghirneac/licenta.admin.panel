@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Timpul lucrat al utilizatorilor @endslot
            @slot('parent') Home @endslot
            @slot('active') Timpul lucrat @endslot
        @endcomponent
    </section>

{{--<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>Utilizatorul</td>
                                <td>Timpul Lucrat</td>
                                <td>Data</td>
                                <td>Data creării</td>
                                <td>Data schimbării</td>
                                <td>Acțiuni</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($paginator as $user_wt)
                                <tr>
                                    <td>
                                        {{$user_wt->user_id}}
                                        {{$user_wt->user_name}}
                                    </td>
                                    <td>{{$user_wt->worktime}}</td>
                                    <td>{{$user_wt->date}}</td>
                                    <td>{{$user_wt->created_at}}</td>
                                    <td>{{$user_wt->updated_at}}</td>
                                    <td>
                                        <a href="{{route('blog.admin.statistics.edit', $user_wt->user_id)}}" title="Detalii"><i class="fa fa-fv fa-eye"></i></a>
                                        <a href="{{route('blog.admin.statistics.force_destroy', $user_wt->user_id)}}" title="Ștergere"><i class="fa fa-fv fa-close text-danger deletebd"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3"><h2>Inscrieri nu sunt.</h2></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                   --}}{{-- <div class="text-center">
                        <p>{{count($paginator)}} cereri din {{$countRequests}}</p>

                        @if($paginator->total() > $paginator->count())
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            {{$paginator->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>--}}{{--
                </div>
            </div>
        </div>
    </div>
    </section>--}}

   <section class="content">
       @php

       @endphp

       <div id="chartContainer" style="margin-top: 5%; margin-left: 12%; width: 76%;"></div>

       <script>
           window.onload = function ($data) {

               var options = {
                   animationEnabled: true,
                   title: {
                       text: "Timpul lucrat pentru luna {{$month}}"
                   },
                   axisY: {
                       title: "Timp lucrat(norma:168 ore)",
                       suffix: "o",
                       includeZero: false
                   },
                   axisX: {
                       title: "Angajații"
                   },
                   data: [{
                       type: "column",
                       yValueFormatString: "#,##0.##",
                       dataPoints: [
                               @forelse($paginator as $user)
                                     { label: "{{$oneUser->getOneUserName($user->id)}}", y: {{$oneUser->getOneUserWt($user->id)}} },
                                @empty
                                    { label: "noname", y: 0 }
                               @endforelse
                       ]
                   }]
               };
               $("#chartContainer").CanvasJSChart(options);

           }
       </script>

   </section>
@endsection
