{{-- create button component --}}
<button
    type="{{ $type ?? 'button' }}"
    class="btn {{ $class ?? 'btn-primary' }} {{ $size ?? '' }} {{ $disabled ? 'disabled' : '' }}"
    @if(isset($attributes)) {{ $attributes->merge(['class' => 'btn']) }} @endif
    @if(isset($id)) id="{{ $id }}" @endif
    @if(isset($name)) name="{{ $name }}" @endif
    @if(isset($value)) value="{{ $value }}" @endif
    @if(isset($disabled) && $disabled) disabled @endif
    @if(isset($onclick)) onclick="{{ $onclick }}" @endif
    @if(isset($form)) form="{{ $form }}" @endif
    @if(isset($title)) title="{{ $title }}" @endif
    @if(isset($ariaLabel)) aria-label="{{ $ariaLabel }}" @endif
    @if(isset($ariaDescribedBy)) aria-describedby="{{ $ariaDescribedBy }}" @endif
    @if(isset($ariaControls)) aria-controls="{{ $ariaControls }}" @endif
    @if(isset($ariaExpanded)) aria-expanded="{{ $ariaExpanded }}" @endif
    @if(isset($ariaPressed)) aria-pressed="{{ $ariaPressed }}" @endif
    @if(isset($ariaHasPopup)) aria-haspopup="{{ $ariaHasPopup }}" @endif
    @if(isset($ariaControls)) aria-controls="{{ $ariaControls }}" @endif
    @if(isset($ariaLabelledBy)) aria-labelledby="{{ $ariaLabelledBy }}" @endif
    @if(isset($dataAttributes))
        @foreach($dataAttributes as $key => $value)
            data-{{ $key }}="{{ $value }}"
        @endforeach
    @endif
>
    @if(isset($icon))
        <i class="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</button>
{{-- Usage example --}}
{{-- <x-form.fields.button type="submit" class="btn-success" icon="fas fa-check" onclick="submitForm()">Submit</x-form.fields.button> --}}
{{-- <x-form.fields.button type="button" class="btn-secondary" id="cancelButton">Cancel</x-form.fields.button> --}}
{{-- <x-form.fields.button type="reset" class="btn-danger" title="Reset Form">Reset</x-form.fields.button> --}}
{{-- <x-form.fields.button type="button" class="btn-info" aria-label="Info Button">Info</x-form.fields.button> --}}
{{-- <x-form.fields.button type="button" class="btn-warning" aria-controls="controlElement" aria-expanded="false">Warning</x-form.fields.button> --}}
{{-- <x-form.fields.button type="button" class="btn-light" aria-pressed="false" aria-haspopup="true">Light</x-form.fields.button> --}}
{{-- <x-form.fields.button type="button" class="btn-dark" aria-labelledby="labelElement">Dark</x-form.fields.button> --}}

{{-- Note: The component can be used with various attributes like size, disabled, onclick, form, etc. --}}
{{-- Ensure to pass the necessary attributes when using the component in your Blade templates. --}}
{{-- Example usage in a Blade template: --}}
{{-- <x-form.fields.button type="submit" class="btn-primary" id="submitBtn" name="submit" value="Submit" onclick="handleSubmit()">Submit</x-form.fields.button> --}}
{{-- This will render a button with the specified attributes and classes. --}}
{{-- You can also pass additional data attributes using the dataAttributes array. --}}
{{-- Example: --}}
{{-- <x-form.fields.button type="button" class="btn-secondary" dataAttributes="{ 'toggle': 'modal', 'target': '#myModal' }">Open Modal</x-form.fields.button> --}}
{{-- This will render a button with data-toggle and data-target attributes for Bootstrap modals. --}}
{{-- The component is flexible and can be customized as per your requirements. --}}
{{-- Make sure to include the necessary CSS classes in your project for styling the buttons. --}}
{{-- You can also use this component in your forms to create buttons with different functionalities. --}}
{{-- The component supports various attributes like id, name, value, disabled, onclick, form, title, aria-labels, and data attributes. --}}
{{-- This allows you to create buttons that are accessible and functional in your web applications. --}}

