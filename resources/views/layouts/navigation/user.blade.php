<x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
  {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('user.booking')" :active="request()->routeIs('user.booking*')">
  {{ __('Book') }}
</x-nav-link>
<x-nav-link :href="route('user.history')" :active="request()->routeIs('user.history*')">
  {{ __('History') }}
</x-nav-link>
