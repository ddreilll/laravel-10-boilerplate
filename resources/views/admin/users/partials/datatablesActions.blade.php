{{-- @can($editGate)
    <a class="btn btn-xs btn-info" href="{{ route('' . $crudRoutePart . '.edit', $row->id) }}">
        {{ trans('global.edit') }}
    </a>
@endcan
@can($deleteGate)
    <form action="{{ route('' . $crudRoutePart . '.destroy', $row->id) }}" method="POST"
        onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
    </form>
@endcan --}}

<span class="dropdown">
    <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown"
        aria-expanded="false">Actions</button>
    <div class="dropdown-menu dropdown-menu-end" style="">

        @isset($editGate)
            @can($editGate)
                <a class="dropdown-item"
                    href="{{ auth()->user()->id != $row->id ? route('users.destroy', $row->id) : route('my-profile.edit') }}">
                    {{ trans('global.edit') }}

                </a>
            @endcan
        @endisset

        @isset($deleteGate)
            @can($deleteGate)
                @if (auth()->user()->id != $row->id)
                    <form action="{{ route('users.destroy', $row->id) }}" method="POST" id="{{ $row->id }}-user-destroy">
                        @method('DELETE')
                        @csrf
                        <a href="#" class="menu-link px-3 menu-hover-warning" data-id="{{ $row->id }}"
                            user-destroy="true">
                            <span class="menu-icon">
                                <i class="fa-duotone fa-trash fs-5"></i>
                            </span>
                            <span class="menu-title">Delete</span>
                        </a>
                    </form>
                @endif
            @endcan
        @endisset


    </div>
</span>
