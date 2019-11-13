<?php $this->layout('layout', ['title' => 'Turmas < Cadastro do IFRS']) ?>
        <div class="container">
            <fieldset>
                <legend><h3><br>Formulário de Cadastro de Turmas</h3></legend>
                <form action="salvaTurma.php" method="post" class="form-sigin">
                    
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
                        <select required name="componente" class="custom-select"><br>
                            <?php    
                                $arrayComponentes = [
                                    "01" => "Selecione um componente",
                                    "02" => "Algoritmos",
                                    "03" => "Matemática discreta",
                                    "04" => "Java I",
                                    "05" => "Java II",
                                ];
                                foreach($arrayComponentes as $id => $nome) {
                                    echo "<option value='$nome'>$nome</option>";
                                }
                            ?>
                        </select><br><br>

                    <label>Professor</label> <br>
                       <!-- <input type="text" name="docente" placeholder="Digite o docente para essa matéria" class="form-control" required><br> -->
                        <select required name="docente" class="custom-select"><br>
                            <?php    
                                $arrayProfessores = [
                                    "01" => "Selecione um professor",
                                    "02" => "Abel",
                                    "03" => "Junior",
                                    "04" => "Manoel",
                                    "05" => "Xaves",
                                ];
                                foreach($arrayProfessores as $id => $nome) {
                                    echo "<option value='$nome'>$nome</option>";
                                }
                            ?>
                        </select><br><br>
                    <button class="btn btn-success" type="submit" onclick=" ">Salvar</button>
                </form>
            </fieldset>
        </div>
