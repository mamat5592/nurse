@extends('layouts.admin-panel')
@section('admin-panel-body')
<ul class="list-group">

    @foreach ($roles as $role)
    
        <li class="list-group-item flex justify-between h-16">
            <div>
                {{ $role->name }}
            </div>

            <div class="flex">
                <form method="GET" action="{{ route('roles.edit', $role->id) }}">
                    @csrf
                    <x-button class="bg-warning ml-1">
                        {{ __('Edit') }}
                    </x-button>
                </form>

                <form method="DELETE" action="{{ route('roles.destroy', $role->id) }}">
                    @csrf
                    <x-button class="bg-danger ml-1">
                        {{ __('Delete') }}
                    </x-button>
                </form>
            </div>
        </li>

    @endforeach
</ul>

<form method="GET" action="{{ route('roles.create') }}">
    @csrf
    <x-button class="my-3 bg-success">
        {{ __('Add New Role') }}
    </x-button>
</form>
@endsection