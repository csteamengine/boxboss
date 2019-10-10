@extends('backend.layouts.app')

@section('title', __('labels.backend.boxes.main') . ' | ' . __('labels.backend.boxes.create'))

@section('content')
    @include('backend.boxes.includes.box_form', ['box' => new App\Models\Box, 'action' => 'create', 'method' => 'POST', 'route' => route('admin.boxes.store')])
@endsection
