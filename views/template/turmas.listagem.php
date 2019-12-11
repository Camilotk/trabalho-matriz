<?php $this->layout('layout', ['title' => 'Turmas < Listagem do IFRS']) ?>

<div class="container-fluid">
    <div class="row">
    <nav style="margin-top: 5px;" aria-label="breadcrumb">
        <ol class="breadcrumb d-print-none" style="background-color: #fafafa !important; margin-bottom: 5px;">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Listagem</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/turma/listagem">Turma</a></li>
        </ol>
    </nav>
    </div>
    <div class="row">
    <h2 style="margin: 0 0 15px 15px;">Turmas Cadastradas</h2> <br>
    </div>
    <div class="row">
        <div class="col-sm-12">
                <div class="row" style='margin-top:2px'>
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
<button class="btn btn-success d-print-none" onclick="printPage()">
<i class="fas fa-print"></i>
Imprimir
</button>
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
        $('#sidebar').toggleClass('active', true);
        window.print();
    }
    </script>
<?php $this->end() ?>
