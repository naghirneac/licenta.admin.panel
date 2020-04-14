@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Panela de administrare @endslot
            @slot('parent') Home @endslot
            @slot('active') Toate cererile @endslot
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Utilizatorul</td>
                                        <td>Categoria</td>
                                        <td>Status</td>
                                        <td>Data crearii</td>
                                        <td>Data schimbarii</td>
                                        <td>Actiuni</td>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($paginator as $request)
                                    @php $class = $request->status ? 'success' : '' @endphp
                                    <tr class="{{$class}}">
                                        <td>{{$request->id}}</td>
                                        <td>{{$request->user_name}}</td>
                                        <td>{{$request->request_type_name}}</td>
                                        <td>
                                            @if($request->status == 0) <span class="label label-success">Noua</span> @endif
                                            @if($request->status == 1) <span class="label label-warning">Acceptata</span> @endif
                                            @if($request->status == 2) <span class="label label-danger">Eliminat(Respins)</span> @endif
                                        </td>
                                        <td>{{$request->created_at}}</td>
                                        <td>{{$request->updated_at}}</td>
                                        <td>
                                            <a href="{{route('blog.admin.requests.edit', $request->id)}}" title="Editare"><i class="fa fa-fv fa-eye"></i></a>
                                            <a href="" title="Stergere"><i class="fa fa-fv fa-close text-danger deleted"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="3"><h2>Cerei nu sunt.</h2></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
