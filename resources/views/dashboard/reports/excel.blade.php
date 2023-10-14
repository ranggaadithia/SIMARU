 <table>
     <thead>
       <tr>
         <th>NO</th>
         <th>Lab</th>
         <th>Peminjam</th>
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
         <td>{{ $booking->reason_to_booking }}</td>
         <td>{{ $booking->booking_date }}</td>
         <td>{{ $booking->start_time }}</td>
         <td>{{ $booking->end_time }}</td>
     </tr>
     @endforeach
     </tbody>
  </table>