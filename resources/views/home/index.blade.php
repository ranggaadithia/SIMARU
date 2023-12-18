@extends('layouts.index')

@section('container')
 


<livewire:success-booking/>

<livewire:navbar />



@auth
    <livewire:modal-booking :user="Auth::user()" :labs="$labs" :timeMappings="$timeMappings"  />
@endauth

<livewire:schedule-calendar :labs="$labs" />

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
  // const toasty = document.getElementById('static-example');    
  //   toasty.classList.replace('data-[te-toast-show]:hidden', 'data-[te-toast-show]:block')
    
  //   setTimeout(() => {
  //     toasty.classList.replace('data-[te-toast-show]:block', 'data-[te-toast-show]:hidden')
  //   }, 5000);

  Swal.fire({
    position: "top-end",
    title: 'Success!',
    text: 'Booking anda berhasil didaftarkan!.',
    showConfirmButton: false,
    timerProgressBar: true,
    timer: 1500,
    icon:'success',
  })
});

</script>

@endpush

@endsection