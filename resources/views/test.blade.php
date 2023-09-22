<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase ">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Lab
              </th>
              <th scope="col" class="px-6 py-3">
                  Nama Peminjam
              </th>
              <th scope="col" class="px-6 py-3">
                  Jam Mulai
              </th>
              <th scope="col" class="px-6 py-3">
                  Jam Selesai
              </th>
              <th scope="col" class="px-6 py-3">
                  Hari / Tanggal
              </th>
              <th scope="col" class="px-6 py-3">
                  Status Reschedule
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ($labBookings as $booking)
            
          <tr class="bg-white border-b ">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                  {{ $booking->lab->name }}
              </th>
              <td class="px-6 py-4">
                  {{ $booking->user->name }}
              </td>
              <td class="px-6 py-4">
                  {{ $booking->start_time }}
              </td>
              <td class="px-6 py-4">
                {{ $booking->end_time }}
              </td>
              <td class="px-6 py-4">
                {{ $days[$loop->index] }} / 
                {{ $booking->booking_date }}
              </td>
              <td class="px-6 py-4">
                {{-- @if ()
                    requested
                @endif
                free --}}
              </td>
          </tr>
          @endforeach

      </tbody>
  </table>
</div>

</body>
</html>