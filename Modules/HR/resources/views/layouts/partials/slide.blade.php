
{{-- <x-core::slides.slide-section :value="__('Human Resource')" /> --}}

<x-core::slides.slide-menu :value="__('Human Resource')">
@module('Departments')
    @include('departments::layouts.partials.slide')
@endmodule
@module('Positions')
    @include('positions::layouts.partials.slide')
@endmodule
@module('Employees')
    @include('employees::layouts.partials.slide')
@endmodule

@module('Attendances')
    @include('attendances::layouts.partials.slide')
@endmodule
</x-core::slides.slide-menu>
