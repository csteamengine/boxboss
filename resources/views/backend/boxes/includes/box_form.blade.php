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
                    <div class="col-md-8">
                    {{ html()->label(__('validation.attributes.backend.boxes.name'))
                        ->class('form-control-label')
                        ->for('name') }}

                        {{ html()->text('name')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.name'))
                            ->attribute('maxlength', 191)
                            ->required()
                            ->autofocus() }}
                    </div><!--col-->
                    <div class="col-md-4">
                        {{ html()->label(__('validation.attributes.backend.boxes.is_active'))
                            ->class('form-control-label')
                            ->for('is_active') }}

                        <br>
                        <label class="switch switch-success m-0 pb-0 pt-1">
                            {{html()->checkbox('is_active', $checked = $box->is_active)
                                ->id("customSwitch".$box->id)
                                ->class('form-control switch-input')
                                ->attribute('maxlength', 250)
                               }}
                            <span class="switch-slider"></span>
                        </label>
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="form-group col-md-12">
                                {{ html()->label(__('validation.attributes.backend.boxes.address_line_1'))
                                ->class('form-control-label')
                                ->for('address_line_1') }}

                                {{ html()->text('address_line_1')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.boxes.address_line_1'))
                                    ->attribute('maxlength', 250)
                                    }}
                            </div>
                            <div class="form-group col-md-12">
                                {{ html()->label(__('validation.attributes.backend.boxes.address_line_2'))
                                    ->class('form-control-label')
                                    ->for('address_line_2') }}

                                {{ html()->text('address_line_2')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.boxes.address_line_2'))
                                    ->attribute('maxlength', 250)
                                    }}
                            </div>
                        </div>
                    </div><!--col-->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="form-group col-md-6">
                                {{ html()->label(__('validation.attributes.backend.boxes.city'))
                                    ->class('form-control-label')
                                    ->for('city') }}

                                {{ html()->text('city')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.boxes.city'))
                                    ->attribute('maxlength', 250)
                                    }}
                            </div><!--col-->
                            <div class="form-group col-md-6">
                                {{ html()->label(__('validation.attributes.backend.boxes.state'))
                                    ->class('form-control-label')
                                    ->for('state') }}

                                {{ html()->text('state')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.boxes.state'))
                                    ->attribute('maxlength', 2)
                                     }}
                            </div><!--col-->
                            <div class="form-group col-md-6">
                                {{ html()->label(__('validation.attributes.backend.boxes.zip'))
                                    ->class('form-control-label')
                                    ->for('zip') }}

                                {{ html()->text('zip')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.boxes.zip'))
                                    ->attribute('maxlength', 250)
                                    }}
                            </div><!--col-->
                            <div class="col-md-6">
                                {{ html()->label(__('validation.attributes.backend.boxes.country'))
                                    ->class('form-control-label')
                                    ->for('country') }}

                                {{ html()->select('country', PragmaRX\Countries\Package\Countries::all()->pluck('name.common', 'name.common'))
                                    ->class('form-control selectpicker')
                                    ->placeholder(__('validation.attributes.backend.boxes.country'))
                                    ->attribute('maxlength', 250)
                                    ->attribute('data-live-search', "true")
                                    ->attribute('data-default', $box->country)
                                    }}
                            </div><!--col-->
                        </div>
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <div class="col-md-12">
                        {{ html()->label(__('validation.attributes.backend.boxes.short_description'))
                            ->class('form-control-label')
                            ->for('short_description') }}

                        {{ html()->text('short_description')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.boxes.short_description'))
                            ->attribute('maxlength', 250)
                            }}
                    </div><!--col-->
                </div><!--form-group-->
                <div class="form-group row">
                    <div class="col-md-12">
                    {{ html()->label(__('validation.attributes.backend.boxes.long_description'))
                        ->class('form-control-label')
                        ->for('long_description') }}

                        {{ html()->textarea('long_description')
                            ->class('form-control')
                            ->attribute('rows', 10)
                            ->placeholder(__('validation.attributes.backend.boxes.long_description'))
                            }}
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
