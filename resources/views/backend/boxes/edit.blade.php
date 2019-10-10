@extends('backend.layouts.app')

@section('title', __('labels.backend.boxes.main') . ' | ' . __('labels.backend.boxes.edit'))

@section('content')
    @include('backend.boxes.includes.box_form', ['box' => $box, 'action' => 'edit', 'method' => 'PATCH', 'route' => route('admin.boxes.update', $box)])
@endsection
