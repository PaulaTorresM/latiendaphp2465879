<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <h1>Paises de la region</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pais</th>
                <th>Capital</th>
                <th>Moneda</th>
                <th>Poblacion</th>
                <th>Ciudades</th>

            </tr>
        </thead>
            <tbody>

                @foreach($paises as $pais => $infopais)
                <tr>
                    <td rowspan="3">
                        {{ $pais }}
                    </td>
                    <td rowspan="3">
                        {{ $infopais["capital"]}}
                    </td>
                    
                    <td rowspan="3">
                        {{ $infopais["moneda"]}}
                    </td>

                    <td rowspan="3">
                        {{ $infopais["poblacion"]}}
                    </td>
                    @foreach($infopais["ciudades"] as $ciudad)
                 <th>
                     {{ $ciudad }}
                 </th>

                 </tr>
                    @endforeach
                @endforeach

            </tbody>
            <tfoot></tfoot>
    </table>
</body>
</html>