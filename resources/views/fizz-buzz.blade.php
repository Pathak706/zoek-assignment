
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fizz-Buzz</title>
    <style>
        body{
            display: flex;
        }
        table {
            border: 1px dashed;
        }
    </style>
    <body>
    @foreach(range(0, 90, 10) as $number)
        <table>
            <tbody>
                @for($i = $number+1; $i <= $number + 10; $i++)
                    <tr>
                        @if($i%3 == 0  && $i%5 == 0)
                            <td>FIZZBUZZ</td>
                        @elseif($i%3 == 0)
                            <td>FIZZ</td>
                        @elseif($i%5 == 0)
                            <td>BUZZ</td>
                        @else
                            <td>{{$i}}</td>
                        @endif
                    </tr>
                @endfor
            </tbody>
        </table>
    @endforeach
    </body>
</head>
</html>
