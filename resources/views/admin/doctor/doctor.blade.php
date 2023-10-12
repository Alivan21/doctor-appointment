<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Doctor') }}
    </h2>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex mb-3">
        <a href="{{ route('doctors.create') }}" class="no-underline">
          <x-primary-button>
            {{ __('Add Doctor') }}
          </x-primary-button>
        </a>
      </div>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">
                #
              </th>
              <th scope="col" class="px-6 py-3">
                Name
              </th>
              <th scope="col" class="px-6 py-3">
                Email
              </th>
              <th scope="col" class="px-6 py-3">
                Phone Number
              </th>
              <th scope="col" class="px-6 py-3">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $item)
              <tr class="bg-white border-b">
                <td class="px-6 py-4">
                  {{ $loop->iteration }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                  {{ $item->name }}
                </th>
                <td class="px-6 py-4">
                  {{ $item->email }}
                </td>
                <td class="px-6 py-4">
                  {{ $item->phone_number }}
                </td>
                <td class="px-6 py-4">
                  <a href="{{ route('doctors.edit', $item->id) }}"
                    class="mr-2 font-medium text-blue-600 hover:underline">Edit</a>
                  <a href="{{ route('doctors.destroy', $item->id) }}"
                    class="font-medium text-red-600 hover:underline">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <nav class="flex items-center justify-between p-4 border-t" aria-label="Table navigation">
          <span class="text-sm font-normal text-gray-500">
            Showing <span class="font-semibold text-gray-900">{{ $users->firstItem() }}</span>
            - <span class="font-semibold text-gray-900">{{ $users->lastItem() }}</span>
            of <span class="font-semibold text-gray-900">{{ $users->total() }}</span>
          </span>
          {{ $users->links() }}
        </nav>
      </div>
    </div>
  </div>
</x-app-layout>
