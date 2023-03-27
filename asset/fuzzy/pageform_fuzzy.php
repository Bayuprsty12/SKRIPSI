<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Fuzzy</title>
        <style>
            .form-item{
                padding : 10px;
            }
        </style>
    </head>
    <body>
        <form action="logic_fuzzy.php" method="POST">
            <div class="form-item">
                <label for="daya">Daya watt</label>
                <input type="text" id="daya" name="daya"/>
            </div>
            <div class="form-item">
                <label for="waktu">Waktu Pakai</label>
                <input type="text" id="waktu" name="waktu"/>
            </div>            
            <input type="submit" name="submit" id="ok" />
            <a href="logic_fuzzy.php"><button>reset</button></a>
        </form>
    </body>
    </html>

