@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.features.flags'))

@push('after-styles')

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
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.features.table.name')</th>
                            <th>@lang('labels.backend.access.features.table.status')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                            <input type="hidden" value="{{csrf_token()}}" id="featureTableCSRF">
                            @foreach($features as $current)
                                @include('backend.auth.features.includes.feature_row', ['item' => $current])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $features->count() !!} {{ trans_choice('labels.backend.access.features.table.total', $features->count()) }}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
@push('after-scripts')
    {!! script(mix('js/backend/features/features.js')) !!}
@endpush
