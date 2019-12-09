<?php $this->layout('layout', ['title' => 'Home < Cadastro do IFRS']) ?>

<div class="container-fluid">
    <div class="row">
    <h2 style="margin: 30px 0 0 15px;">Horários Cadastrados</h2>
        <div class="col-sm-12">
                <input type='hidden' name='id' value=<?=uniqid()?> />
                <div class="row" style='margin-top:20px'>
                    <div class="col-sm-12">
                        <table class="table">
                            <thead style="background-color:#28A745;color:white;">
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
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
