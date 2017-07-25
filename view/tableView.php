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


        $data = $mysqli->query("SELECT * FROM contact");
        ?>




    </div>


</div>