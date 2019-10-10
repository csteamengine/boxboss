<?php

Breadcrumbs::for('admin.boxes.index', function ($trail) {
    $trail->push(__('menus.backend.boxes.main'), route('admin.boxes.index'));
});

Breadcrumbs::for('admin.boxes.view', function ($trail, $id) {
    $trail->push(__('menus.backend.boxes.manage'), route('admin.boxes.view', $id));
});

Breadcrumbs::for('admin.boxes.create', function ($trail) {
    $trail->parent('admin.boxes.index');
    $trail->push(__('menus.backend.boxes.create'), route('admin.boxes.create'));
});

Breadcrumbs::for('admin.boxes.edit', function ($trail, $id) {
    $trail->parent('admin.boxes.index');
    $trail->push(__('menus.backend.boxes.edit'), route('admin.boxes.edit', $id));
});
