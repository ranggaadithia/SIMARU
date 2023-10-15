<div>
    <table id="myTable" class="display">
        <thead>
          <tr>
            <th>#</th>
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
          <tr wire:key="{{ $booking->id }}">
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $booking->lab->name }}</td>
            <td>{{ $booking->user->name }}</td>
            <td>{{ $booking->reason_to_booking }}</td>
            <td>{{ $booking->booking_date }}</td>
            <td>{{ App\Utilities\TimeMappings::convertToLetter($booking->start_time) }}</td>
            <td>{{ App\Utilities\TimeMappings::convertToLetter($booking->end_time) }}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
      {{-- {!! $bookings->links() !!} --}}
</div>
