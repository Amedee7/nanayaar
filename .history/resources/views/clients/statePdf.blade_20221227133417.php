<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
            height: 29.7cm;
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
            margin: 0  0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
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

        table td h3{
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.2em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {
        }

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

        #thanks{
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
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
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<header class="clearfix">
    <div id="company">
        <h2 class="name">{{$configurations->entreprise_name}}</h2>
        <div>{{$configurations->adress}}</div>
        <div>{{$configurations->telephone}}</div>
        <div><a href="{{$configurations->email}}">{{$configurations->email}}</a></div>
    </div>
</header>
<main>
    <div id="details" class="clearfix">
        <div id="client">
            <h2 class="name">Rapport sur l'état des clients</h2>
            <div class="to">Par: {{$user->firstname}} {{$user->lastname}}</div>
            <div class="address">Date: {{\Illuminate\Support\Carbon::now()}}</div>
        </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th class="no">N CLIENT</th>
                    <td class="desc"><h3>{{$item['name']}}{{$item['last_name']}}</h3></td>
                    <th class="desc">NOM & NUMERO</th>
                <th class="unit" style="background: #d26565!important;">CREDIT TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientsState as $item)
                <tr>
                    <td class="desc">{{$item['numb_cli']}}Tel: {{$item['first_phone']}}{{$item['second_phone']}}</td>
                    <td class="desc"><h3>{{$item['name']}}{{$item['last_name']}}</h3></td>
                    <td class="unit">{{number_format($item['amount_credit'],0, '.',' ')}} Fcfa</td>
                    <td class="desc"><h3>{{$item['status']}}</h3></td>

                </tr>
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    <div id="thanks">Merci !</div>
</main>
<footer>
    {{$configurations->entreprise_name}} - NANA YAAR
</footer>
</body>
</html>
