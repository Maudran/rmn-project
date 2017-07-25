<header id="table-header">
    <div class="table-title">
        <h1 class="titlestyle">Tableau</h1>
    </div>
</header>

<div id="table-wrapper">

        <table id="data-table">
            <div class="data-heading"><tr>
                <?php foreach ($labels as $label) : ?>
                <th><?php echo $label ?></th>
                <?php endforeach; ?>
            </tr></div>
        <?php foreach ($result as $contact) : ?>

            <div class="data-cell"><tr>
                <?php foreach ($contact as $value) : ?>
                    <td><?php echo $value ?></td>
                <?php endforeach; ?>
            </tr></div>
        <?php endforeach; ?>

        </table>
</div>

<div class="table-return">
    <a href="/rmn-project/homeView.php" title="Retour à la page d'accueil">Retourner à la page d'accueil</a>
</div>