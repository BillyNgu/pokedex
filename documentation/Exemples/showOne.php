// Affichage des informations d'un Pokémon
<div class="card col-4" style="width: 18rem;">
    <div class="card-body">
        <img class="card-img" src="data:image/jpeg;base64, <?= base64_encode($pokemonDescription['pokemonImg']); ?>" />
    </div>
</div>
<div class="card w-75" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?= $pokemonDescription['pokemonName']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Numéro national : <?= $pokemonDescription['pokemonId']; ?></h6>
        <h6> Type : <?php foreach ($pkmtype as $key => $value): ?> 
            <img src="data:image/jpeg;base64,<?= base64_encode($value['typeName']) ?>">
            <?php endforeach; ?>
        </h6>
        <h5>Description : </h5><?= $pokemonDescription['pokemonDescription']; ?>
    </div>
</div>