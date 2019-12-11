<?php $this->layout('layout', ['title' => 'Home < Cadastro do IFRS']) ?>

<h1 style="margin-left: 15px;">Horários</h1>

<a class="btn btn-success d-print-none" style="margin-left: 15px; margin-bottom: 5px;" data-toggle="collapse" href="#componentes" role="button" aria-expanded="false" aria-controls="componentes">
   <i class="fas fa-plus"></i>
   Adicionar
  </a>


<div id="componentes" ondragenter="dragenter(event)" ondragleave="dragleave(event)" ondragover="dragover(event)"
    ondrop="drop(event)" class="disciplinas collapse d-print-none">

    <?php $this->start('script') ?>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '/api/componente',
                method: 'GET'
            }).done(function (response) {
                response.forEach(function (componente) {
                    for (var i = 0; i < componente.credito; i++) {
                        $('#componentes').append(
                            '<span draggable=true ondragstart=dragstart(this) ondrag=drag(this) ondragend=dragend(this) ><strong>' +
                            componente.nome + '</strong><br>'+componente.curso+'</span>')
                    }
                })
            })
        })

        function printPage() {
            $('#sidebar').toggleClass('active', true);
            window.print();
        }
    </script>
    <?php $this->end() ?>

</div>

<div class="semana">
    <ul>
        <?php
            print "<li id=li >Período</li>";

            for($i = 0; $i < count($horarios); $i++){
                print "<li id=li>{$horarios[$i]}</li>";
            }
        ?>
    </ul>
    <ul ondragenter="dragenter(event)" ondragleave="dragleave(event)" ondragover="dragover(event)" ondrop="drop(event)">
        <li id="li" class="bloqueado">Segunda-feira</li>
        <?php

            for($i = 0; $i < count($horarios); $i++){
                $segunda = $i + 1;
                print "<li id=li class={$segunda}></li>";
            }
        ?>
    </ul>
    <ul ondragenter="dragenter(event)" ondragleave="dragleave(event)" ondragover="dragover(event)" ondrop="drop(event)">
        <li id="li" class="bloqueado">Terça-feira</li>
        <?php
            for($i = 0; $i < count($horarios); $i++){
                $terca = $i + 16;
                print "<li id=li class={$terca}></li>";
            }
        ?>
    </ul>
    <ul ondragenter="dragenter(event)" ondragleave="dragleave(event)" ondragover="dragover(event)" ondrop="drop(event)">
        <li id="li" class="bloqueado">Quarta-feira</li>
        <?php
            for($i = 0; $i < count($horarios); $i++){
                $quarta = $i + 31;
                print "<li id=li class={$quarta}></li>";
            }
        ?>
    </ul>
    <ul ondragenter="dragenter(event)" ondragleave="dragleave(event)" ondragover="dragover(event)" ondrop="drop(event)">
        <li id="li" class="bloqueado">Quinta-feira</li>
        <?php
            for($i = 0; $i < count($horarios); $i++){
                $quinta = $i + 46;
                print "<li id=li class={$quinta}></li>";
            }
        ?>
    </ul>
    <ul ondragenter="dragenter(event)" ondragleave="dragleave(event)" ondragover="dragover(event)" ondrop="drop(event)">
        <li id="li" class="bloqueado">Sexta-feira</li>
        <?php
            for($i = 0; $i < count($horarios); $i++){
                $sexta = $i + 61;
                print "<li id=li class={$sexta}></li>";
            }
        ?>
    </ul>
</div>

<button style="margin: -15px 0 0 15px;" class="btn btn-success d-print-none" onclick="printPage()">
<i class="fas fa-print"></i>
Imprimir
</button>

<script>
    var bloqueios = [];

    var span = null;

    function dragstart(elemento) {
        elemento.style.color = 'blue'
        elemento.style.backgroundColor = 'red'
        span = elemento
    }

    function dragend(elemento) {
        elemento.style.color = ''
        elemento.style.backgroundColor = ''
    }

    function dragenter(event) {
        if (event.target.className !== 'bloqueado')
            event.target.style.border = 'dashed 1px gray'
    }

    function dragleave(event) {
        if (event.target.className !== 'bloqueado')
            event.target.style.border = ''
    }

    function dragover(event) {
        if (event.target.className !== 'bloqueado' &&
            !bloqueios.includes(event.target.getAttribute('class')))
            event.preventDefault();
    }

    function drop(event) {
        event.target.style.border = ''

        let elemento;
        if (event.target.nodeName == 'SPAN')
            elemento = event.target.parentNode
        else
            elemento = event.target


        if (elemento.childNodes.length > 0)
            span.parentNode.appendChild(elemento.childNodes[0])

        elemento.appendChild(span)
        span = null
    }
</script>
