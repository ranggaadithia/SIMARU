@extends('layouts.index')

@section('container')
 


<livewire:success-booking/>

<livewire:navbar />



@auth
    <livewire:modal-booking :user="Auth::user()" :labs="$labs" :timeMappings="$timeMappings"  />
@endauth

<livewire:schedule-calendar :labs="$labs" />

@push('scripts')
<script>

Livewire.on('close-modal', function () {
    // Menutup modal dengan data-te-modal-dismiss
    const modal = document.querySelector('[data-te-modal-init]');
    modal.click();
});

Livewire.on('showModalDetail', function () {
    // Menampilkan modal dengan data-te-modal-init
    const modal = document.getElementById('modalScheduleDetail');
    modal.classList.add('block');
});

Livewire.on('success-booking', function () {
  const toasty = document.getElementById('static-example');    
    toasty.classList.replace('data-[te-toast-show]:hidden', 'data-[te-toast-show]:block')
    
    setTimeout(() => {
      toasty.classList.replace('data-[te-toast-show]:block', 'data-[te-toast-show]:hidden')
    }, 2000);
});

</script>

@endpush

@endsection