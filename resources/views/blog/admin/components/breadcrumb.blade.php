<h1>
    @if(isset($title)){{$title}} @endif
</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('blog.admin.index.index') }}">
            <i class="fa fa-dashboard"></i> {{$parent}}
        </a>
    </li>
    @if(isset($request))
        <li>
            <a href="{{route('blog.admin.requests.index')}}">
                <i>{{$request}}</i>
            </a>
        </li>
    @endif
    @if(isset($active))
        <li>
            <i class="active">
                <i>{{$active}}</i>
            </i>
        </li>
    @endif
</ol>
