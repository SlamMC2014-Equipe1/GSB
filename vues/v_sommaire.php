<div id="left-menu" class="td-div">
    <div class="ac-container">
        <div>
            <input id="ac-1" name="accordion-1" type="checkbox" />
            <label for="ac-1">Comptes rendus</label>
            <article class="ac-small">
                <a href="index.php?uc=gererCR&action=saisieCR" title="Créer un compte rendus" class="left-menu-item">
                    <span class="left-menu-text">Nouveau</span>
                </a>
                <a href="index.php?uc=gererCR&action=consulterMesCR" class="left-menu-item">
                    <span class="left-menu-text">Mes comptes rendus</span>
                </a>
            </article>
        </div>
        <div>
            <input id="ac-medic" name="accordion-medic" type="checkbox" />
            <label for="ac-medic">Médicaments</label>
            <article class="ac-small">
                <a href="index.php?uc=medicament" title="Consulter la liste des médicaments" class="left-menu-item">
                    <span class="left-menu-text">Consulter</span>
                </a>
            </article>
        </div>
        <div>
            <input id="ac-praticiens" name="accordion-praticiens" type="checkbox" />
            <label for="ac-praticiens">Praticiens</label>
            <article class="ac-small">
                <a href="index.php?uc=praticien" title="Consulter la liste des praticiens" class="left-menu-item">
                    <span class="left-menu-text">Consulter</span>
                </a>
            </article>
        </div>
        <?php if ($user->getRole() == User::$DELEGUE)
        {
        ?>
        <div>
            <input id="ac-2" name="accordion-2" type="checkbox" />
            <label for="ac-2">Statistiques</label>
            <article class="ac-small">
                <a href="index.php?uc=delegueRegional&action=statsProduits" title="Créer un compte rendus" class="left-menu-item">
                    <span class="left-menu-text">Produits</span>
                </a>
            </article>
        </div>
        <?php
        }
        ?>
    </div>
</div>