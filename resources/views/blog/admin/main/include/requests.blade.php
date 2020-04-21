<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"> Cererile Recente: </h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>

    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Utilizatorul</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($last_requests as $request)
                        <tr>
                            <td><a href="">{{$request->id}}</a></td>
                            <td><a href="">{{$request->user_name}}</a></td>
                            <td>
                                <span class="label label-success">
                                    @if($request->status == 0) Nouă @endif
                                    @if($request->status == 1) Acceptată @endif
                                    @if($request->status == 2) Respinsă @endif
                                </span>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="box-footer clearfix">
        <a href="{{route('blog.admin.requests.index')}}" class="btn btn-sm btn-info btn-flat pull-left"> Toate cererile</a>
    </div>
</div>
