<?php $this->layout('layout', ['title' => 'Cursos < Cadastro do IFRS']) ?>
        <div class="container">
            <fieldset>
                <legend><h3><br>Formulário de Cadastro de Cursos</h3></legend>
                <form action="/curso" method="post" class="form-sigin">
                        <input type='hidden' name='id' value=<?=uniqid()?> />
                        <label>Curso</label> <br>
                        <input type="text" name="curso" placeholder="Informe o nome do curso" class="form-control" required><br>

                    <button class="btn btn-success" type="submit" onclick=" ">Salvar</button>
                </form>
            </fieldset>
        </div>
