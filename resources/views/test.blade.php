@extends('layouts.index')

@section('container')

<div class="container mx-auto overflow-x-scroll w-[800px]  xl:w-full lg:overflow-x-hidden lg:mt-5">
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
      <table class="overflow-x-scroll w-[800px] xl:w-96 lg:overflow-x-hidden ">
        <thead>
          <tr>
            <th class="py-2 border-r h-10  md:w-30 sm:w-20 w-10 xl:text-sm text-xs bg-blue-500 text-white lg:w-64">
              <span class="xl:block lg:block md:block sm:block hidden">Ruangan<br>Hari</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block bg-blue-500 text-white">Ruangan<br>Hari</span>
            </th>
            <th class="p-2 border-r h-10 xl:w-4 lg:w-20 md:w-30 sm:w-20 w-10 xl:text-sm text-sm bg-blue-400 text-white ">
              <span class="xl:block lg:block md:block sm:block hidden">Senin, 1</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block bg-blue-400 text-white">Senin, 1</span>
            </th>
            <th class="p-2 border-r h-10 xl:w-4 lg:w-3 md:w-30 sm:w-20 w-10 xl:text-sm text-sm bg-blue-400 text-white">
              <span class="xl:block lg:block md:block sm:block hidden ">Selasa, 2</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block ">Selasa, 2</span>
            </th>
            <th class="p-2 border-r h-10 xl:w-4 xl:p-2 lg:w-3 md:w-30 sm:w-20 w-10 xl:text-sm text-sm bg-blue-400 text-white">
              <span class="xl:block lg:block md:block sm:block hidden ">Rabu, 3</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block ">Rabu, 3</span>
            </th>
            <th class="p-2 border-r h-10 xl:w-4 xl:p-2 lg:w-3 md:w-30 sm:w-20 w-10 xl:text-sm text-sm bg-blue-400 text-white">
              <span class="xl:block lg:block md:block sm:block hidden ">Kamis, 4</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block ">Kamis, 4</span>
            </th>
            <th class="p-2 border-r h-10 xl:w-4 xl:p-2 lg:w-3 md:w-30 sm:w-20 w-10 xl:text-sm text-sm bg-blue-400 text-white">
              <span class="xl:block lg:block md:block sm:block hidden ">Jum'at, 5</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block ">Jum'at, 5</span>
            </th>
            <th class="p-2 border-r h-10 xl:w-4 xl:p-2 lg:w-3 md:w-30 sm:w-20 w-10 xl:text-sm text-sm bg-blue-400 text-white">
              <span class="xl:block lg:block md:block sm:block hidden ">Sabtu, 6</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block ">Sabtu, 6</span>
            </th>
            <th class="p-2 border-r h-10 xl:w-4 xl:p-2 lg:w-3 md:w-30 sm:w-20 w-10 xl:text-sm text-sm bg-blue-400 text-white">
              <span class="xl:block lg:block md:block sm:block hidden ">Minggu, 7</span>
              <span class="xl:hidden lg:hidden md:hidden sm:hidden block ">Minggu, 7</span>
            </th>
          </tr>
        </thead>
        <tbody >
          <tr class="text-center h-20 ">
            <td class="border lg:w-64 lg:px-14 h-40   md:w-30 sm:w-20  items-center  bg-blue-300 overflow-hidden ">
              <div class=" h-40   md:w-30 sm:w-full  w-10 mx-auto flex justify-center items-center ">
                <div class="top h-5 p-0 -mx-4  ">
                  <span class="font-bold text-white">IKI</span>
                </div>
            </td>
            <td class="border p-1   h-40 xl:w-40 lg:w-3 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class=" flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">1</span>
                </div>
                <div class="bottom flex-grow h-3 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border   h-40 xl:w-40 lg:w-3 md:w-30 sm:w-20 w-10  transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10   ">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">5</span>
                </div>
                <div class="bottom flex-grow  w-full cursor-pointer ">
                  <div class="overflow-hidden event bg-pink-400 text-white rounded p-1 text-sm h-12 -m-4 text-left lg:w-full lg:mx-auto px-2">
                    <span class="event-name">
                      Sosialisasi
                    </span><br>
                    <span class="time text-[10px]">
                      Putra
                    </span>
                  </div>
                </div>
              </div>
            </td>
            <td class="border p-1   h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden ">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">3</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden ">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">4</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border  h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10  transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10   ">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">5</span>
                </div>
                <div class="bottom flex-grow  w-full cursor-pointer">
                  <div
                    class="overflow-hidden event bg-purple-400 text-white rounded p-1 text-sm h-12 -m-4 text-left lg:w-full lg:mx-auto px-2">
                    <span class="event-name">
                      Rapat
                    </span> <br>
                    <span class="time text-[10px]">
                      Ambara
                    </span>
                  </div>
                </div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500 text-sm">6</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500 text-sm">7</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
          </tr>

                
          <tr class="text-center h-20">
            <td class="border lg:w-64 lg:px-14 h-40   md:w-30 sm:w-20  items-center  bg-blue-300 overflow-hidden ">
              <div class=" h-40   md:w-30 sm:w-full  w-10 mx-auto flex justify-center items-center ">
                <div class="top h-5 p-0 -mx-4  ">
                  <span class="font-bold text-white">MI</span>
                </div>
            </td>
            <td class="border  h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10  transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10   ">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">5</span>
                </div>
                <div class="bottom flex-grow  w-full cursor-pointer">
                  <div
                    class="overflow-hidden event bg-purple-400 text-white rounded p-1 text-sm h-12 -m-4 text-left lg:w-full lg:mx-auto px-2">
                    <span class="event-name">
                      Seminar
                    </span> <br>
                    <span class="time text-[10px]">
                      Wahyu Ambara
                    </span>
                  </div>
                </div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">2</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">3</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10 overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">4</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">5</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500 text-sm">6</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500 text-sm">7</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
          </tr>
          <!--         line 1 -->

                  <!-- line 2 -->
          <tr class="text-center h-20 ">
            <td class="border lg:w-64 lg:px-14 h-40   md:w-30 sm:w-20  items-center  bg-blue-300 overflow-hidden ">
              <div class=" h-40   md:w-30 sm:w-full  w-10 mx-auto flex justify-center items-center ">
                <div class="top h-5 p-0 -mx-4  ">
                  <span class="font-bold text-white">FTK</span>
                </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">1</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10 overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">2</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">3</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">4</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500">5</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500 text-sm">6</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
            <td class="border p-1 h-40 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300">
              <div class="flex flex-col h-40 mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10  overflow-hidden">
                <div class="top h-5 w-full">
                  <span class="text-gray-500 text-sm">7</span>
                </div>
                <div class="bottom flex-grow h-30 py-1 w-full cursor-pointer"></div>
              </div>
            </td>
          </tr>
          <!--         line 2 -->


        </tbody>
      </table>
    </div>
  </div>
@endsection