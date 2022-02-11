<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                {{ __('Roles') }}
            </x-nav-link>
            
            <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
                {{ __('Permissions') }}
            </x-nav-link>
        </div>
    </x-slot>
    <div class="container my-3">
        @yield('admin-panel-body')
    </div>
</x-app-layout>
