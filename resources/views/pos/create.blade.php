<x-volt-app title="Entri Resi">

    {!! form()->open()->post()->action(route('pos.store'))->horizontal() !!}
    <x-volt-panel>

        {!! form()->timepicker('cn_date', date('d-m-Y'))->withTime()->label('Tanggal')->readonly() !!}
        {!! form()->text('cn_no')->label('No. Resi')->hint('Kosongkan untuk generate dari sistem') !!}

        @php
            $query = "SELECT district_code as id, district_name name from md_districts where is_active = 1 order by district_name"
        @endphp
        {!!  form()->dropdownDB('cn_destcity', $query, 'id', 'name')->label('Kota Tujuan')->id('destcity')->required() !!}

        @php
            $query = "SELECT code_code as id, code_name name from md_codes where code_codegroup = 'SRV' and is_active = 1 order by code_name"
        @endphp
        {!!  form()->dropdownDB('cn_service', $query, 'id', 'name')->label('Jenis Layanan')->id('service')->required() !!}

        @php
            $query = "SELECT code_code as id, code_name name from md_codes where code_codegroup = 'SHT' and is_active = 1 order by code_name"
        @endphp
        {!!  form()->dropdownDB('cn_goods_type', $query, 'id', 'name')->label('Jenis Pengiriman')->id('goods_type')->required() !!}

        {!! form()->number('cn_qty')->label('Koli')->min(0)->id('qty')->required() !!}
        {!! form()->number('cn_weight')->label('Berat')->min(0)->id('weight')->required() !!}
        {!! form()->rupiah('cn_freightcharge_amount')->label('Biaya Kirim')->id('freightcharge')->readonly()->required() !!}

    </x-volt-panel>

    <x-volt-panel title="Pengirim" icon="user-plus">

        {!! form()->text('cn_shipper_name')->label('Nama')->required() !!}
        {!! form()->text('cn_shipper_adress')->label('Alamat')->required() !!}
        {!! form()->text('cn_shipper_phone')->label('No.Telp')->required() !!}
        {!! form()->text('cn_shipper_email')->label('Email') !!}

    </x-volt-panel>

    <x-volt-panel title="Penerima" icon="user-plus">

        {!! form()->text('cn_receiver_name')->label('Nama')->required() !!}
        {!! form()->text('cn_receiver_adress')->label('Alamat')->required() !!}
        {!! form()->text('cn_receiver_phone')->label('No.Telp')->required() !!}
        {!! form()->text('cn_receiver_email')->label('Email') !!}

    </x-volt-panel>
        {!! form()->action(form()->submit(__('Save')), form()->link(__('Cancel'), route('pos.create'))) !!}
        {!! form()->close() !!}

        @push('body')
            <script>
                $(function () {
                    
                    $('#weight').on('change', function (e) {
                        $.ajax({
                            url: '/getprice',
                            type: 'post',
                            data: {},
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $("#iname").value = data.info;
                                    alert("sucecess");
                                } else {
                                    alert('Cannot find info');
                                }
                            }
                        });
                    });
                });
            </script>
        @endpush
</x-volt-app>
