<header id="table-header">
    <div class="table-title">
        <h1 class="titlestyle">Tableau</h1>
    </div>
</header>

<div id="delete-wrapper">

    <?php
    if (isset($successMsg)) { ?>

        <div class="delete-msg"><?php echo $successMsg ?></div>

        <?php
    }

    if (isset($errorsMsg)) {
        ?>
        <div class="delete-error"><?php echo $errorsMsg ?></div>
        <?php
    }
    ?>

</div>

<div id="table-wrapper">

        <table id="data-table">
            <tr class="data-line">
                <?php foreach ($labels as $label) : ?>
                <th class="data-cell"><?php echo $label ?></th>
                <?php endforeach; ?>
                <th class="data-cell">Actions</th>
            </tr>
        <?php foreach ($result as $contact) : ?>

            <tr class="data-line">
                <?php foreach ($contact as $fieldKey => $fieldValue) : ?>
                    <td  class="data-cell">
                        <?php
                        if ( $fieldKey == 'email') {
                            echo '<a href="mailto:'.$fieldValue.'">'.$fieldValue.'</a>';
                        } else {
                            echo $fieldValue;
                        }
                        ?>
                    </td>
                <?php endforeach; ?>

                <td class="data-delete"><a href="/rmn-project/table.htm?delete=<?php echo $contact['id'] ?>" class="delete-link fa fa-trash-o" aria-hidden="true"></a></td>


            </tr>
        <?php endforeach; ?>

        </table>
</div>

<div class="table-return">
    <a href="/rmn-project/homeView.php" class="txtstyle" title="Retour à la page d'accueil">Retourner à la page d'accueil</a>
</div>


<script type="text/javascript">

$(function() {
    $('.delete-link').on("click", function(event) {
        event.preventDefault();

        var r = confirm("Tu veux supprimer ça là ? T'es sûr !?");
        if (r === true) {
            window.location = $(this).attr('href');
        }

    });
});

</script>