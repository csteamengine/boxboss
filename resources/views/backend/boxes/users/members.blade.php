<div class="row mb-1">
    <div class="col-sm-5">
        <h4 class="card-title mb-0">
            @lang('labels.backend.boxes.members')
        </h4>
    </div><!--col-->
    @if(FeatureFlag::isActive('invite_management'))
        <div class="col float-right">
            @include('backend.boxes.manage.members-header-buttons')
        </div><!--col-->
    @endif
</div><!--row-->
<ul class="nav nav-tabs" id="membersTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#membersContent" role="tab" aria-controls="members" aria-selected="true">Members</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#requestsContent" role="tab" aria-controls="requests" aria-selected="false">Membership Requests</a>
    </li>
</ul>
<div class="tab-content" id="memberManagementContent">
    <div class="tab-pane fade show active" id="membersContent" role="tabpanel" aria-labelledby="members-tab">
        <div class="col">
            @include('backend.boxes.users.membersTable', ['members' => $box->members()->get()])
        </div>
    </div>
    <div class="tab-pane fade" id="requestsContent" role="tabpanel" aria-labelledby="requests-tab">
        <div class="col">
            @include('backend.boxes.users.requestsTable', ['requests' => $box->requests()->get()])
        </div>
    </div>
</div>
