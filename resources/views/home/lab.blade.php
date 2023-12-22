@extends('layouts.index')

@section('container')
 
<livewire:navbar />
<div class="mb-16"></div>

<livewire:lab-schedule :lab="$lab" />

@auth
    <livewire:modal-booking :user="Auth::user()" :labs="$labs" :timeMappings="$timeMappings"  />
@endauth

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    Livewire.on('close-modal', function () {
        // Menutup modal dengan data-te-modal-dismiss
        const modal = document.querySelector('[data-te-modal-init]');
        modal.click();
    });

    Livewire.on('success-booking', function () {
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