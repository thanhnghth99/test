<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>
    
    <x-jet-authentication-card>
        
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('user.update', $users->id) }}">
            @csrf
            @method('PUT')
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $users->name }}" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $users->email }}" required />
            </div>

            <div>
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{ $users->phone }}" required autofocus autocomplete="phone" />
            </div>

            <div>
                <x-jet-label for="address" value="{{ __('Address') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $users->address }}" required autofocus autocomplete="address" />
            </div>

            <div class="mt-4">
                <div>
                    <x-jet-label for="name" value="{{ __('Roles') }}" />
                    
                    <div>
                        @foreach($roles as $role)
                        <div class="mt-2">
                            <input                                 
                                <?php
                                foreach ($dataRoles as $dataRole)
                                {
                                    if ($role->id == $dataRole->id)
                                        echo "checked";
                                }
                                ?>
                                type="checkbox" class="rounded-md border border-[#e0e0e0] bg-white px-1 py-1" id="role" name="role[]" value="{{$role->id}}"/>
                            <label for="role" class="mb-3 text-xm font-medium text-[#07074D]">{{ $role->name }}</label><br>
                        </div>
                        @endforeach                       
                    </div>

                    <div class="mt-2">
                        <a href="{{ route('role.create') }}" class="w-full rounded-md border border-[#07074D] bg-white px-1 mb-3 text-xm font-medium text-[#07074D]">+ Add role</a>
                    </div>
                </div>
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div style="margin: 20px 0px 0px 0px">
                <a class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none text-left"
                    href="{{ route('user.index') }}" role="button" style="float: left">
                    Back
                </a>
                <button class="hover:shadow-form rounded-md bg-[red] py-3 px-8 text-base font-semibold text-white outline-none text-right"
                    role="button" style="float: right">
                    Edit
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>

