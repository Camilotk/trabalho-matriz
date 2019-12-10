<?php $this->layout('layout', ['title' => 'Cursos < Listagem do IFRS']) ?>

<div class="container-fluid">
    <div class="row">
    <h2 style="margin: 30px 0 0 15px;">Cursos Cadastrados</h2>
        <div class="col-sm-12">
                <div class="row" style='margin-top:20px'>
                    <div class="col-sm-12">
                        <table id="listagem_cursos" class="table">
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
                url: '/api/curso',
                method: 'GET'
            }).done(function(response){
                response.forEach(function(curso){
                    $('#listagem_cursos > tbody:last-child').append('<tr><td>'+curso.id+'</td><td>'+curso.nome+'</td></tr>')
                })
            })
    })
    function printPage() {
        window.print();
    }
    </script>
<?php $this->end() ?>
