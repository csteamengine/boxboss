<div class="btn-group btn-group-sm" role="group" aria-label="@lang('labels.backend.boxes.actions')">
    <a href="{{ route('admin.boxes.edit', $box) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')">
        <i class="fas fa-edit"></i>
    </a>
{{--TODO add a view button to view the box on the front end/view the boxes dashboard--}}
    <a href="{{ route('admin.boxes.destroy', $box) }}"
       data-method="delete"
       data-trans-button-cancel="@lang('buttons.general.cancel')"
       data-trans-button-confirm="@lang('buttons.general.crud.delete')"
       data-trans-title="@lang('strings.backend.general.are_you_sure')"
       class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
        <i class="fas fa-trash"></i>
    </a>
</div>
