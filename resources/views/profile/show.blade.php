@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Perfil</h1>
    <div class="mt-0 sm:mt-1">
        @livewire('navigation-menu')
    </div>
@stop

@section('content')
    <x-app-layout>
        {{-- <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Profile') }}
                    </h2>
                </x-slot> --}}
        <div class="max-w-7x1 mx-auto py-2 sm:px-6 lg:px-6">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="mt-0 sm:mt-1">
                    @livewire('profile.update-profile-information-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-0 sm:mt-1">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-0 sm:mt-1">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-0 sm:mt-1">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-0 sm:mt-1">
                    @livewire('profile.delete-user-form')
                </div>
            @endif

        </div>

    </x-app-layout>

@stop
