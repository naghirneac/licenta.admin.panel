<h1>
    @if(isset($title)){{$title}} @endif
</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('blog.admin.index.index') }}">
            <i class="fa fa-dashboard"></i> {{$parent}}
        </a>
    </li>
    {{--@if(isset($order))
        <li>
            <a href="">
                <i></i>
            </a>
        </li>
    @endif--}}
</ol>
