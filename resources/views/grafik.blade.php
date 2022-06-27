<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Transaksi</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="container">
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
        Highcharts.chart('container', {
            title: {
                text: 'Grafik Transaksi Pemesanan Per Bulan'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            series: [{
                name: 'Total Pemesanan',
                data: [
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo "$bookingArr[$i],";
                    }
                ?>
                ]
            }],
        });
        </script>
    </div>
</body>

</html>