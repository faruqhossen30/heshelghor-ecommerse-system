@extends('admin.layouts.app')
@section('title', 'HeshelGhor | Roles ')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Role Edit</h4>
                <p class="sub-header">
                    Most common form control, text-based input fields. Includes support for all HTML5 types:
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form action="{{route('roles.update', $role->id)}}" method="POST" class="form-horizontal" role="form">
                                @method('PUT')
                                @csrf
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Define Role : </label>
                                    <div class="col-md-10">
                                        <input name="name" value="{{$role->name}}" type="text" id="simpleinput" class="form-control @error('name') is-invalid @enderror" placeholder="Role Name">
                                        <div class="text-danger">
                                            @error('name')
                                            <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h4>Permissions</h4>
                                    <div class="form-check form-switch">
                                        <input value="1" class="form-check-input" type="checkbox" id="checkPermissionAll" {{App\Models\Auth\Admin::roleHasPermissions($role, $permissions) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="checkPermissionAll">All</label>
                                    </div>
                                    <hr>
                                    @php $i = 1;  @endphp
                                    @foreach ($permission_groups as $group)
                                        <div class="row">
                                            @php
                                                $permissions = \App\Models\Auth\Admin::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp
                                            <div class="col-3">
                                                <div class="form-check form-switch">
                                                    <input id="{{$i}}-Management" value="{{$group->name}}" onclick="checkPermissionByGroup('role-{{$i}}-management-checkbox', this)" {{App\Models\Auth\Admin::roleHasPermissions($role, $permissions) ? 'checked' : ''}} class="form-check-input" type="checkbox" >
                                                    <label class="form-check-label" for="permissionCheck">{{$group->name}}</label>
                                                </div>
                                            </div>
                                            <div class="col-9 role-{{$i}}-management-checkbox">

                                                @foreach ($permissions as $permission)
                                                    <div class="form-check form-switch">
                                                        <input name="permissions[]" onclick="checkSinglePermission('role-{{$i}}-management-checkbox', '{{$i}}-Management', {{count($permissions)}})" {{$role->hasPermissionTo($permission->name) ? 'checked' : ''}} value="{{$permission->name}}" class="form-check-input" type="checkbox" id="permissionCheck{{$permission->id}}">
                                                        <label class="form-check-label" for="permissionCheck{{$permission->id}}">{{$permission->name}}</label>
                                                    </div>
                                                    @php $j++; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                        @php $i++; @endphp
                                    @endforeach


                                </div>


                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Update Role</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div> <!-- end card -->
    </div><!-- end col -->
</div>
@endsection

@push('scripts')
    <script>
        $('#checkPermissionAll').click(function(){
            if($(this).is(':checked')){
                // check all the checkbox
                $('input[type=checkbox]').prop('checked',true);
            } else{
                // uncheck all the checkbox
                $('input[type=checkbox]').prop('checked',false);
            }
        });

        function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');

            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
            // implementAllChecked();
         }

         function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);

            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            // implementAllChecked();
         }

         function implementAllChecked() {
             const countPermissions = {{ count($permissions) }};
             const countPermissionGroups = {{ count($permission_groups) }};

            //  console.log((countPermissions + countPermissionGroups));
            //  console.log($('input[type="checkbox"]:checked').length);

             if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#checkPermissionAll").prop('checked', true);
            }else{
                $("#checkPermissionAll").prop('checked', false);
            }
         }

    </script>
@endpush

