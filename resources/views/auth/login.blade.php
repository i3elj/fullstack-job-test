<x-guest-layout>
    <form method="POST" action="{{ route('login') }}" class="flex items-center justify-center w-full h-72">
        @csrf

        <x-primary-button>
            {{ __('Log in') }}
        </x-primary-button>
    </form>
</x-guest-layout>
