<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $equipment->name }}</td>
    
    @if(getCrudConfig('Equipment')->delete or getCrudConfig('Equipment')->update)
        <td>

            @if(getCrudConfig('Equipment')->update && hasPermission(getRouteName().'.equipment.update', 0, 0, $equipment))
                <a href="@route(getRouteName().'.equipment.update', $equipment->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Equipment')->delete && hasPermission(getRouteName().'.equipment.delete', 0, 0, $equipment))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Equipment') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Equipment') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
