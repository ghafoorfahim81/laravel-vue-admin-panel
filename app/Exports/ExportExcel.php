<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
class ExportExcel implements WithMultipleSheets
{
    public $data;
    public $other;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($other,$data=null)
    {
        $this->data=$data;
        $this->other=$other;
    }

    public function sheets(): array
    {
        return [
            new ClientReferral('',$this->data),
            new ClientHotline('',$this->data),
        ];
    }


}
