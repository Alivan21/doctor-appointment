<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center gap-2">
      <a class="rounded-full bg-gray-800 text-white px-2 py-1 hover:bg-gray-700" href="{{ route('session') }}">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Session') }}
      </h2>
    </div>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <section class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <header>
          <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add New Session') }}
          </h2>
        </header>

        <form method="post" action="{{ route('session.store') }}" class="mt-6 space-y-6">
          @csrf
          <div>
            <x-input-label for="user_id" :value="__('Name')" />
            <select name="user_id" id="user_id"
              class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
              <option value="">Pilih Doctor</option>
              @foreach ($users as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
              @endforeach
            </select>
          </div>

          <div>
            <x-input-label for="start_time" :value="__('Start Time')" />
            <x-text-input id="start_time" name="start_time" type="datetime-local" class="mt-1 block w-full"
              autocomplete="username" />
          </div>

          <div>
            <x-input-label for="end_time" :value="__('End Time')" />
            <x-text-input id="end_time" name="end_time" type="datetime-local" class="mt-1 block w-full"
              autocomplete="username" />
          </div>

          <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'success')
              <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{ __('Doctor created successfully.') }}</p>
            @endif
          </div>
        </form>
      </section>
    </div>
  </div>
</x-app-layout>
