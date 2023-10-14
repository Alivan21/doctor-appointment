<x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
  {{ __('Dashboard') }}
</x-responsive-nav-link>
