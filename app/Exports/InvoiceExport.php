<?php

namespace App\Exports;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
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

class InvoiceExport implements FromView,WithTitle
{
    public $invoice_id;
    public function __construct($invoice_id=null)
    {
        $this->invoice_id = $invoice_id;
    }

    public function view(): View
    {
        $data['invoice'] = (new Invoice())->invoiceReport($this->invoice_id);
//        dd($data['invoice']->currency);
        $data['invoice_details']  = (new InvoiceDetails())->getInvoiceDetails($this->invoice_id);
//        dd($data['invoice_details']);
        $company    = Company::where('id', auth()->user()->current_company)->first()->name;
        if (stripos($company, 'unhcr cbi') !== false) {
            return view('invoice.exports.unhcr-cbi-excel',$data);
        }
        elseif(stripos($company, 'who') !== false)
        {
            return view('invoice.exports.who-excel',$data);
        }
        elseif(stripos($company, 'wfp') !== false)
        {
            return view('invoice.exports.wfp-excel',$data);
        }
        elseif(stripos($company, 'unhcr admin') !== false)
        {
            return view('invoice.exports.unhcr-admin-excel',$data);
        }
    }

    public function title(): string
    {
        return 'Referral Database';
    }
}
