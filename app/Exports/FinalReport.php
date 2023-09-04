<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FinalReport implements FromView
{
    public $project_id;
    public function __construct($project_id=null)
    {
        $this->project_id=$project_id;
    }

    public function view(): View
    {
        $data['project'] = (new Project())->finalReport($this->project_id);

        $data['paidBinificiaries'] = (new Project())->paidBinificiaries($this->project_id);
        $data['paidAmount'] = (new Project())->paidAmount($this->project_id);

        return view('project.final-report',$data);
    }
}
