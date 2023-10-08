@extends('layouts.index')

@section('container')
 <div class="flex gap-x-2">
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
 </div>
 
<!-- Button trigger modal -->

@auth
<x-modal-booking :user="Auth::user()" :labs="$labs" :timeMappings="$timeMappings" />
@endauth
<!-- Modal -->

<div class="mx-auto overflow-x-scroll w-[800px]  xl:w-full lg:overflow-x-hidden lg:mt-5">
  <div class="wrapper bg-white rounded shadow ">
    <div class="header flex justify-between border-b p-2">
      <span class="text-lg font-bold p-2">
        September 2023
      </span>
      <div class="buttons flex items-center lg:mr-3">
        <button class="p-1">
            <svg width="1em" fill="gray" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
              <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
            </svg>
        </button>
        <button class="p-1">
            <svg width="1em" fill="gray" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path fill-rule="evenodd" d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
              <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
      </div>
    </div>
    <table class="overflow-x-scroll w-[800px] xl:w-full lg:overflow-x-hidden">
      <thead>
          <tr>
              <th class="py-2 border-r h-10 md:w-30 sm:w-20 w-10 xl:text-sm text-xs bg-blue-500 text-white lg:w-50">
                  <span class="xl:block lg:block md:block sm:block hidden">Ruangan<br>Hari</span>
                  <span class="xl:hidden lg:hidden md:hidden sm:hidden block bg-blue-500 text-white">Ruangan<br>Hari</span>
              </th>
              @foreach ($weekDates as $week)
                  <th class="p-2 border-r h-10 lg:w-50 md:w-30 sm:w-20 w-10 xl:text-sm text-sm bg-blue-400 text-white">
                      <span class="xl:block lg:block md:block sm:block hidden">{{ $week['day'] }}, {{ $week['date'] }}</span>
                      <span class="xl:hidden lg:hidden md:hidden sm:hidden block bg-blue-400 text-white">{{ $week['day'] }}, {{ $week['date'] }}</span>
                  </th>
              @endforeach
          </tr>
      </thead>
      <tbody>
          @foreach ($labs as $lab)
              <tr class="text-center h-20">
                  <td class="border lg:px-3 h-40 md:w-30 sm:w-20 items-center bg-blue-300 overflow-hidden">
                      <div class="h-40 md:w-30 sm:w-full w-10 mx-auto flex justify-center items-center">
                          <div class="top h-5 p-0 -mx-4">
                              <span class="font-bold text-white">{{ $lab->name }}</span>
                          </div>
                      </div>
                  </td>
                  @foreach ($weekDates as $week)
                      <td class="border h-40 xl:w-20 lg:w-20 md:w-30 sm:w-20 w-10 transition cursor-pointer duration-500 ease hover:bg-gray-300">
                          <div class="flex flex-col h-40 mx-auto sm:w-full">
                              <div class="bottom flex-grow w-full cursor-pointer">
                                  <div class="overflow-hidden pl-4 box-border">
                                      @foreach ($lab->users as $user)
                                          @if ($user->pivot->booking_date === $week['date'])
                                              <div class="flex w-fit">
                                                  <span>|</span>
                                                  <p class="text-left ml-1">
                                                      {{ $user->pivot->reason_to_booking }}
                                                  </p>
                                              </div>
                                          @endif
                                      @endforeach
                                      @foreach ($lab->classSchedules as $classSchedule)
                                          @if ($classSchedule->day == $week['day'])
                                              <div class="flex w-fit">
                                                  <span>|</span>
                                                  <p class="text-left ml-1">
                                                      (Kuliah) {{ $classSchedule->subject }}
                                                  </p>
                                              </div>
                                          @endif
                                      @endforeach
                                  </div>
                              </div>
                          </div>
                      </td>
                  @endforeach
              </tr>
          @endforeach
      </tbody>
  </table>
  
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

@endsection