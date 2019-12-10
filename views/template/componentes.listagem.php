<?php $this->layout('layout', ['title' => 'Componentes Curriculares < Listagem do IFRS']) ?>

<div class="container-fluid">
    <div class="row">
    <nav style="margin-top: 5px;" aria-label="breadcrumb">
        <ol class="breadcrumb d-print-none" style="background-color: #fff !important; margin-bottom: 5px;">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Listagem</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/componente/listagem">Componente</a></li>
        </ol>
    </nav>
    </div>
    <div class="row">
    <h2 style="margin: 0 0 15px 15px;">Componente Cadastrados</h2>
    </div>
    <div class="row">
        <div class="col-sm-12">
                <div class="row">
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
        $('#sidebar').toggleClass('active', true);
        window.print();
    }
    </script>
<?php $this->end() ?>
