@extends('layouts.app_admin')

@section('content')
    <section class="content-header">

        <h1>
            Editarea timpului de lucru al utilizatorului № {{$item->id}}
            <a href="" class="btn btn-xs">
                <form action="{{route('blog.admin.statistics.destroy', $item->id)}}" id="delform" method="post" style="float: none">
                    @method('DELETE')
                    @csrf
                </form>
            </a>
        </h1>
        @component('blog.admin.components.breadcrumb')
            @slot('parent') Home @endslot
            @slot('request') Toate cererile @endslot
            @slot('active') Cererea № {{$item->id}} @endslot
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{route('blog.admin.requests.save', $item->id)}}" method="post">
                                @csrf
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-4"><b>Utilizatorul</b></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>Timpul lucrat luna aceasta</b></td>
                                            <td>{{$user_wt->total_time}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Norma luna aceasta</b></td>
                                            <td>168:00:00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
