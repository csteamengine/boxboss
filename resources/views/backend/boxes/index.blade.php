@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.boxes.main'))

@push('after-styles')
    {!! style('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css') !!}
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.boxes.main')
                    </h4>
                </div><!--col-->

                @if($logged_in_user->isAdmin())
                    <div class="col-sm-7 pull-right">
                        @include('backend.boxes.includes.header-buttons')
                    </div><!--col-->
                @else
                    {{--                TODO Request to create a new gym--}}
                    {{--                TODO Request to coach at a new gym--}}
                @endif
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <input type="hidden" value="{{csrf_token()}}" id="boxTableCSRF">
                    <div class="table-responsive">
                        <table id="boxesTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.boxes.table.name')</th>
                                <th>@lang('labels.backend.boxes.table.status')</th>
                                <th>@lang('labels.backend.boxes.table.owner')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($boxes as $box)
                                @include('backend.boxes.includes.box_row', ['box' => $box])
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
@push('after-scripts')
    {!! script('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js') !!}
    {!! script('https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js') !!}
    {!! script(mix('js/backend/boxes/boxes.js')) !!}

@endpush
