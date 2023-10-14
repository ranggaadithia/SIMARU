<div>
    <button
    type="button"
    class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
    data-te-toggle="modal"
    data-te-target="#exampleModal"
    data-te-ripple-init
    data-te-ripple-color="light">
    booking lab
    </button>

    <div
    wire:ignore.self
    data-te-modal-init
    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div
    wire:ignore.self
        data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[700px]">
        <div
        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
        <div
            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
            <!--Modal title-->
            <h5
            class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
            id="exampleModalLabel">
            Booking Lab
            </h5>
            <!--Close button-->
            <button
            type="button"
            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
            data-te-modal-dismiss
            aria-label="Close"
            id="closeModal"
            >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6">
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
        </div>

        <!--Modal body-->
        <div class="relative flex-auto p-4" data-te-modal-body-ref>
        @if (session('conflict'))
            <div
                class="mb-3 hidden w-full items-center rounded-lg bg-warning-100 px-6 py-5 text-base text-warning-800 data-[te-alert-show]:inline-flex"
                role="alert"
                data-te-alert-init
                data-te-alert-show>
                {{ session('conflict') }}
                <button
                    type="button"
                    class="ml-auto box-content rounded-none border-none p-1 text-warning-900 opacity-50 hover:text-warning-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-alert-dismiss
                    aria-label="Close">
                    <span
                    class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="h-6 w-6">
                        <path
                        fill-rule="evenodd"
                        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                        clip-rule="evenodd" />
                    </svg>
                    </span>
                </button>
            </div>
            @endif
            <form  wire:submit="bookingLab">
            <div class="">
                <label for="name">Nama Peminjam</label>
                <div class="relative mb-3" data-te-input-wrapper-init>
                    <input
                    type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-neutral-100 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:bg-neutral-700 dark:text-neutral-500 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                    id="name"
                    placeholder="Disabled input"
                    aria-label="Disabled input example"
                    value="{{ $user->name }} ({{ $user->role }})"
                    disabled />
                </div>
            </div>
            <div class="mb-3">
                <label for="lab_id">Pilih Lab<span class="text-red-500">*</span></label>
                <select name="lab_id" id="lab_id" wire:model="lab_id" class="w-full py-2 px-1 rounded-md border @error('lab_id') border-red-600 @enderror">

                <option selected>Pilih Lab</option>
                @foreach ($labs as $lab)
                <option value="{{ $lab->id }}" class="py-4">{{ $lab->name }} ({{ $lab->capacity }})</option>
                @endforeach
                </select>
                <div class="text-red-600">
                    @error('lab_id'){{ $message }} @enderror
                </div>
            </div>
        
            <div class="mb-3">
                <label for="keperluan">Keperluan<span class="text-red-500">*</span></label>
                <div class="relative mb-3">
                <textarea
                    class="border @error('reason_to_booking') border-red-600 @enderror w-full p-2 rounded-md"
                    id="keperluan"
                    rows="3"
                    name="reason_to_booking"
                    placeholder="tuliskan keperluan anda disini" wire:model="reason_to_booking"
                    ></textarea>
                    <div class="text-red-600 -mt-1">
                        @error('reason_to_booking') {{ $message }}@enderror
                    </div>
            </div>
            <div class="mb-3">
                <label for="tanggal_peminjaman">Pilih Tanggal<span class="text-red-500">*</span></label>
                <div
                class="mb-3 relative border @error('booking_date') border-red-600 @enderror w-full rounded-md"
                id="datepicker-disable-past"
                data-te-input-wrapper-init
                data-te-datepicker-init>
                <input
                    type="text"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none"
                    placeholder="pilih tanggal peminjaman"
                    id="tanggal_peminjaman"
                    name="booking_date"
                    wire:model="booking_date"
                    autocomplete="off"
                    data-te-datepicker-toggle-ref
                    data-te-datepicker-toggle-button-ref />
                </div>
                <div class="text-red-600">
                    @error('booking_date') {{ $message }}@enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="flex gap-x-5">
                    <div class="">
                        <label for="jam_mulai">Jam Mulai<span class="text-red-500">*</span></label>
                        <select id="jam_mulai" class="w-full py-2 border @error('end_time') border-red-600 @enderror rounded-md px-1" wire:model="start_time">
                            <option selected>pilih jam</option>
                            @foreach ($timeMappings as $letter => $time)
                            <option value="{{ $letter }}">
                            {{ $letter }}
                            </option>
                            @endforeach
                        </select>

                        <div class="text-red-600 ">
                            @error('start_time') {{ $message }}@enderror
                        </div>
                    </div>
                    <div class="">
                        <label for="jam_selesai">Jam Selesai<span class="text-red-500">*</span></label>
                        <select id="jam_selesai" class="w-full py-2 border @error('end_time') border-red-600 @enderror rounded-md px-1" wire:model="end_time">
                            <option selected>pilih jam</option>
                            @foreach ($timeMappings as $letter => $time)
                            <option value="{{ $letter }}">
                            {{ $letter }}
                            </option>
                            @endforeach
                        </select>
                        <div class="text-red-600 ">
                            @error('end_time') {{ $message }}@enderror
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
        </form>
        </div>
        </div>
    </div>
    </div>

</div>

@push('scripts')
<script>
    const datepickerDisablePast = document.getElementById('datepicker-disable-past');
    new te.Datepicker(datepickerDisablePast, {
    disablePast: true
    });
</script>
@endpush