@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Lista de utilizatori @endslot
            @slot('parent') Home @endslot
            @slot('active') Lista de utilizatori @endslot
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
                                    <td>Numele</td>
                                    <td>Email</td>
                                    <td>Rolul</td>
                                    <td>Acțiuni</td>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($paginator as $user)
                                    @php
                                        $class = '';
                                        $status = $user->role;
                                        if ($status == 'disabled') $class = 'danger';

                                        if ($user->role == 'user') $user->role = 'Utilizator';
                                        if ($user->role == 'admin') $user->role = 'Administrator';
                                        if ($user->role == 'disabled') $user->role = 'Deactivat';
                                    @endphp
                                    <tr class="{{$class}}">
                                        <td>{{$user->id}}</td>
                                        <td>{{ucfirst($user->name)}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>
                                            <a href="{{route('blog.admin.users.edit', $user->id)}}" title="Detalii">
                                                <i class="btn btn-xs"></i>
                                                <button type="submit" class="btn btn-success btn-xs">Detalii</button>
                                            </a>
                                            <a class="btn btn-xs">
                                                <form action="{{route('blog.admin.users.destroy', $user->id)}}" method="post" style="float: none">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-xs delete">Ștergere</button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="3"><h2>Utilizatori nu sunt.</h2></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>{{count($paginator)}} utilizatori din {{$countUsers}}</p>

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
