<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Session') }}
    </h2>
  </x-slot>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex mb-3">
        <a href="{{ route('session.create') }}" class="no-underline">
          <x-primary-button>
            {{ __('Add New Session') }}
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
                Doctor Name
              </th>
              <th scope="col" class="px-6 py-3">
                Start Time
              </th>
              <th scope="col" class="px-6 py-3">
                End Time
              </th>
              <th scope="col" class="px-6 py-3">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sessions as $item)
              <tr class="bg-white border-b">
                <td class="px-6 py-4">
                  {{ $loop->iteration }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                  {{ $item->user->name }}
                </th>
                <td class="px-6 py-4">
                  {{ $item->start_time }}
                </td>
                <td class="px-6 py-4">
                  {{ $item->end_time }}
                </td>
                <td class="px-6 py-4 flex">
                  <a href="{{ route('session.edit', $item->id) }}"
                    class="mr-2 font-medium text-blue-600 hover:underline">Edit</a>
                  <form method="POST" action="{{ route('session.destroy', $item->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="font-medium text-red-600 hover:underline"
                      onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <nav class="flex items-center justify-between p-4 border-t" aria-label="Table navigation">
          <span class="text-sm font-normal text-gray-500">
            Showing <span class="font-semibold text-gray-900">{{ $sessions->firstItem() }}</span>
            - <span class="font-semibold text-gray-900">{{ $sessions->lastItem() }}</span>
            of <span class="font-semibold text-gray-900">{{ $sessions->total() }}</span>
          </span>
          {{ $sessions->links() }}
        </nav>
      </div>
    </div>
  </div>
</x-app-layout>
