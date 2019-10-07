<aside class="aside-menu">
    <ul class="nav w-100">
        <li class="nav-item d-lg-none d-xl-none">
            <form id="box_selection_form_aside" action="{{route('admin.updateActiveBox')}}" method="POST">
                @csrf
                <select class="box-select-aside show-tick" title="Active Box" data-live-search="true" data-width="fit" name="active-box">
                    @foreach($user->getAllBoxes() as $box)
                        <option data-tokens="{{$box['name']}}"
                                data-subtext="{{$box->permissions}}"
                                value="{{$box->id}}"
                            {{session('active_box')->id == $box->id ? "selected" : ""}}>
                            {{$box->name}}
                        </option>
                    @endforeach
                </select>
                {{--                <submit type="hidden"></submit>--}}
            </form>
        </li>
    </ul>
</aside>
