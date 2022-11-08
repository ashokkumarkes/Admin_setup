@extends('layouts.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(!auth()->user()->userHasRole('Admin'))
            <h1 class="h3 mb-0 text-gray-800">Dashboard </h1>
            <h2> Welcome {{auth()->user()->name}}
        @endif
    </div>
    @endsection

