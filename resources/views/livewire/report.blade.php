<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Lab</th>
            <th scope="col">Peminjam</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jam Mulai</th>
            <th scope="col">Jam Selesai</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($bookings as $booking)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
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
      {!! $bookings->links() !!}
</div>
