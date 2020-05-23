@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Înregistrare') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nume') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="idnp" class="col-md-4 col-form-label text-md-right">{{ __('INDP') }}</label>

                            <div class="col-md-6">
                                <input id="idnp" type="text" class="form-control @error('idnp') is-invalid @enderror" name="idnp" value="{{ old('idnp') }}" required autocomplete="idnp">

                                @error('idnp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Data nașterii') }}</label>

                            <div class="col-md-6">
                                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>

                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="enrolment_date" class="col-md-4 col-form-label text-md-right">{{ __('Data angajării') }}</label>

                            <div class="col-md-6">
                                <input id="enrolment_date" type="date" class="form-control @error('enrolment_date') is-invalid @enderror" name="enrolment_date" value="{{ old('enrolment_date') }}" required autocomplete="enrolment_date" autofocus>

                                @error('enrolment_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Parola') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirmarea parolei') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <select name="role" id="role" class="form-control">
                                    <option value="2" selected> Utilizator</option>
                                    <option value="3"> Administrator</option>
                                    <option value="1"> Disabled</option>
                                </select>

                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Funcția de bază') }}</label>

                            <div class="col-md-6">
                                <select name="position" id="position" class="form-control">
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

                                @error('position')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="extraPosition" class="col-md-4 col-form-label text-md-right">{{ __('Funcția suplimentară') }}</label>

                            <div class="col-md-6">
                                <select name="extraPosition" id="extraPosition" class="form-control">
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

                                @error('extraPosition')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
