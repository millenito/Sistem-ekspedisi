<x-volt-app title="Sukses">

    {!! form()->open()->post()->action(route('pos.create'))->horizontal() !!}
    <x-volt-panel title="Sukses">

        <div class="field"><label>No. Resi</label>
            <input type="text" name="cn_no" value=" {{ session('cn') }} " readonly="readonly">
        </div>

    </x-volt-panel>

    {!! form()->link('Kembali','create') !!}
        {!! form()->close() !!}

</x-volt-app>
