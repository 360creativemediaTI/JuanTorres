<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $player->name }}</td>
    <td class="">{{ $player->last_name }}</td>
    <td class="">{{ $player->age }}</td>
    <td class="">{{ $player->status }}</td>
    
    @if(getCrudConfig('Player')->delete or getCrudConfig('Player')->update)
        <td>

            @if(getCrudConfig('Player')->update && hasPermission(getRouteName().'.player.update', 0, 0, $player))
                <a href="@route(getRouteName().'.player.update', $player->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Player')->delete && hasPermission(getRouteName().'.player.delete', 0, 0, $player))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Player') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Player') ]) }}</p>
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
