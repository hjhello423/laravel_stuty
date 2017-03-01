

@extends('layouts.master')

@section('content')
    <h1> hello </h1>
    {{ $greeting or 'Hello' }} {{ $name or '' }}

    <p>자식뷰의 'content' 섹션</p>
@endsection