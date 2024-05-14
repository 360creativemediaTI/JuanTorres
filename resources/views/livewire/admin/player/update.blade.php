<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Player') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.player.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Player')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Name Input -->
            <div class='form-group'>
                <label for='input-name' class='col-sm-2 control-label '> {{ __('Name') }}</label>
                <input type='text' id='input-name' wire:model.lazy='name' class="form-control  @error('name') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Last_name Input -->
            <div class='form-group'>
                <label for='input-last_name' class='col-sm-2 control-label '> {{ __('Last_name') }}</label>
                <input type='text' id='input-last_name' wire:model.lazy='last_name' class="form-control  @error('last_name') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('last_name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Age Input -->
            <div class='form-group'>
                <label for='input-age' class='col-sm-2 control-label '> {{ __('Age') }}</label>
                <input type='number' id='input-age' wire:model.lazy='age' class="form-control  @error('age') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('age') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Status Input -->
            <div class='form-group'>
                <label for='input-status' class='col-sm-2 control-label '> {{ __('Status') }}</label>
                <input type='text' id='input-status' wire:model.lazy='status' class="form-control  @error('status') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('status') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.player.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
