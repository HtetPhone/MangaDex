@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="bg-dark text-center text-white rounded w-50 p-3 pb-1 alert-msg">
        <p>{{ session('message') }}</p>
    </div>
@endif
