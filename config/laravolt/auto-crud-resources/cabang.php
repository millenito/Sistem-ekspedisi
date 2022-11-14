<?php

return [
    'label' => 'Cabang',
    'model' => \App\Models\MdBranches::class,

    // optional, if you want to override the default Table
    //'table' => \App\Http\Livewire\Table\UserCustomTable::class

    'schema' => [
        [
            'name' => 'branch_code',
            'type' => \Laravolt\Fields\Field::TEXT,
            'label' => 'Kode Cabang',
            'rules' => ['required', 'max:6'],
        ],
        [
            'name' => 'branch_name',
            'type' => \Laravolt\Fields\Field::TEXT,
            'label' => 'Nama Cabang',
            'rules' => ['required', 'max:30'],
        ],
        [
            'name' => 'branch_address',
            'type' => \Laravolt\Fields\Field::TEXT,
            'label' => 'Alamat',
        ],
        [
            'name' => 'branch_phone',
            'type' => \Laravolt\Fields\Field::NUMBER,
            'label' => 'No.telp',
        ],
        [
            'name' => 'is_active',
            'type' => \Laravolt\Fields\Field::DROPDOWN,
            'label' => 'Status',
            'options' => [1 => 'Aktif', 0 => 'Tidak Aktif'],
        ]
    ],
];

