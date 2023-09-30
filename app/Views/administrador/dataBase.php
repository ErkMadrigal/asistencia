<?= $this->extend('includes/main') ?>
<?= $this->section('content') ?>

<?php

use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4();

?>

<?=$uuid->toString();?>
<style>
    .alerta{
        position: relative;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        color: #004085;background-color: #cce5ff;border-color: #b8daff;
    }
    .none{
        display: none;
    }
</style>
<form class="form-horizontal" id="frmIncidencias">
    <?= csrf_field() ?>
    <textarea name="query" id="query" cols="100" rows="10"></textarea>
</form>
<button class="btn btn-primary mb-5" id="play">Play</button>

<div class="alerta none" id="respuesta">
</div>
<script>
    let play = document.querySelector("#play")
    let respuesta = document.querySelector("#respuesta")


    $('#play').click(function (event) {
        event.preventDefault();
        
        var formData = new FormData($("form#frmIncidencias")[0]);
        $.ajax({
            url: base_url + '/pushQuery',
            type: 'POST',
            dataType: 'json',
            data: formData,
            cache: false,
            async: true,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response)
                respuesta.classList.remove('none')
                respuesta.innerHTML = response
                toastr.success(response);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#load').removeClass( "spinner-border" );
                toastr.error('<?=lang('Layout.toastrError')?>');
            }
        });

    })
    

</script>


<?= $this->endSection() ?>