<?php

return [
    'label' => 'Kota',
    'model' => \App\Models\MdDistricts::class,

    // optional, if you want to override the default Table
    //'table' => \App\Http\Livewire\Table\UserCustomTable::class

    'schema' => [
        [
            'name' => 'district_code',
            'type' => \Laravolt\Fields\Field::TEXT,
            'label' => 'Kode Kota',
            'rules' => ['required', 'max:10'],
        ],
        [
            'name' => 'district_name',
            'type' => \Laravolt\Fields\Field::TEXT,
            'label' => 'Nama Kota',
            'rules' => ['required', 'max:30'],
        ],
        [
            'name' => 'branch_code',
            'type' => \Laravolt\Fields\Field::DROPDOWN_DB,
            'query' => "SELECT branch_code as id ,branch_name AS name FROM md_branches WHERE is_active = 1",
            'label' => 'Cabang',
            'rules' => ['required'],
        ],
        [
            'name' => 'district_postalcode',
            'type' => \Laravolt\Fields\Field::NUMBER,
            'label' => 'Kodepos',
        ],
        [
            'name' => 'is_active',
            'type' => \Laravolt\Fields\Field::DROPDOWN,
            'label' => 'Status',
            'options' => [1 => 'Aktif', 0 => 'Tidak Aktif'],
        ]
    ],
];

