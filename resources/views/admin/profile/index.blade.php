<x-layout.main>

    <x-slot:title>{{ 'User Profile Details' }}</x-slot:title>

    <x-slot:pagename>{{ 'Profile' }}</x-slot:pagename>

    <x-profile>
        <x-slot:guard>{{'panel'}}</x-slot:guard>
    </x-profile>

</x-layout.main>