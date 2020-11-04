@extends('layouts.app')

@section('section-name')
{{$sectionName}}
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        @include('admin.partials.indexCompanias')    
    </div>
@endsection
