<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan SPK</title>
    <style>
        /* CSS untuk tampilan cetak */
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Hasil Perhitungan SPK</h1>
    <h2>Perankingan dan Tunjangan</h2>

    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Alternatif</th>
                <th>Skor SAW</th>
                <th>Tunjangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rankings as $ranking)
                <tr>
                    <td>{{ $ranking['rank'] }}</td>
                    <td>{{ $ranking['alternative'] }}</td>
                    <td>{{ $ranking['score'] }}</td>
                    <td>{{ $ranking['tunjangan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br><br><br>
    <p style="margin-top: 20px; text-align: right;">HRD.</p>
</body>
</html>