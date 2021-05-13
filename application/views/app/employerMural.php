<div style="min-height: calc(100vh - 134px); padding-top: 40px;" class="" id="">
    <div class="container">
        <!--
        descrição resumida da vaga,
        lista de atividades que serão realizadas pelo estagiário,
        semestre do curso requerido pela vaga,
        lista de habilidades requeridas para a vaga,
        quantidade de horas e renumeração

        adicional:
        O semestre requerido pela vaga diz respeito ao semestre a partir do qual o aluno pode se candidatar à vaga.
        Duas quantidades de horas são permitidas: 20 horas ou 30 horas.
        A renumeração não pode ser inferior a renumeração mínima permitida de acordo com as normas de estágio da universidade
        -->

        <div class="row">
            <div class="col s12">
                <div class="card blue-grey lighten-5">
                    <div class="card-content black-text">
                        <span class="card-title">Cadastre a vaga.</span>
                        <div class="row">
                            <form id="form_vacancy" method="post" class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="descricao" name="description" type="text" class="validate">
                                        <label class="black-text" for="descricao">Descrição resumida da vaga</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="listadeatividades" name="activities_list" type="text" class="validate">
                                        <label class="black-text" for="listadeatividades">Lista de Atividades feitas pelo
                                            estagiário</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="listadeatividades" name="skill_list" type="text" class="validate">
                                        <label class="black-text" for="listadeatividades">Lista de habilidades requeridas para a
                                            vaga</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s4">
                                        <input id="first_name" name="semester" type="text" class="validate">
                                        <label class="black-text" for="first_name">Semestre do curso requerido pela vaga</label>
                                    </div>
                                    <div class="input-field col s4">
                                        <input id="last_name" name="hours" type="text" class="validate">
                                        <label class="black-text" for="last_name">Horas</label>
                                        <span class="helper-text small grey-text" data-error="wrong" data-success="right">20 ou 30 horas semanais</span>
                                    </div>
                                    <div class="input-field col s4">
                                        <input id="last_name" name="remuneration" type="number" class="validate">
                                        <label class="black-text" for="last_name">Remuneração(em R$)</label>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div style="text-align: right" class="card-action blue-grey lighten-4">
                        <button class="btn waves-effect waves-purple" type="submit" id="btn_vacancy" name="action">Cadastrar vaga
                            <i class="material-icons right">send</i>
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>