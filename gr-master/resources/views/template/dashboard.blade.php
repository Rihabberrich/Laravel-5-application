@extends('template.master')

@section('body')

    @include('template.sidebar')

    <div class="main-panel">

        @include('template.navbar')

        <div class="content">
            @yield('content')
        </div>

    </div>

@endsection