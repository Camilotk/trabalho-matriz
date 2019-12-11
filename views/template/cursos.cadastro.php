<?php $this->layout('layout', ['title' => 'Cursos < Cadastro do IFRS']) ?>
        <div class="container-fluid">
        <div class="row">
            <nav style="margin-top: 5px;" aria-label="breadcrumb">
                <ol class="breadcrumb d-print-none" style="background-color: #fafafa !important; margin-bottom: 5px;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Cadastro</li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/curso">Curso</a></li>
                </ol>
            </nav>
        </div>
            <fieldset>
                <legend><h3>Formulário de Cadastro de Cursos</h3></legend>
                <form action="/curso" method="post" class="form-sigin">
                        <input type='hidden' name='id' value=<?=uniqid()?> />
                        <label>Curso</label> <br>
                        <input type="text" name="curso" placeholder="Informe o nome do curso" class="form-control" required><br>

                    <button class="btn btn-success" type="submit" onclick=" ">Salvar</button>
                </form>
            </fieldset>
        </div>
