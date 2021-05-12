<div style="min-height: calc(100vh - 134px); padding-top: 20px;" class="">
    <div class="container">

        <?php if (!empty($employer)): //var_dump($employer);?>

            <?php $i = 0; ?>
            <?php foreach ($employer as $e): ?>
                <?php $i++; ?>

                <div class="row">
                    <div class="col s12">
                        <div class="card blue-grey lighten-4 black-text">
                            <div class="card-content">
                                <span class="card-title"><?= $e['employer_name'] ?></span>
                                <p>Descrição da empresa: <?= $e['employer_description'] ?></p>
                                <p>Contato: <?= $e['employer_contact_name'] ?> <a
                                            href="<?= $e['employer_email'] ?>">| <?= $e['employer_email'] ?> </a> |
                                    Endereço
                                    da empresa: <?= $e['employer_address'] ?></p>
                            </div>
                            <div class="card-action blue-grey lighten-3" style="text-align: right">
                                <div>
                                    <button employer_id="<?= $e['employer_id'] ?>" id="vacancy_<?= $i ?>"  class="btn red btn_unfollow">Deixar de seguir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <div style="text-align: center">
                <span class="card-title">Você não segue ninguém <a href="<?= base_url("intern/mural") ?>">Ver as empresas que posso seguir</a></span>
            </div>
        <?php endif; ?>
    </div>
</div>