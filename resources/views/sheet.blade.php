<!DOCTYPE html>
<html>
    <meta http-equiv="refresh" content="30">

<head>
    <title>Data Spreadsheet</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #888;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Data dari Google Spreadsheet</h2>
    <table>
        <thead>
            @if (count($data) > 0)
                <tr>
                    @foreach ($data[0] as $heading)
                        <th>{{ $heading }}</th>
                    @endforeach
                </tr>
            @endif
        </thead>
        <tbody>
            @foreach ($data as $index => $row)
                @if ($index === 0)
                    @continue
                @endif
                <tr>
                    @foreach ($row as $cell)
                        <td>{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
