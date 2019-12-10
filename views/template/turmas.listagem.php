<?php $this->layout('layout', ['title' => 'Turmas < Listagem do IFRS']) ?>

<div class="container-fluid">
    <div class="row">
    <h2 style="margin: 30px 0 0 15px;">Turmas Cadastradas</h2>
        <div class="col-sm-12">
                <div class="row" style='margin-top:20px'>
                    <div class="col-sm-12">
                        <table id="listagem_componentes" class="table">
                            <thead style="background-color:#28A745;color:white;">
                                <tr>
                                    <th>Ano</th>
                                    <th>Semestre</th>
                                    <th>Componente</th>
                                    <th>Docente</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </table>
                    </div>
                </div>
        </div>
    </div>
<button class="btn btn-success d-print-none" onclick="printPage()">Imprimir</button>
</div>

<?php $this->start('script') ?>
    <script>
    $(document).ready(function(){
        $.ajax({
                url: '/api/turma',
                method: 'GET'
            }).done(function(response){
                response.forEach(function(turma){
                    $('#listagem_componentes > tbody:last-child').append('<tr><td>'+turma.ano+'</td><td>'+turma.semestre+'</td><td>'+turma.componente+'</td><td>'+turma.docente+'</td></tr>')
                })
            })
    })
    function printPage() {
        window.print();
    }
    </script>
<?php $this->end() ?>
