@extends('layouts.app_admin')

@section('content')
    <section class="content-header">

        <h1>
            Editarea cererii № {{$item->id}}

            @if(!$request->status)
                <a href="{{route('blog.admin.requests.change', $item->id)}}/?status=1" class="btn btn-success btn-xs">Accepta</a>
                <a href="#" class="btn btn-warning btn-xs redact">Editeaza</a>
            @else
                <a href="{{route('blog.admin.requests.change', $item->id)}}/?status=0" class="btn btn-default btn-xs">Intoarcere</a>
            @endif

            <a href="" class="btn btn-xs">
                <form action="" id="delform" method="post" style="float: none">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-xs delete">Sterge</button>
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
                                            <td><b>Numarul cererii</b></td>
                                            <td>{{$request->id}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Data crearii</b></td>
                                            <td>{{$request->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Categoria</b></td>
                                            <td>{{$request->request_type_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Autorul (Functia)</b></td>
                                            <td>{{$request->user_name}} ({{$request->position_name}})</td>
                                        </tr>
                                        <tr>
                                            <td><b>Mesajul</b></td>
                                            <td>{{$request->message}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Statut</b></td>
                                            <td>{{$request->status ? 'Finisata' : 'Noua'}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="submit" name="submit" class="btn btn-warning" value="Salveaza">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
