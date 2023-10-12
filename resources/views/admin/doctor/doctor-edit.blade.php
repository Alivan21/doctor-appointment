<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center gap-2">
      <a class="rounded-full bg-gray-800 text-white px-2 py-1 hover:bg-gray-700" href="{{ route('doctor') }}">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Doctor') }}
      </h2>
    </div>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <section class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <header>
          <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Doctor') }}
          </h2>
        </header>

        <form method="post" action="{{ route('doctors.update', $user) }}" class="mt-6 space-y-6">
          @csrf
          @method('put')

          <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
              autocomplete="name" value="{{ $user->name }}" />
          </div>

          <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
              autocomplete="username" value="{{ $user->email }}" />
          </div>

          <div>
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
              value="{{ $user->phone_number }}" />
          </div>

          <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'success')
              <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Doctor updated successfully.') }}</p>
            @endif
          </div>
        </form>
      </section>
    </div>
  </div>
</x-app-layout>
