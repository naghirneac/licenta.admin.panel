@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Editarea utilizatorului № {{$item->id}} @endslot
            @slot('parent') Home @endslot
            @slot('user') Lista de utilizatori @endslot
            @slot('active') Editarea utilizatorului № {{$item->id}} @endslot
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('blog.admin.users.update', $item->id)}}" method="post" data-toggle="validator">
                        @method('PUT')
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="idnp">IDNP</label>
                                <input type="text" class="form-control" name="idnp" value="@if(old('idnp')) {{old('idnp')}} @else {{$item->idnp ?? ""}} @endif" required>
                            </div>

                            <div class="form-group">
                                <label for="birth_date">Data nașterii</label>
                                <input type="date" class="form-control"  id="birth_date" name="birth_date" value="{{$item->birth_date}}" required>
                            </div>

                            <div class="form-group">
                                <label for="enrolment_date">Data angajării</label>
                                <input type="date" class="form-control" name="enrolment_date" value="{{$item->enrolment_date}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">Parola</label>
                                <input type="text" class="form-control" name="password" placeholder="Introduceți parola, dacă doriți să-o schimbați">
                            </div>

                            <div class="form-group">
                                <label for="">Confirmarea parolei</label>
                                <input type="text" class="form-control" name="password_confirmation" placeholder="Confirmați parola">
                            </div>

                            <div class="form-group">
                                <label for="position">Funcția de bază</label>
                                <select name="position" id="position" class="form-control">
                                    <option disabled>Alege funcția</option>
                                    @forelse($allPositions as $onePosition)
                                        <option value="{{$onePosition->id}}"
                                            @php if ($onePosition->id === $firstPosition) echo 'selected' @endphp>
                                            {{$onePosition->name}}
                                        </option>
                                    @empty
                                        <option disabled selected>Nu sunt funcții</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="extraPosition">Funcția suplimentară</label>
                                <select name="extraPosition" id="extraPosition" class="form-control">
                                    <option disabled  @php if ($secondPosition == null) echo 'selected' @endphp>Alege funcția</option>
                                    @forelse($allPositions as $onePosition)
                                        <option value="{{$onePosition->id}}"
                                            @php if ($onePosition->id === $secondPosition) echo 'selected' @endphp>
                                            {{$onePosition->name}}
                                        </option>
                                    @empty
                                        <option disabled selected>Nu sunt funcții</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="name">Nume</label>
                                <input type="text" class="form-control" name="name" id="name" value="@if(old('name')) {{old('name')}} @else {{$item->name ?? ""}} @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="@if(old('email')) {{old('email')}} @else {{$item->email ?? ""}} @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="role">Rol</label>
                                {{--@php var_dump($role->name == 'disabled');die(); @endphp--}}
                                <select name="role" id="role" class="form-control">
                                    <option value="2" @php if ($role->name == 'user') echo 'selected' @endphp>Utilizator</option>
                                    <option value="3" @php if ($role->name == 'admin') echo 'selected' @endphp>Administrator</option>
                                    <option value="1" @php if ($role->name == 'disabled') echo 'selected' @endphp>Deactivat</option>
                                </select>
                            </div>

                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit" value="submit" class="btn btn-primary">Salvează</button>
                            <button type="button" id="report" class="btn btn-success" data-toggle="modal" data-target="#reportMonth">Raport lunar</button>
                        </div>
                    </form>
                </div>


                {{-- Modal --}}
                <div class="modal fade" id="reportMonth" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="staticBackdropLabel">Raport pe luna {{$month}}</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4><b>Numele angajatului:</b> {{$item->name}}</h4><hr>
                                <h4><b>IDNP:</b> {{$item->idnp}}</h4><hr>
                                <h4><b>Data nașterii:</b> {{$item->birth_date}}</h4><hr>
                                <h4><b>Data angajării:</b> {{$item->enrolment_date}}</h4><hr>
                                @php
                                    foreach ($allPositions as $onePosition)
                                        if ($onePosition->id === $firstPosition)
                                            $firstPosition = $onePosition->name;
                                @endphp
                                <h4><b>Funcția de bază:</b> {{$firstPosition}}</h4><hr>
                                @php
                                    foreach ($allPositions as $onePosition)
                                        if ($onePosition->id === $secondPosition)
                                            $secondPosition = $onePosition->name;
                                @endphp
                                <h4><b>Funcția suplimentară:</b> {{$secondPosition}}</h4><hr>
                                <h4><b>E-mail:</b> {{$item->email}}</h4><hr>
                                <h4><b>Orele lucrate luna curentă:</b> {{$wt}}</h4>
                            </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Închide</button>
                                </div>
                        </div>
                    </div>
                </div>
                <h3>Cererile utilizatorului:</h3>
                <div class="box">
                    <div class="box-body">
                        @if($count)
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Categoria</th>
                                            <th>Statut</th>
                                            <th>Data creării</th>
                                            <th>Data schimbării</th>
                                            <th>Acțiuni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requests as $request)
                                            @php $class = $request->status ? 'success' : ''  @endphp
                                            <tr class="{{$class}}">
                                                <td>{{$request->id}}</td>
                                                <td>{{$request->type}}</td>
                                                <td>
                                                    @if($request->status == 0) <span class="label label-success">Nouă</span> @endif
                                                    @if($request->status == 1) <span class="label label-warning">Acceptată</span> @endif
                                                    @if($request->status == 2) <span class="label label-danger">Respinsă</span> @endif
                                                </td>
                                                <td>{{$request->created_at}}</td>
                                                <td>{{$request->updated_at}}</td>
                                                <td>
                                                    <a href="{{route('blog.admin.requests.edit', $request->id)}}">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                        <p class="text-danger">De la acest utilizator nu sunt cereri.</p>
                        @endif
                    </div>
                </div>
                <div class="text-center">
                    <p>{{count($countRequests)}} cereri din {{$count}}</p>

                    @if($requests->total() > $requests->count())
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        {{$requests->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
