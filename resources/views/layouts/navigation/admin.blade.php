<x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
  {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('doctor')" :active="request()->routeIs('doctor*')">
  {{ __('Doctor') }}
</x-nav-link>
<x-nav-link :href="route('client')" :active="request()->routeIs('client*')">
  {{ __('Patient') }}
</x-nav-link>
<x-nav-link :href="route('session')" :active="request()->routeIs('session*')">
  {{ __('Session') }}
</x-nav-link>
<x-nav-link :href="route('appointment')" :active="request()->routeIs('appointment*')">
  {{ __('Appointment') }}
</x-nav-link>
