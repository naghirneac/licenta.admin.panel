@extends('layouts.app_admin')

@section('content')
   <section class="content-header">
       @component('blog.admin.components.breadcrumb')
           @slot('title') Panela de administrare @endslot
           @slot('parent') Home @endslot
       @endcomponent
   </section>
@endsection
