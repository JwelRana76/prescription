<x-admin>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Create User</h3>
                </div>
                <div class="card-body">
                    <x-form action="{{route('user.store')}}" method="post" id="user_create">
                        <x-input id="id" value="{{$user->id ?? null}}" type="hidden" />
                        <x-input id="name" value="{{$user->name ?? null}}" required />
                        <x-input id="username" value="{{$user->username ?? null}}" required />
                        <x-input id="password" type="password" required />
                        <x-input id="conform_password" type="password" required />
                        <x-button />
                    </x-form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <x-card header="User List">
                <x-data-table dataUrl="/setting/user" id="users" :columns="$columns" />
            </x-card>
        </div>
    </div>
</x-admin>