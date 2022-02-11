@extends('layouts.admin-panel')
@section('admin-panel-body')
<ul class="list-group">

    @foreach ($permissions as $permission)
    
        <li class="list-group-item flex justify-between h-16">
            <div>
                {{ $permission->title }}
            </div>

            <div class="flex">
                <form method="GET" action="{{ route('permissions.edit', $permission->id) }}">
                    @csrf
                    <x-button class="bg-warning ml-1">
                        {{ __('Edit') }}
                    </x-button>
                </form>

                <form method="DELETE" action="{{ route('permissions.destroy', $permission->id) }}">
                    @csrf
                    <x-button class="bg-danger ml-1">
                        {{ __('Delete') }}
                    </x-button>
                </form>
            </div>
        </li>

    @endforeach
    
</ul>
@endsection