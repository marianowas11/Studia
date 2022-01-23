<HTML>
<HEAD>
    <title>Jackowski z3</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="index5.css">
</HEAD>
<BODY>
    <?php
            $dbhost="mysql01.marianowas11.beep.pl"; $dbuser="odczyt"; $dbpassword="qwerty"; $dbname="baza_do_zadan";
            $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
            if (!$polaczenie) {
                echo "Błąd połączenia z MySQL." . PHP_EOL;
                echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Error: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }
            $rezultat = mysqli_query($polaczenie, "SELECT * FROM animacje") or die ("Błąd zapytania do bazy: $dbname");
            while ($wiersz = mysqli_fetch_array ($rezultat)) {
                $id=$wiersz[0]+1;
                $x0=$wiersz[1];
                $y0=$wiersz[2];
                $x_delta=$wiersz[3];
                $y_delta=$wiersz[4];
                $begin=$wiersz[5];
                $diameter=$wiersz[6];
                $time=$wiersz[7];
                $color=$wiersz[8];
                $os=$wiersz[9];
                echo "<div id=\"layer1\" style=\"position:absolute; left: 10px; top:10px; visibility:visible;/*height:500px;width:500px;*/\">";
                echo "<svg  class=\"animacja_svg\" xmlns=\"http://www.w3.org/2000/svg\" style=\"/*height:500px;width:500px*/\">";
                echo "<circle class=\"circle\" cx=".$x0." cy=".$y0." r=".$diameter." fill=".$color.">";
                switch ($os){
                    case "x":
                        echo "<animate attributeName=\"c".$os."\" from=".$x0." to=".$x_delta." begin=\"".$begin."s\" dur=".$time."s repeatCount=indefinite keyTimes=\"0;1\"/>";
                        break;
                    case "y":
                        echo "<animate attributeName=\"c".$os."\" from=".$y0." to=".$y_delta." begin=\"".$begin."s\" dur=".$time."s repeatCount=indefinite keyTimes=\"0;1\"/>";
                        break;
                }
                echo "</circle>
                        </svg>
                        </div>";
            }
            mysqli_close($polaczenie);
        ?>
    <div class="container">
        <div class="formAdd">
            <div class="card border border-3 shadow-lg mb-5 bg-body rounded">
                <div class="card-body">
                    <form action="insert.php" method="post">
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="p-2">
                                <h1>Dodaj</h1>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">id</label>
                            <?php echo "<input type=\"number\" class=\"form-control\" id=\"id\" name=\"id\" value=\"".$id."\">"; ?>
                        </div>
                        <div class="mb-3 d-flex flex-row">
                            <div>
                                <label class="form-label">x0</label>
                                <input type="number" class="form-control" id="x0" name="x0">
                            </div>
                            <div>
                                <label class="form-label">y0</label>
                                <input type="number" class="form-control" id="y0" name="y0">
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-row">
                            <div>
                                <label class="form-label">x1</label>
                                <input type="number" class="form-control" id="x_delta" name="x_delta">
                            </div>
                            <div>
                                <label class="form-label">y1</label>
                                <input type="number" class="form-control" id="y_delta" name="y_delta">
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-row">
                            <div>
                                <label class="form-label">begin(s)</label>
                                <input type="number" class="form-control" id="begin" name="begin" value="0">
                            </div>
                            <div>
                                <label class="form-label">diameter</label>
                                <input type="number" class="form-control" id="diameter" name="diameter" value="10">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">time(s)</label>
                            <input type="number" class="form-control" id="time" name="time" value="2">
                        </div>
                        <div class="mb-3 d-flex flex-row">
                            <div>
                                <label class="form-label">color</label>
                                <input type="text" class="form-control" id="color" name="color">
                            </div>
                            <div>
                                <label class="form-label">os</label>
                                <input type="text" class="form-control" id="os" name="os">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Dodaj">
                    </form>
                </div>
            </div>
        </div>
        <div class="formDel">
            <div class="card border border-3 shadow-lg mb-5 bg-body rounded">
                <div class="card-body">
                    <form action="drop.php" method="post">
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="p-2">
                                <h1>Usuń</h1>
                            </div>
                            <div class="p-2">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">id</label>
                            <?php echo "<input type=\"number\" class=\"form-control\" id=\"idDrop\" name=\"idDrop\" value=\"".($id-1)."\">"; ?>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Usuń">
                    </form>
                    <form action="drop.php" method="post">

                    </form>
                </div>
            </div>
        </div>
        <div class="formReset">
            <div class="card border border-3 shadow-lg mb-5 bg-body rounded">
                <div class="card-body">
                    <form action="reset.php" method="post">
                        <div class="mb-3 d-flex justify-content-between">
                            <div class="p-2">
                                <h1>Reset</h1>
                            </div>
                        </div>
                        <div class="mb-3">
                        <input type="submit" class="btn btn-primary btn-reset" value="Reset">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        
    </script>
</BODY>
</HTML>