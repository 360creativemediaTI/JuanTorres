<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $league->name }}</td>
    <td class="">{{ $league->status }}</td>
    
    @if(getCrudConfig('League')->delete or getCrudConfig('League')->update)
        <td>

            @if(getCrudConfig('League')->update && hasPermission(getRouteName().'.league.update', 0, 0, $league))
                <a href="@route(getRouteName().'.league.update', $league->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('League')->delete && hasPermission(getRouteName().'.league.delete', 0, 0, $league))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('League') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('League') ]) }}</p>
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
