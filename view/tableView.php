<header id="table-header">
    <div class="table-title">
        <h1 class="titlestyle">Tableau</h1>
    </div>
</header>

<div id="table-wrapper">
    <div id="table-container">


        <table class="data-table">
        <tr class="data-heading">
            <?php foreach ($labels as $label) : ?>
            <th><?php echo $label ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($result as $contact) : ?>
            <tr>
                <?php foreach ($contact as $value) : ?>
                    <td><?php echo $value ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>


</div>