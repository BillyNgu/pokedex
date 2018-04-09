// Affichage de tous les Pokémons
<?php
$cpt2 = 0;
foreach ($allPokemon AS $key => $value):
    ?> 
    <tr>
        <?php
        $cpt = 0;
        $cpt2 ++;
        foreach ($value AS $key => $value2):
            $cpt++;

            switch ($cpt):
                case 1:
                    ?>
                    <td><?= $value2; ?></td>
                    <?php
                    $id = $value2;
                    $type = "";
                    $pkmnType = getPokemonType($id);
                    break;
                case 2:
                    $imageblob = $value2;
                    ?>
                    <td class="tab-content">
                        <a href="descriptionPkmn.php?pokemonId=<?= $id; ?>">
                            <img src="data:image/jpeg;base64,<?= base64_encode($imageblob); ?>"/>
                        </a>
                    </td>
                    <?php
                    break;
                case 3:
                    ?>
                    <td><a href="descriptionPkmn.php?pokemonId=<?= $id; ?>"><?= $value2; ?></a></td>
                    <td>
                        <?php
                        foreach ($pkmnType as $key => $value):
                            $type = $value["typeName"];
                            ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($type); ?>">
                        <?php endforeach; ?>
                    </td> <?php
                    break;
                default:
                    break;
                    ?>
            <?php endswitch;
        endforeach;
        ?>
    </tr>
<?php endforeach; ?>