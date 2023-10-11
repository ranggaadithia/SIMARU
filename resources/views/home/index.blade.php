@extends('layouts.index')

@section('container')
 {{-- <div class="flex gap-x-2">
  @if (Route::has('login'))
  <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
      @auth
      {{ Auth::user()->name }}
          <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>

          <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="dark:text-white ">Logout</button>
          </form>
      @else
          <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

          @if (Route::has('register'))
              <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
          @endif
      @endauth
  </div>
  @endif
 </div> --}}
 

 {{-- <form  wire:submit="save" method="POST">
    @csrf
    <div class="">
    <label for="">Nama Peminjam</label>
    <div class="relative mb-3" data-te-input-wrapper-init>
        <input
        type="text"
        class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-500 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
        id="exampleFormControlInput5"
        placeholder="Disabled input"
        aria-label="Disabled input example"
        value="{{ $user->name }} ({{ $user->role }})"
        disabled />
        </div>
    </div>
<div class="mb-3">
    <label for="lab">Pilih Lab</label>
    <select data-te-select-init data-te-select-filter="true" data-te-select-option-height="52" name="lab_id" id="lab" wire:model="lab_id">
    <option selected>Pilih Lab</option>
    @foreach ($labs as $lab)
    <option value="{{ $lab->id }}" data-te-select-secondary-text="kapasitas: {{ $lab->capacity }}">{{ $lab->name }}</option>
    @endforeach
    </select>
    <div>
        @error('lab_id') <span class="error">{{ $message }}</span> @enderror
    </div>
</div>

    <div class="mb-3">
    <label for="keperluan">keperluan</label>
    <div class="relative mb-3" data-te-input-wrapper-init>
    <textarea
        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
        id="tujuan peminjaman"
        rows="3"
        name="reason_to_booking"
        placeholder="tuliskan keperluan anda disini" wire:model="reason_to_booking"></textarea>
        <div>
            @error('reason_to_booking') <span class="error">{{ $message }}</span> @enderror
        </div>
        
    </div>
    <div class="mb-3">
    <label for="keperluan">Pilih Tanggal</label>
    <div
    class="relative mb-3"
    id="datepicker-disable-past"
    data-te-input-wrapper-init
    data-te-datepicker-init>
    <input
        type="text"
        class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
        placeholder="pilih tanggal peminjaman"
        name="booking_date"
        wire:model="booking_date"
        data-te-datepicker-toggle-ref
        data-te-datepicker-toggle-button-ref />
    </div>
    <div class="mb-3">
    <div class="flex gap-x-5">
        <div class="">
        <label for="">Jam Mulai</label>
        <select data-te-select-init data-te-select-option-height="52" name="start_time" wire:model="start_time">
            <option selected>pilih jam</option>
            @foreach ($timeMappings as $key => $value)
            <option value="{{ $key }}" data-te-select-secondary-text="{{ $value[0] }} - {{ $value[1] }}">
            {{ $key }}
            </option>
            @endforeach
        </select>
        </div>
        <div class="">
        <label for="">Jam Selesai</label>
        <select data-te-select-init data-te-select-option-height="52" name="end_time" wire:model="end_time">
            <option selected>pilih jam</option>
            @foreach ($timeMappings as $key => $value)
            <option value="{{ $key }}" data-te-select-secondary-text="{{ $value[0] }} - {{ $value[1] }}">
            {{ $key }}
            </option>
            @endforeach
        </select>
        </div>
    </div>
    </div>
    </div>
</div>
</div>


<!--Modal footer-->
<div
    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
    <button
    type="button"
    class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
    data-te-modal-dismiss
    data-te-ripple-init
    data-te-ripple-color="light">
    Close
    </button>
    <button
    type="submit"
    class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
    data-te-ripple-init
    data-te-ripple-color="light">
    Booking Lab
    </button>
</form> --}}
<!-- Button trigger modal -->



@auth
{{-- <livewire:modal-booking :user="Auth::user()" :labs="$labs" :timeMappings="$timeMappings"  /> --}}

<livewire:modal-booking :user="Auth::user()" :labs="$labs" :timeMappings="$timeMappings"  />
@endauth
<!-- Modal -->

<livewire:schedule-calendar :labs="$labs" />

@push('scripts')
<script>


  const datepickerDisablePast = document.getElementById('datepicker-disable-past');
  new te.Datepicker(datepickerDisablePast, {
    disablePast: true
  });

Livewire.on('close-modal', function () {
    // Menutup modal dengan data-te-modal-dismiss
    const modal = document.querySelector('[data-te-modal-init]');
    modal.click();
});
</script>
@endpush

@endsection