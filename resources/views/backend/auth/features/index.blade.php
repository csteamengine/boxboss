@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.features.flags'))

@push('after-styles')
    {!! style('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css') !!}
    {!! style('https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css') !!}
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.access.features.flags')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.auth.features.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <input type="hidden" value="{{csrf_token()}}" id="featureTableCSRF">
                <div class="table-responsive">
                    <table id="featuresTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>@lang('labels.backend.access.features.table.name')</th>
                                <th>@lang('labels.backend.access.features.table.status')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($features as $current)
                                @include('backend.auth.features.includes.feature_row', ['item' => $current])
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
    {!! script(mix('js/backend/features/features.js')) !!}

@endpush
