<?php

namespace App\Exports; 

use App\Models\Project; 
use BaconQrCode\Writer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Maatwebsite\Excel\Concerns\WithProperties;
use function Illuminate\Session\write;

class ProjectExport implements FromView,WithTitle,WithEvents
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
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function registerEvents(): array
    {
        return [
            BeforeWriting::class    => function(BeforeWriting $event) {
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet()->getProtection()->setPassword('PhpSpreadsheet');
                $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
                $spreadsheet->getActiveSheet()->getProtection()->setSort(true);
                $spreadsheet->getActiveSheet()->getProtection()->setInsertRows(true);
                $spreadsheet->getActiveSheet()->getProtection()->setFormatCells(true);
            },
        ];
    }
    public function view(): View
    { 
        
        $data  = Project::all();
        return view('project.single-project',$data);
    }

    public function title(): string
    {
        return 'Referral Database';
    }
}
