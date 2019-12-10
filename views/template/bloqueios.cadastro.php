<?php $this->layout('layout', ['title' => 'Docente < Cadastro IFRS']) ?>

<div class="container-fluid">
    <div class="row">
    <nav style="margin-top: 5px;" aria-label="breadcrumb">
        <ol class="breadcrumb d-print-none" style="background-color: #fff !important; margin-bottom: 5px;">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/docente">Docente</a></li>
        </ol>
    </nav>
    </div>
    <div class="row">
        <div class="col-sm-12" style="margin-top:5px;">
            <legend><h3>Formulário de Cadastro de Docentes</h3></legend>
            <form action="/docente" method="post">
                <input type='hidden' name='id' value=<?=uniqid()?> />
                <div class="form-group" style="margin-top: 15px;">
                    <label for="nome">Nome do Docente</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome do docente">
                </div>
                <div class="row" style='margin-top:20px'>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Período</th>
                                    <th>Segunda-feira</th>
                                    <th>Terça-feira</th>
                                    <th>Quarta-feira</th>
                                    <th>Quinta-feira</th>
                                    <th>Sexta-feira</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $horarios = [
                                        "07:30 - 08:20", "08:20 - 09:10", "09:10 - 10:00", "10:10 - 11:00", "11:00 - 11:50",
                                        "13:10 - 14:00", "14:00 - 14:50", "14:50 - 15:40", "15:50 - 16:40", "16:40 - 17:30",
                                        "17:55 - 18:45", "18:45 - 19:35", "19:35 - 20:25", "20:35 - 21:25", "21:25 - 22:15"
                                    ];

                                    for($i = 0; $i < count($horarios); $i++){
                                        $segunda = $i + 1;
                                        $terca   = $i + 16;
                                        $quarta  = $i + 31;
                                        $quinta  = $i + 46;
                                        $sexta   = $i + 61;
                                        print
                                            "<tr>
                                                <td>{$horarios[$i]}</td>
                                                <td><input class=form-check-input type=checkbox name='horarios[]'  value={$segunda}></td>
                                                <td><input class=form-check-input type=checkbox name='horarios[]'  value={$terca} ></td>
                                                <td><input class=form-check-input type=checkbox name='horarios[]'  value={$quarta}></td>
                                                <td><input class=form-check-input type=checkbox name='horarios[]'  value={$quinta}></td>
                                                <td><input class=form-check-input type=checkbox name='horarios[]'  value={$sexta}></td>
                                            </tr>";
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Adicionar</button>
            </form>
        </div>
    </div>
</div>
