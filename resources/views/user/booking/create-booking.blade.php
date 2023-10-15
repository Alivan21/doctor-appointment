<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Appointment') }}
    </h2>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <section class="p-6">
          <h3 class="text-gray-900">
            {{ __('Hi, silahkan untuk membuat janji temu dengan dokter disini!') }}
          </h3>
          <form method="post" action="{{ route('user.book_appointment') }}" class="mt-6 space-y-6">
            @csrf
            <div>
              <x-input-label for="name" :value="__('Nama')" />
              <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                autocomplete="name" />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
              <x-input-label for="doctor_id" :value="__('Dokter')" />
              <select name="doctor_id" id="doctor_id"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                <option value="">Pilih Doctor</option>
                @foreach ($doctors as $doctor)
                  <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
              </select>
              <x-input-error :messages="$errors->get('doctor_id')" class="mt-2" />
            </div>

            <div>
              <x-input-label for="appointment_date" :value="__('Waktu Pertemuan')" />
              <x-text-input id="appointment_date" name="appointment_date" type="datetime-local"
                class="mt-1 block w-full" />
              <x-input-error :messages="$errors->get('appointment_date')" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
              <x-primary-button>{{ __('Pesan') }}</x-primary-button>

              @if (session('status') === 'success')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                  class="text-sm text-gray-600">{{ __('Doctor created successfully.') }}</p>
              @endif
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</x-app-layout>
