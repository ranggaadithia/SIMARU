
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
    data-te-modal-init
    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div
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
            aria-label="Close">
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
            <form action="{{ route('booking') }}" method="POST">
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
            <select data-te-select-init data-te-select-filter="true" data-te-select-option-height="52" name="lab_id" id="lab">
            <option selected>Pilih Lab</option>
            @foreach ($labs as $lab)
            <option value="{{ $lab->id }}" data-te-select-secondary-text="kapasitas: {{ $lab->capacity }}">{{ $lab->name }}</option>
            @endforeach
            </select>
        </div>
        
            <div class="mb-3">
            <label for="keperluan">keperluan</label>
            <div class="relative mb-3" data-te-input-wrapper-init>
            <textarea
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="tujuan peminjaman"
                rows="3"
                name="reason_to_booking"
                placeholder="tuliskan keperluan anda disini"></textarea>
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
                data-te-datepicker-toggle-ref
                data-te-datepicker-toggle-button-ref />
            </div>
            <div class="mb-3">
            <div class="flex gap-x-5">
                <div class="">
                <label for="">Jam Mulai</label>
                <select data-te-select-init data-te-select-option-height="52" name="start_time">
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
                <select data-te-select-init data-te-select-option-height="52" name="end_time">
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
        </form>
        </div>
        </div>
    </div>
    </div>

</div>