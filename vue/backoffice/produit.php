<?php ajout_produit($bdd); ?>
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>ADD NEW PRODUIT</h2>
            <a href="#" class="btn">View All</a>
        </div>
        <form class="venteForm" method="POST" action="" enctype="multipart/form-data">
            <input type="text" name="nom" id="nom" placeholder="Nom du produit">
            <input type="number" name="prix" id="nom" placeholder="Prix">
            <input type="text" name="description" id="description" placeholder="Description">
            <input type="file" name="image" id="fileToUpload">
            <label for="validation">disponible : </label>
            <input type="checkbox" name='dispo' id='dispo'><br>
            <?php table_cat($bdd); ?>
            <input type="submit" name="validation" value="Enregistre">
        </form>


    </div>
</div>