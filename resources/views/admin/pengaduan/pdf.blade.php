<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengaduan</title>
    <style>
        body { font-family: sans-serif; font-size: 13px; }
        .header { text-align: center; margin-bottom: 25px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #198754; color: white; }
        .footer { text-align: right; margin-top: 20px; font-style: italic; font-size: 11px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Pengaduan</h2>
        <p>PTSP MAKN Ende — Tanggal Cetak: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Isi</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengaduan as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama ?? 'Anonim' }}</td>
                <td>{{ $item->email ?? '-' }}</td>
                <td>{{ $item->isi }}</td>
                <td>{{ ucfirst($item->status) }}</td>
                <td>{{ $item->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">Dicetak oleh Sistem PTSP</div>
</body>
</html>
