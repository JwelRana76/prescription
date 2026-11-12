<x-admin>
    <x-card header="User List">
        <x-table dataUrl="/setting/user" id="users" :columns="$columns" />
    </x-card>
</x-admin>