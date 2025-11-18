<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla numeros</title>
</head>
<body>
    <table>
            <?php
            $num = 0;
            for($i = 1; $i <= 100; $i++){
                if($i == 1 + 10 * $n){
                    echo "<tr>";
                    ++$n;
                }
                echo "<td style='border solid'>".$i."</td>"; 
                if($i % 10 == 0) echo "</tr>";


            }


            ?>
      
    </table>
</body>
</html>