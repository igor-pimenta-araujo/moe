<div style="min-height: calc(100vh - 134px)"  class="had-container" >

    <div class="row container" style="margin-top: 50px">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="input_email" type="email" class="validate">
                    <label for="input_email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="input_password" type="password" class="validate">
                    <label for="input_password">Senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="input_password_confirm" type="password" class="validate">
                    <label for="input_password_confirm">Confirme sua senha</label>
                </div>
            </div>
            <div class="row">
                <p>Qual função você irá desempenhar?</p>
                <div>
                    <input type="radio" id="input_employer" name="drone" value="1">
                    <label for="input_employer">Empregador</label>
                </div>

                <div>
                    <input type="radio" id="input_intern" name="drone" value="2">
                    <label for="input_intern">Estagiário</label>
                </div>
            </div>

            <!-- Div do empregador -->
            <div style="display: none" class="row" id="div_employer">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_employer_name" type="text" class="">
                        <label for="input_employer_name">Nome da empresa</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="input_employer_contact" type="text" class="">
                        <label for="input_employer_contact">Nome da pessoa de contato</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="input_employer_address" type="text" class="">
                        <label for="input_employer_address">Endereço</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="input_employer_description" type="text" class="">
                        <label for="input_employer_description">Descrição da empresa e de seu produto.</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4 offset-s10">
                        <button class="btn waves-effect waves-light " id="btn_register_employer" type="button">Cadastrar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Div do estagiario -->
            <div style="display: none" class="row" id="div_intern">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_name" type="text" class="">
                        <label for="input_name">Nome completo</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="input_curse" type="text" class="">
                        <label for="input_curse">Curso</label>
                    </div>
                    <div class="input-field col s2">
                        <input id="input_year" type="number" class="">
                        <label for="input_year">Ano de ingresso no curso</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="input_curriculum" type="text" class="">
                        <label for="input_curriculum">Minicurriculo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4 offset-s10">
                        <button class="btn waves-effect waves-light " id="btn_register_intern" type="button">Cadastrar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
