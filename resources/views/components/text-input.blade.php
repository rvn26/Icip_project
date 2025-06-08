@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-orange2 focus:ring-orange2 rounded-md shadow-sm']) }}>
