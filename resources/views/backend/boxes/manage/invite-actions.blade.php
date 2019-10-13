<div class="btn-group btn-group-sm" role="group" aria-label="@lang('labels.backend.boxes.actions')">
    {{--    TODO find out how to change this text for the confirm box--}}
    @if($logged_in_user->can('edit', $box))
        <a href="{{ route('frontend.invites.accept', ['invite' => $invite]) }}" class="btn btn-success" data-toggle="tooltip"
           data-placement="top"
           title="Accept"
           data-method="post"
           data-trans-button-cancel="@lang('buttons.general.cancel')"
           data-trans-button-confirm="Yes, Accept"
           data-trans-title="@lang('strings.backend.general.are_you_sure')">
            <i class="fas fa-check"></i>
        </a>
        <a href="{{ route('admin.boxes.invites.delete', ['box' => $box, 'invite' => $invite]) }}" class="btn btn-danger" data-toggle="tooltip"
           data-placement="top"
           title="Delete"
           data-method="post"
           data-trans-button-cancel="@lang('buttons.general.cancel')"
           data-trans-button-confirm="Yes, Decline"
           data-trans-title="@lang('strings.backend.general.are_you_sure')">
            <i class="fas fa-trash"></i>
        </a>
    @endif
</div>
