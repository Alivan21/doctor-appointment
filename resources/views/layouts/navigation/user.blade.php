<x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
  {{ __('Dashboard') }}
</x-nav-link>
