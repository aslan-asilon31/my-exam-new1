<x-card :title="$title" shadow separator class="border shadow">

    <x-button label="create" link="{{ $url . '/create' }}" class="btn-sm btn-ghost btn-outline" />


    <livewire:admin.role.component.role-table class="bg-white p-2 m-2" />

</x-card>
