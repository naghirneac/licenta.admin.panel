@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Adăugare utilizator @endslot
            @slot('parent') Home @endslot
            @slot('active') Adăugare utilizator @endslot
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('blog.admin.users.store')}}" method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Nume</label>
                                <input type="text" class="form-control" name="name" id="name" value="@if(old('name')) {{old('name')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="idnp">INDP</label>
                                <input type="text" class="form-control" name="idnp" id="idnp" value="@if(old('idnp')) {{old('idnp')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="birth_date">Data nașterii</label>
                                <input type="date" class="form-control" name="birth_date" value="@if(old('birth_date')) {{old('birth_date')}} @else @endif" required>
                            </div>

                            <div class="form-group">
                                <label for="enrolment_date">Data angajării</label>
                                <input type="date" class="form-control" name="enrolment_date" value="@if(old('enrolment_date')) {{old('enrolment_date')}} @else @endif" required>
                            </div>

                            <div class="form-group">
                                <label for="">Parola</label>
                                <input type="text" class="form-control" name="password" value="@if(old('password')) {{old('password')}} @else @endif" required>
                            </div>

                            <div class="form-group">
                                <label for="">Confirmarea parolei</label>
                                <input type="text" class="form-control" name="password_confirmation" value="@if(old('password_confirmation')) {{old('password_confirmation')}} @else @endif" required>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="@if(old('email')) {{old('email')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="role">Rol</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="2" selected> Utilizator</option>
                                    <option value="3"> Administrator</option>
                                    <option value="1"> Disabled</option>
                                </select>
                            </div>

                            {{--<div class="form-group has-feedback">
                                <label for="positionMultiselectm">Funcția</label>
                                <select name="position" id="positionMultiselect" class="form-control" multiple="multiple">
                                    <option disabled selected>Alege</option>
                                    <option value="1"> Back-End Developer </option>
                                    <option value="2"> Front-End Developer </option>
                                    <option value="3"> Full-Stack Developer </option>
                                    <option value="4"> Manual Tester </option>
                                    <option value="5"> Automation Tester </option>
                                    <option value="6"> Team Lead </option>
                                    <option value="7"> Designer </option>
                                    <option value="8"> System Administrator </option>
                                    <option value="9"> iOS Developer </option>
                                    <option value="10"> Android Developer </option>
                                    <option value="11"> Administrator </option>
                                </select>
                            </div>--}}

                            <div class="form-group has-feedback">
                                <label for="position">Funcția de bază</label>
                                <select name="position" id="position" class="form-control">
                                    <option disabled selected>Alege funcția</option>
                                    @forelse($positions as $position)
                                        <option value="{{$position->id}}">{{$position->name}}</option>
                                    @empty
                                        <option disabled selected>Nu sunt funcții</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="extraPosition">Funcția suplimentară</label>
                                <select name="extraPosition" id="extraPosition" class="form-control">
                                    <option disabled selected>Alege funcția</option>
                                    @forelse($positions as $position)
                                        <option value="{{$position->id}}">{{$position->name}}</option>
                                    @empty
                                        <option disabled selected>Nu sunt funcții</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-primary">Salvează</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
