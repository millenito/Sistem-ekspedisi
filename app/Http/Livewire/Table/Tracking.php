<?php

namespace App\Http\Livewire\Table;

use Laravolt\Ui\TableView;
use Laravolt\Suitable\Columns\Text;
use App\Models\TxHistory;

class Tracking extends TableView
{

    private const DEFAULT_PER_PAGE = 10; 
    protected array $perPageOptions = [5, 15, 30, 50, 100, 250];

    public function data()
    {
        $data = TxHistory::with('connote')->where('cn_no','=', strtoupper($this->search))->paginate();
        return $data;
    }

    public function columns(): array
    {
        return [
            Text::make('cn_no','No. Resi'),
            Text::make('cn_processdatetime','Tanggal'),
            Text::make('cn_processdesc','Status')
        ];
    }
}
