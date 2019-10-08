<?php

Breadcrumbs::for('admin.auth.features.index', function ($trail) {
    $trail->push(__('menus.backend.access.features.flags'), route('admin.auth.features.index'));
});

Breadcrumbs::for('admin.auth.features.create', function ($trail) {
    $trail->parent('admin.auth.features.index');
    $trail->push(__('menus.backend.access.features.create'), route('admin.auth.features.create'));
});

Breadcrumbs::for('admin.auth.features.edit', function ($trail, $id) {
    $trail->parent('admin.auth.features.index');
    $trail->push(__('menus.backend.access.features.edit'), route('admin.auth.features.edit', $id));
});
