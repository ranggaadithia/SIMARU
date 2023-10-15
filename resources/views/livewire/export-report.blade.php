<div class="d-flex justify-content-between">
  <h3>Laporan Peminjaman Lab</h3>
 <div class="dropdown mb-3">
  <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Download Report
  </button>
  <ul class="dropdown-menu">
    <li><button class="dropdown-item" wire:click="exportExcel">Excel</button></li>
    <li><button class="dropdown-item" wire:click="exportCSV">CSV</button></li>
  </ul>
</div>

</div>
