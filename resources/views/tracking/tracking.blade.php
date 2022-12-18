<x-volt-app title="Lacak">
    <x-volt-breadcrumb>
        <x-volt-item><a href="{{ route('home') }}">Monitoring</a></x-volt-item>
        <x-volt-item>Lacak</x-volt-item>
    </x-volt-breadcrumb>
    @livewire(\App\Http\Livewire\Table\Tracking::class)
</x-volt-app>
<script>
    $(document).ready(function(){
        $('tbody').hide(); //Default state

        $("input:text").keypress(function(){
            $('tbody').show();
        });
    });
</script>
