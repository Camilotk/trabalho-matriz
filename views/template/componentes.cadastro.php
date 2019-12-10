<?php $this->layout('layout', ['title' => 'Componentes Curriculares < Cadastro do IFRS']) ?>

<div class="container-fluid">
    <div class="row">
    <nav style="margin-top: 5px;" aria-label="breadcrumb">
        <ol class="breadcrumb d-print-none" style="background-color: #fff !important; margin-bottom: 5px;">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Cadastro</li>
            <li class="breadcrumb-item active" aria-current="page"><a href="/componente">Componente</a></li>
        </ol>
    </nav>
    </div>
    <fieldset>
      <legend><h3>Formulário de Cadastro de Componentes Curriculares</h3></legend>
      <form action="/componente" method="post" class="form-sigin">
         <input type='hidden' name='id' value=<?=uniqid()?> />
         <label>Componente Curricular</label> <br>
         <input type="text" name="comp" placeholder="Informe o nome do componente curricular" class="form-control" required><br>

         <label>Créditos</label><br>
         <input type="number" name="creditos" placeholder="Informe o número de créditos " class="form-control" required><br>

         <label>Curso</label> <br>
         <select required id="curso_select" name="curso" class="custom-select">
            <option value="">Escolha o curso...</option>
         </select><br><br>

         <label>Período</label><br>
         <select required name="periodo" class="custom-select">
             <option value="">Selecione o Período</option>
             <option value="Manhã">Manhã</option>
             <option value="Tarde">Tarde</option>
             <option value="Noite">Noite</option>
         </select><br><br>
         <button class="btn btn-success" type="submit" onclick=" ">Salvar</button>
     </form>
   </fieldset>
</div>

<?php $this->start('script') ?>
    <script>
    $(document).ready(
        $.getJSON('/api/curso', function (data){
            var select = $('#curso_select')
            $.each( data, function( key, val ) {
                select.append( "<option id='" + val.id + "'>" + val.nome + "</option>" );
            })
        })
    )
    </script>
<?php $this->end() ?>
