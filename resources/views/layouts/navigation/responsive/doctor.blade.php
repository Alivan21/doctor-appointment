<x-responsive-nav-link :href="route('doctor.dashboard')" :active="request()->routeIs('doctor.dashboard')">
  {{ __('Dashboard') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('doctor.session')" :active="request()->routeIs('doctor.session*')">
  {{ __('Session') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('doctor.appointment')" :active="request()->routeIs('doctor.appointment*')">
  {{ __('Appointment') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('doctor.patient')" :active="request()->routeIs('doctor.patient*')">
  {{ __('Patient') }}
</x-responsive-nav-link>
