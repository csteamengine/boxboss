{{ html()->modelForm($box, $method, $route)->class('form-horizontal')->open() }}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.boxes.main')
                    <small class="text-muted">@lang('labels.backend.boxes.'.$action)</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr>

        <div class="row mt-4">
            <div class="col">
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.name'))
                        ->class('col-md-2 form-control-label')
                        ->for('name') }}

                    <div class="col-md-10">
                        {{ html()->text('name')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.name'))
                            ->attribute('maxlength', 191)
                            ->required()
                            ->autofocus() }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.short_description'))
                        ->class('col-md-2 form-control-label')
                        ->for('short_description') }}

                    <div class="col-md-10">
                        {{ html()->text('short_description')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.short_description'))
                            ->attribute('maxlength', 250)
                            }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.long_description'))
                        ->class('col-md-2 form-control-label')
                        ->for('long_description') }}

                    <div class="col-md-10">
                        {{ html()->text('long_description')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.long_description'))
                            }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.address_line_1'))
                        ->class('col-md-2 form-control-label')
                        ->for('address_line_1') }}

                    <div class="col-md-10">
                        {{ html()->text('address_line_1')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.address_line_1'))
                            ->attribute('maxlength', 250)
                            }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.address_line_2'))
                        ->class('col-md-2 form-control-label')
                        ->for('address_line_2') }}

                    <div class="col-md-10">
                        {{ html()->text('address_line_2')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.address_line_2'))
                            ->attribute('maxlength', 250)
                            }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.city'))
                        ->class('col-md-2 form-control-label')
                        ->for('city') }}

                    <div class="col-md-10">
                        {{ html()->text('city')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.city'))
                            ->attribute('maxlength', 250)
                            }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.state'))
                        ->class('col-md-2 form-control-label')
                        ->for('state') }}

                    <div class="col-md-10">
                        {{ html()->text('state')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.state'))
                            ->attribute('maxlength', 2)
                             }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.zip'))
                        ->class('col-md-2 form-control-label')
                        ->for('zip') }}

                    <div class="col-md-10">
                        {{ html()->text('zip')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.zip'))
                            ->attribute('maxlength', 250)
                            }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.country'))
                        ->class('col-md-2 form-control-label')
                        ->for('country') }}

                    <div class="col-md-10">
                        {{ html()->text('country')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.country'))
                            ->attribute('maxlength', 250)
                            }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.boxes.is_active'))
                        ->class('col-md-2 form-control-label')
                        ->for('is_active') }}

                    <div class="col-md-10">
                        <td class="text-center">
                            <label class="switch switch-success m-0 pb-0 pt-1">
                                {{html()->checkbox('is_active', array('data-id' => $box->id))
                                    ->id("customSwitch".$box->id)
                                    ->class('form-control switch-input')
                                    ->placeholder(__('validation.attributes.backend.boxes.is_active'))
                                    ->attribute('maxlength', 250)
                                    ->attribute($box->is_active ? "checked" : "")
                                   }}
                                <span class="switch-slider"></span>
                            </label>
                        </td>
                    </div><!--col-->
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.boxes.index'), __('buttons.general.cancel')) }}
            </div><!--col-->

            <div class="col text-right">
                {{ form_submit(__('buttons.general.crud.'.$action)) }}
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
{{ html()->closeModelForm() }}
