 <table>
     <thead>
       <tr>
         <th>NO</th>
         <th>Ruangan</th>
         <th>Peminjam</th>
         <td>Email Peminjam</td>
         <td>No. Peminjam</td>
         <th>Tujuan</th>
         <th>Tanggal</th>
         <th>Jam Mulai</th>
         <th>Jam Selesai</th>
       </tr>
     </thead>
     <tbody>
     @foreach ($bookings as $booking)
       <tr>
         <th>{{ $loop->iteration }}</th>
         <td>{{ $booking->lab->name }}</td>
         <td>{{ $booking->user->name }}</td>
         <td>{{ $booking->user->email }}</td>
         <td>{{ $booking->user->phone_number }}</td>
         <td>{{ $booking->reason_to_booking }}</td>
         <td>{{ $booking->booking_date }}</td>
         <td>{{ App\Utilities\TimeMappings::convertToLetter($booking->start_time) }}</td>
         <td>{{ App\Utilities\TimeMappings::convertToLetter($booking->end_time) }}</td>
     </tr>
     @endforeach
     </tbody>
  </table>