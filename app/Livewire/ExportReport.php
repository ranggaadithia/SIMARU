<?php

namespace App\Livewire;

use Livewire\Component;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel\CSV;

class ExportReport extends Component
{

    public function exportExcel()
    {
        return Excel::download(new ReportExport, 'report-simaru.xlsx');
    }

    public function exportCSV()
    {
        return Excel::download(new ReportExport, 'report-simaru.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
        ]);
    }
    public function render()
    {
        return view('livewire.export-report');
    }
}
