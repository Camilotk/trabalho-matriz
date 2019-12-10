<?php $this->layout('layout', ['title' => 'Componentes Curriculares < Listagem do IFRS']) ?>

<div class="container-fluid">
    <div class="row">
    <h2 style="margin: 30px 0 0 15px;">Componente Cadastrados</h2>
        <div class="col-sm-12">
                <div class="row" style='margin-top:20px'>
                    <div class="col-sm-12">
                        <table id="listagem_componentes" class="table">
                            <thead style="background-color:#28A745;color:white;">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Créditos</th>
                                    <th>Curso</th>
                                    <th>Periodo</th>
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
                url: '/api/componente',
                method: 'GET'
            }).done(function(response){
                response.forEach(function(componente){
                    $('#listagem_componentes > tbody:last-child').append('<tr><td>'+componente.id+'</td><td>'+componente.nome+'</td><td>'+componente.credito+'</td><td>'+componente.curso+'</td><td>'+componente.periodo+'</td></tr>')
                })
            })
    })
    function printPage() {
        window.print();
    }
    </script>
<?php $this->end() ?>
