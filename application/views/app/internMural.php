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
                                    <input type="checkbox" class="input_vacancy" check_input="false"
                                           employer_id="<?= $e['employer_id'] ?>" id="vacancy_<?= $i ?>" name="">
                                    <label class="black-text" for="vacancy_<?= $i ?>">Me interesso por essa vaga</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            <div style="text-align: right; margin-bottom: 40px">
                <button class="btn waves-effect waves-purple" id="btn_register_vacancys" type="button" name="action">
                    Cadastrar vagas
                    <i class="material-icons right">send</i>
                </button>
            </div>
        <?php else: ?>
            <div style="text-align: center">
                <span class="card-title">Não há empresas disponíveis <a href="<?= base_url("intern/follow") ?>">Ver as empresas que sigo</a></span>
            </div>
        <?php endif; ?>
    </div>
</div>