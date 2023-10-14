<?php

namespace App\Livewire;

use Livewire\Component;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportReport extends Component
{

    public function exportExcel()
    {
        return Excel::download(new ReportExport, 'report-simaru.xlsx');
    }
    public function render()
    {
        return view('livewire.export-report');
    }
}
