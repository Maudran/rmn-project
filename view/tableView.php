<header id="table-header">
    <div class="table-title">
        <h1 class="titlestyle">Tableau</h1>
    </div>
</header>

<div id="table-wrapper">
    <div id="table-container">





        <?php
        $mysqli = new mysqli("localhost", "root", "", "rmn-project");

        if ($mysqli->connect_errno) {
            printf("Échec de la connexion : %s\n", $mysqli->connect_error);
            exit();
        }


        $request = $mysqli->query("SELECT * FROM contact");
        $data = array();


        echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
        while ($property = mysqli_fetch_field($request)) {
            echo '<td>' . $property->name . '</td>';  //get field name for header
            array_push($data, $property->name);  //save those to array
        }
        echo '</tr>'; //end tr tag

        //showing all data
        while ($row = mysqli_fetch_array($request)) {
            echo "<tr>";
            foreach ($data as $item) {
                echo '<td>' . $row[$item] . '</td>'; //get items using property value
            }
            echo '</tr>';
        }
        echo "</table>";



        ?>







    </div>


</div>