<!DOCTYPE html>
<html>
<head>
    <title>Laporan Buku Tamu</title>
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
        <h2>Laporan Buku Tamu</h2>
        <p>PTSP MAKN Ende — Tanggal Cetak: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>No HP</th>
                <th>Tujuan</th>
                <th>Keperluan</th>
                <th>Tanggal</th>
                <th>Jam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukuTamu as $key => $tamu)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $tamu->nama }}</td>
                <td>{{ $tamu->instansi ?? '-' }}</td>
                <td>{{ $tamu->no_hp }}</td>
                <td>{{ $tamu->tujuan }}</td>
                <td>{{ $tamu->keperluan }}</td>
                <td>{{ $tamu->tanggal->format('d/m/Y') }}</td>
                <td>{{ $tamu->jam }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">Dicetak oleh Sistem PTSP</div>
</body>
</html>
