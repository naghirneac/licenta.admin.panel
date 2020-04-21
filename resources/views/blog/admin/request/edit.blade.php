@extends('layouts.app_admin')

@section('content')
    <section class="content-header">

        <h1>
            Editarea cererii № {{$item->id}}

            @if(!$request->status)
                <a href="{{route('blog.admin.requests.change', $item->id)}}/?status=1" class="btn btn-success btn-xs">Acceptă</a>
            @else
                <a href="{{route('blog.admin.requests.change', $item->id)}}/?status=0" class="btn btn-default btn-xs">Intoarcere</a>
            @endif

            <a href="" class="btn btn-xs">
                <form action="{{route('blog.admin.requests.destroy', $item->id)}}" id="delform" method="post" style="float: none">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-xs delete">Respinge</button>
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
                                            <td><b>Numărul cererii</b></td>
                                            <td>{{$request->id}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Data creării</b></td>
                                            <td>{{$request->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Categoria</b></td>
                                            <td>{{$request->request_type_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Autorul (Funcția)</b></td>
                                            <td>{{$request->user_name}} ({{$request->position_name}})</td>
                                        </tr>
                                        <tr>
                                            <td><b>Mesajul</b></td>
                                            <td>{{$request->message}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Statutul</b></td>
                                            <td>{{$request->status ? 'Finisată' : 'Nouă'}}</td>
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
