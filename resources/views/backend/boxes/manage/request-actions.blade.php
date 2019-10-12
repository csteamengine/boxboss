<div class="btn-group btn-group-sm" role="group" aria-label="@lang('labels.backend.boxes.actions')">
    {{--    TODO find out how to change this text for the confirm box--}}
    @if($logged_in_user->can('edit', $box))
        <a href="{{ route('admin.requests.accept', ['box' => $box, 'memRequest' => $request]) }}" class="btn btn-success" data-toggle="tooltip"
           data-placement="top" title="Accept"
           data-method="get"
           data-trans-button-cancel="@lang('buttons.general.cancel')"
           data-trans-button-confirm="Yes, Decline"
           data-trans-title="@lang('strings.backend.general.are_you_sure')">
            <i class="fas fa-check"></i>
        </a>
    @endif
{{--    TODO find out how to change this text for the confirm box--}}
    @if($logged_in_user->can('edit', $box))
        <a href="{{ route('admin.requests.decline', ['box' => $box, 'memRequest' => $request]) }}" class="btn btn-danger" data-toggle="tooltip"
           data-placement="top"
           title="Decline"
           data-method="get"
           data-trans-button-cancel="@lang('buttons.general.cancel')"
           data-trans-button-confirm="Yes, Decline"
           data-trans-title="@lang('strings.backend.general.are_you_sure')">
            <i class="fas fa-times-circle"></i>
        </a>
    @endif
</div>
