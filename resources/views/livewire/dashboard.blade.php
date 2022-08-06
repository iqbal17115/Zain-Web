@push('css')

@endpush
<x-app-layout>
    <x-slot name="title">
        {{ __('BRTA') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BRTA') }}
        </h2>
    </x-slot>
    <div class="rounded">
        <!-- start page title -->
        
        <!-- end page title -->

    </div>
</x-app-layout>
@push('scripts')
          <!-- plugin js -->
          <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

          <!-- Calendar init -->
          <script src="{{ URL::asset('assets/js/pages/dashboard.init.js')}}"></script>
          <!-- plugin js -->
@endpush