{{-- Example usage in a Blade template --}}
{{-- <x-form.fields.button type="submit" class="btn-primary" id="submitBtn" name="submit" value="Submit" onclick="handleSubmit()">Submit</x-form.fields.button> --}}
{{-- This will render a button with the specified attributes and classes. --}}
{{-- You can also pass additional data attributes using the dataAttributes array. --}}
{{-- Example: --}}
{{-- <x-form.fields.button type="button" class="btn-secondary" dataAttributes="{ 'toggle': 'modal', 'target': '#myModal' }">Open Modal</x-form.fields.button> --}}
{{-- This will render a button with data-toggle and data-target attributes for Bootstrap modals. --}}
{{-- The component is flexible and can be customized as per your requirements. --}}
{{-- Make sure to include the necessary CSS classes in your project for styling the buttons. --}}
{{-- You can also use this component in your forms to create buttons with different functionalities. --}}
{{-- The component supports various attributes like id, name, value, disabled, onclick, form, title, aria-labels, and data attributes. --}}
{{-- This allows you to create buttons that are accessible and functional in your web applications. --}}

{{-- Note: Ensure to include the necessary CSS classes in your project for styling the buttons. --}}
{{-- The component is designed to be flexible and customizable, allowing you to create buttons that fit your application's needs. --}}
{{-- You can also use this component in your forms to create buttons with different functionalities. --}}
{{-- The component supports various attributes like id, name, value, disabled, onclick, form, title, aria-labels, and data attributes. --}}
{{-- This allows you to create buttons that are accessible and functional in your web applications. --}}

{{-- Example usage in a Blade template --}}
{{-- <x-form.fields.button type="submit" class="btn-primary" id="submitBtn" name="submit" value="Submit" onclick="handleSubmit()">Submit</x-form.fields.button> --}}
{{-- This will render a button with the specified attributes and classes. --}}
{{-- You can also pass additional data attributes using the dataAttributes array. --}}
{{-- Example: --}}
{{-- <x-form.fields.button type="button" class="btn-secondary" dataAttributes="{ 'toggle': 'modal', 'target': '#myModal' }">Open Modal</x-form.fields.button> --}}
{{-- This will render a button with data-toggle and data-target attributes for Bootstrap modals. --}}
{{-- The component is flexible and can be customized as per your requirements. --}}
{{-- Make sure to include the necessary CSS classes in your project for styling the buttons. --}}
{{-- You can also use this component in your forms to create buttons with different functionalities. --}}
{{-- The component supports various attributes like id, name, value, disabled, onclick, form, title, aria-labels, and data attributes. --}}
{{-- This allows you to create buttons that are accessible and functional in your web applications. --}}

{{-- Note: Ensure to include the necessary CSS classes in your project for styling the buttons. --}}
{{-- The component is designed to be flexible and customizable, allowing you to create buttons that fit your application's needs. --}}
{{-- You can also use this component in your forms to create buttons with different functionalities. --}}
{{-- The component supports various attributes like id, name, value, disabled, onclick, form, title, aria-labels, and data attributes. --}}
{{-- This allows you to create buttons that are accessible and functional in your web applications. --}}

{{-- Example usage in a Blade template --}}
{{-- <x-form.fields.button type="submit" class="btn-primary" id="submitBtn" name="submit" value="Submit" onclick="handleSubmit()">Submit</x-form.fields.button> --}}
{{-- This will render a button with the specified attributes and classes. --}}
{{-- You can also pass additional data attributes using the dataAttributes array. --}}
{{-- Example: --}}
{{-- <x-form.fields.button type="button" class="btn-secondary" dataAttributes="{ 'toggle': 'modal', 'target': '#myModal' }">Open Modal</x-form.fields.button> --}}
{{-- This will render a button with data-toggle and data-target attributes for Bootstrap modals. --}}
{{-- The component is flexible and can be customized as per your requirements. --}}
{{-- Make sure to include the necessary CSS classes in your project for styling the buttons. --}}
{{-- You can also use this component in your forms to create buttons with different functionalities. --}}
{{-- The component supports various attributes like id, name, value, disabled, onclick, form, title, aria-labels, and data attributes. --}}
{{-- This allows you to create buttons that are accessible and functional in your web applications. --}}
