<x-admin>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Create Role</h3>
                </div>
                <div class="card-body">
                    <x-form action="{{route('role.store')}}" method="post" id="role_create">
                        <x-input id="id" value="{{$role->id ?? null}}" type="hidden" />
                        <x-input id="name" value="{{$role->name ?? null}}" required />
                        <x-button />
                    </x-form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <x-card header="Role List">
                <x-data-table dataUrl="/setting/roles" id="roles" :columns="$columns" />
            </x-card>
        </div>
    </div>
</x-admin>