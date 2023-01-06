<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rapport</title>
    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 100%;
            padding-right: 20px;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 20px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.2em;
            background: #01aaff;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 25px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        .footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }
    </style>

</head>

<body>
    <header class="clearfix">
        <div id="company">
            <h2 class="name">{{ $configurations->entreprise_name }}</h2>
            <div>{{ $configurations->adress }}</div>
            <div>{{ $configurations->telephone }}</div>
            <div><a href="{{ $configurations->email }}">{{ $configurations->email }}</a></div>
        </div>
    </header>



    <!--begin::Lable-->
    <div id="details" class="clearfix">
        <div id="client">
            <div class="to" style="text-transform: uppercase;">
                @if (request()->has('exportDebPDF'))
                    <h2 class="name">Rapport des deblocages du: </h2>
                    
                @elseif (request()->has('exportClientRej'))
                    <h2 class="name">Rapport des Clients Rejetés </h2>
                @else
                    <h2 class="name"> Rapport des Clients Acceptés</h2>
                @endif
            </div>
            <br>
            <div class="to" style="text-transform: uppercase;">Par: {{ $user->firstname }} {{ $user->lastname }}
            </div>
            <em class="address">Periode: de {{ date('d/m/Y', strtotime($startDate)) }} à
                {{ date('d/m/Y', strtotime($endDate)) }}</em>
            <br>
            <em class="address">Date d'extraction :
                {{ date('d/m/Y H:i:s', strtotime(Carbon\Carbon::now()->locale('fr_FR'))) }}</em>

        </div>
    </div>
    <!--end::Lable-->

    <table class="table">
        <tr style="background-color: #d26565;">
            <th>Id</th>
            <th>NOM 
               <br> & PRENOMS</th>
            <th>N CLIENT <br> & TELs</th>
            <th>Mt. DEMANDE</th>
            <th>Cs. A VERSE</th>
            <th>N CNIB</th>
        </tr>
        @foreach ($PDFReportVersement as $PDFReportVersements)
            <tr>
                <td>{{ $PDFReportVersements->id }}</td>
                <td>{{ $PDFReportVersements->client['name'] }} {{ $PDFReportVersements->client['lastname'] }}</td>
                <td> N CLient: {{ $PDFReportVersements->client['numb_cli'] }} <br> Tel1: {{ $PDFReportVersements->client['first_phone'] }} <br> Tel2:
                    {{ $PDFReportVersements->client['second_phone'] }}</td>
                <td>{{ number_format($PDFReportVersements['montant_octroye'], 0, '.', ' ') }} Fcfa</td>
                <td>{{ number_format($PDFReportVersements['commission_verse'], 0, '.', ' ') }} Fcfa</td>
                <td>{{ $PDFReportVersements->client->numb_cnib }}</td>
            </tr>
        @endforeach
    </table>
    <div id="thanks">Merci !</div>

    <div class="footer">
        {{ $configurations->entreprise_name }} - NANA YAAR
    </div>
</body>

</html>
