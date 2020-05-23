@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('js/fullcalendar/fullcalendar.min.css') }}" />
<style>
    #calendar {
        width: 700px;
        margin: 0 auto;
    }

    .response {
        height: 60px;
    }

    .success {
        background: #cdf3cd;
        padding: 10px 60px;
        border: #c3e6c3 1px solid;
        display: block;
        margin: 0px auto;
        text-align: center;
    }

    #request{
        width: 10%;
        margin-left: 45%;
    }
</style>
@section('content')

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="response"></div>
                <div id="calendar"></div>
                <br>
                <button type="button" id="request" class="btn btn-success" data-toggle="modal" data-target="#requestToAdmin">Cerere</button>

                {{-- Modal --}}
                <div class="modal fade" id="requestToAdmin" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Cerere</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('add.request.to.admin') }}" method="post">
                                <div class="modal-body">
                                        @csrf
                                        <div class="form-group">
                                            <label for="reqType">Categoria</label>
                                            <select class="form-control" id="reqType" name="reqType">
                                                @forelse($requestTypes as $type)
                                                    <option value="{{$type->id}}">{{$type->name}} ({{$type->description}})</option>
                                                @empty
                                                    <option disabled selected>Nu sunt categorii</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="reqMessage">Mesaj către administrator</label>
                                            <textarea class="form-control" name="reqMessage" id="reqMessage" rows="3" placeholder="Motivul și data sunt obligatorii"></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Transmite</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Închide</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  @endsection

