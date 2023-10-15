<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Appointment') }}
    </h2>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">
                #
              </th>
              <th scope="col" class="px-6 py-3">
                Client Name
              </th>
              <th scope="col" class="px-6 py-3">
                Doctor Name
              </th>
              <th scope="col" class="px-6 py-3">
                Appointment Date
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($appointments as $item)
              <tr class="bg-white border-b">
                <td class="px-6 py-4">
                  {{ $loop->iteration }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                  {{ $item->name }}
                </th>
                <td class="px-6 py-4">
                  {{ $item->doctor->name }}
                </td>
                <td class="px-6 py-4">
                  {{ \Carbon\Carbon::parse($item->appointment_date)->isoFormat('D MMMM Y H:MM:SS') }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <nav class="flex items-center justify-between p-4 border-t" aria-label="Table navigation">
          <span class="text-sm font-normal text-gray-500">
            Showing <span class="font-semibold text-gray-900">{{ $appointments->firstItem() }}</span>
            - <span class="font-semibold text-gray-900">{{ $appointments->lastItem() }}</span>
            of <span class="font-semibold text-gray-900">{{ $appointments->total() }}</span>
          </span>
          {{ $appointments->links() }}
        </nav>
      </div>
    </div>
  </div>
</x-app-layout>
