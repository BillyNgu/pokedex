<?php ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Pokédex</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php if(!empty($index)): ?>
                <?php echo $index;
                else: ?>
                <a class="nav-link" href="index.php">Index</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if(!empty($attack)): ?>
                <?php echo $attack;
                else: ?>
                <a class="nav-link" href="attacks.php">Liste des attaques</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if(!empty($types)): ?>
                <?php echo $types;
                else: ?>
                <a class="nav-link" href="types.php">Liste des types</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <?php if(!empty($weakness_tab)): ?>
                <?php echo $weakness_tab;
                else: ?>
                <a class="nav-link" href="weakness_tab.php">Tableau des faiblesses</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
<?php if (!empty($nickname)): ?>
    <ul class="navbar-nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active">Bienvenue <?= $nickname; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active"></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Déconnexion</a>
        </li>
    </ul>
<?php else: ?>
    <ul class="navbar-nav justify-content-end">
        <li class="nav-item">
            <?php if(!empty($connection)): ?>
                <?php echo $connection;
                else: ?>
            <a class="nav-link" href="connection.php">Connexion</a>
            <?php endif; ?>
        </li>
    </ul>
<?php endif; ?>
</nav>

