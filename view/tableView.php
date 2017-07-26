<header id="table-header">
    <div class="table-title">
        <h1 class="titlestyle">Tableau</h1>
    </div>
</header>

<div id="table-wrapper">

        <table id="data-table">
            <tr class="data-line">
                <?php foreach ($labels as $label) : ?>
                <th class="data-cell"><?php echo $label ?></th>
                <?php endforeach; ?>
            </tr>
        <?php foreach ($result as $contact) : ?>

            <tr class="data-line">
                <?php foreach ($contact as $value) : ?>
                    <td  class="data-cell"><?php echo $value ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>

        </table>
</div>

<div class="table-return">
    <a href="/rmn-project/homeView.php" class="txtstyle" title="Retour à la page d'accueil">Retourner à la page d'accueil</a>
</div>