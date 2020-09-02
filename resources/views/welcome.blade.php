<x-layout>
    <x-section>
        <x-tabs active="Second">
            <x-tab name="First">
                First tab content here
            </x-tab>
            <x-tab name="Second">
                Second tab content here
            </x-tab>
            <x-tab name="Third">
                Third tab content here
            </x-tab>
        </x-tabs>
    </x-section>
    {{--<x-section>
        <x-dropdown>
            <x-slot name="trigger">
                <button>Click Me</button>
            </x-slot>
            <x-dropdown-link href="/">One</x-dropdown-link>
            <x-dropdown-link href="/two">Two</x-dropdown-link>
            <x-dropdown-link href="/3">Three</x-dropdown-link>
        </x-dropdown>

        <p>
            boom daddy was here
        </p>
    </x-section>--}}

    {{--<x-section>Boom Daddy was here!</x-section>--}}
    {{--<x-flash type="warning">Boom Daddy was here!</x-flash>--}}

    {{--<x-flash class="border-t">A very fine day in my mind!</x-flash>--}}

    {{--<x-modal title="Deactivate Your Account, Bitch?" submit-label="Deactivate">
        <x-slot name="trigger">
            <button @click="on = true">Show Modal</button>
        </x-slot>

        You really wanna do this?
    </x-modal>--}}

    {{--<x-modal title="Subscribe, Bitch?" submit-label="Subscribe or Die">
        <x-slot name="trigger">
            <button @click="on = true">Show Modal</button>
        </x-slot>

        You <span class="font-bold font-italic">know</span> you wanna do this...
    </x-modal>--}}
</x-layout>
