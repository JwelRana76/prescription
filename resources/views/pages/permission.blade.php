<x-admin>
    <x-card header="Permission Setup">
        <x-form action="{{route('role.permission.store')}}" method="post" id="role_permission">
            <h3 class="text-center">Role is : {{$role->name}}</h3>
            <x-input type="hidden" id="role_id" value="{{$role->id}}" />
            <h5 class="text-center"><input type="checkbox" id="all_check_permission"> All Check</h5>
            <table class="table table-border">
                @foreach ($permission_group as $key=>$item)
                    <tr>
                        <td><input type="checkbox" class="permission_group" value="{{$item->id}}">   {{$item->name}}</td>
                        @php
                            $permission = DB::table('permissions')->where('permission_group_id',$item->id)->get();
                        @endphp
                        @foreach ($permission as $key=>$permission)
                            <td>
                                <input type="checkbox" name="permission[{{$permission->id}}]" {{ in_array($permission->id, $role_has_permission) ? 'checked' : '' }} class="permission_checkbox" value="{{$permission->id}}">    
                                {{$permission->name}}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
            
        <x-button value="submit" />
        </x-form>
    </x-card>
    @push('js')
        <script>
            $(document).ready(function () {

                // Check all permissions
                $('#all_check_permission').on('change', function () {
                    $('.permission_group, .permission_checkbox')
                        .prop('checked', $(this).prop('checked'));
                });

                // Check all permissions of a specific group
                $('.permission_group').on('change', function () {

                    let row = $(this).closest('tr');

                    row.find('.permission_checkbox')
                        .prop('checked', $(this).prop('checked'));

                    checkAllStatus();
                });

                // Update group checkbox when individual permission changes
                $('.permission_checkbox').on('change', function () {

                    let row = $(this).closest('tr');

                    let total = row.find('.permission_checkbox').length;
                    let checked = row.find('.permission_checkbox:checked').length;

                    row.find('.permission_group')
                        .prop('checked', total === checked);

                    checkAllStatus();
                });

                // Update All Check checkbox
                function checkAllStatus() {

                    let total = $('.permission_group, .permission_checkbox').length;
                    let checked = $('.permission_group:checked, .permission_checkbox:checked').length;

                    $('#all_check_permission')
                        .prop('checked', total === checked);
                }

            });
        </script>
    @endpush
</x-admin>