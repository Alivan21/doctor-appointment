<x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
  {{ __('Dashboard') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('doctor')" :active="request()->routeIs('doctor*')">
  {{ __('Doctor') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('client')" :active="request()->routeIs('client*')">
  {{ __('Patient') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('session')" :active="request()->routeIs('session*')">
  {{ __('Session') }}
</x-responsive-nav-link>
