@props(['disabled' => $canEdit ?? false])

<label for="remember_me" class="mt-4 inline-flex items-center justify-end">
    <input id="remember_me" type="checkbox" {{ $disabled ? 'disabled' : '' }}
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
        name="remember">
    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $slot }}</span>
</label>
