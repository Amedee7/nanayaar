<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 6 Search Report</title>
   

</head>
<body>
    
    <table class="table table-dark">
        <tr>
        <th>id</th>
        <th>name</th>
        <th>N Client</th>
        <th>created_at</th>
        <th>created_at</th>
        </tr>
        @foreach ($PDFReport as $PDFReports)
            <tr>
                <td>{{ $PDFReports->id }}</td>
                <td>{{ $PDFReports->name }}</td>
                <td>{{ $PDFReports->numb_cli }}</td>
                <td>{{ $PDFReports->created_at }}</td>
                <td>{{ $PDFReports->created_at }}</td>
            </tr>
        @endforeach
    </table> 
</body>
</html>