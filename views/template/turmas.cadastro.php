<?php $this->layout('layout', ['title' => 'Turmas < Cadastro do IFRS']) ?>
        <div class="container-fluid">
        <div class="row">
            <nav style="margin-top: 5px;" aria-label="breadcrumb">
                <ol class="breadcrumb d-print-none" style="background-color: #fafafa !important; margin-bottom: 5px;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Cadastro</li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/turma">Turma</a></li>
                </ol>
            </nav>
        </div>
            <fieldset>
                <legend><h3>Formulário de Cadastro de Turmas</h3></legend>
                <form action="/turma" method="post" class="form-sigin">
                    <label>Ano da Turma</label><br>
                        <input type="number" min="2019" max="2030" name="ano" placeholder="Informe o ano dessa turma" class="form-control" required><br>
                    <label>Semestre da Turma</label><br>
                        <select required name="semestre" class="custom-select">
                                <option value="">Selecione o Semestre</option>
                                <option value="1">Primeiro Semestre</option>
                                <option value="2">Segundo Semestre</option>
                        </select><br><br>
                    <label>Componente Curricular</label> <br>
                        <!--<input type="text" name="componente" placeholder="Digite a matéria para essa turma" class="form-control" required><br> -->
                        <select required id="componente_select" name="componente" class="custom-select"><br>
                            <option value="">Escolha o componente...</option>
                        </select><br><br>

                    <label>Professor</label> <br>
                       <!-- <input type="text" name="docente" placeholder="Digite o docente para essa matéria" class="form-control" required><br> -->
                        <select required id="docente_select" name="docente" class="custom-select">
                            <option value="">Escolha o docente...</option>
                        </select><br><br>
                    <button class="btn btn-success" type="submit" onclick=" ">Salvar</button>
                </form>
            </fieldset>
        </div>

<?php $this->start('script') ?>
    <script>
    $(document).ready(
        $.getJSON('/api/docente', function (data){
            var select = $('#docente_select')
            $.each( data, function( key, val ) {
                select.append( "<option id='" + val.id + "'>" + val.nome + "</option>" );
            })
        })
    )
    $(document).ready(
        $.getJSON('/api/componente', function (data){
            var select = $('#componente_select');
            $.each( data, function( key, val ) {
                select.append( "<option id='" + val.id + "'>" + val.nome + "</option>" );
                console.log(val)
           });
        })
    )
    </script>
<?php $this->end() ?>
