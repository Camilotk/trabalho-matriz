<?php $this->layout('layout', ['title' => 'Docentes < Listagem do IFRS']) ?>

<div class="container-fluid">
    <div class="row">
    <nav style="margin-top: 5px;" aria-label="breadcrumb">
        <ol class="breadcrumb d-print-none" style="background-color: #fff !important; margin-bottom: 5px;">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Listagem</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/docente/listagem">Docente</a></li>
        </ol>
    </nav>
    </div>
    <div class="row">
    <h2 style="margin: 0 0 15px 15px;">Docentes Cadastrados</h2>
    </div>
    <div class="row">
        <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="listagem_docentes" class="table">
                            <thead style="background-color:#28A745;color:white;">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
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
                url: '/api/docente',
                method: 'GET'
            }).done(function(response){
                response.forEach(function(docente){
                    $('#listagem_docentes > tbody:last-child').append('<tr><td>'+docente.id+'</td><td>'+docente.nome+'</td></tr>')
                })
            })
    })
    function printPage() {
        $('#sidebar').toggleClass('active', true);
        window.print();
    }
    </script>
<?php $this->end() ?>
