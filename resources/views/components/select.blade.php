<select {{ $attributes->merge(['class' => 'mt-12 px-3 py-2 rounded-lg 
bg-gray-50 hover:bg-gray-200 focus:border-blue-500
dark:bg-neutral-600 dark:hover:bg-neutral-600 dark:focus:border-blue-500']) }}>
{{$slot}}
</select>
