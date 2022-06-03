<div class="modal fade" id="miModalAsistencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Bienvenido
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h2>
                <h5>Introduce tu nro de Cedula</h5>
            </div>
            <div class="modal-body">
                <div>
                    <form action="" method="post">
                        <div class="col-md-12 btn-print">
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control pull-right" id="cedula" name="cedula" placeholder="Cedula" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <div class="col-md-12 btn-print">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nombre y Apellido<input type="text" class="form-control pull-right" id="nombre" name="nombre" readonly></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Telefono<input type="text" class="form-control pull-right" id="telefono" name="telefono" readonly></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Ultima Asistencia<input type="text" class="form-control pull-right" id="ultima_asistencia" name="ultima_asistencia" readonly></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Vto Cuota<input type="text" class="form-control pull-right" id="vto_cuota" name="vto_cuota" readonly></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Clase<input type="text" class="form-control pull-right" id="clase" name="clase" readonly></label>
                                </div>
                                <div class="col-md-6">
                                    <label>Profesor<input type="text" class="form-control pull-right" id="profesional" name="profesional" readonly></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="btn_ingresar" class="btn btn-primary">Ingresar</button>
                <button type="button" id="btn_cancelar" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include '../layout/datatable_script.php'; ?>
<script>
    $(document).ready(function() {

        $('#btn_ingresar').on('click', function() {

            if ($('#cedula').val()) {
                obtenerDatos();
            } else {
                alert('por favor, inserte una cedula');
            }
        });

        $('#btn_cancelar').on('click', function() {
            location.reload()
        });
    })


    function obtenerDatos() {
        $.ajax({
            type: 'POST',
            url: '../mi_asistencia/insert_asistencia.php',
            data: {
                'id_cliente': $('#cedula').val()
            },
            dataType: 'JSON',
            success: function(response) {
                console.log(response)
                if (response.data) {
                    $('#nombre').val(response.data.nombre_completo)
                    $('#telefono').val(response.data.telefono)
                    $('#ultima_asistencia').val(response.data.ultima_asistencia)
                    $('#vto_cuota').val(response.data.vto_cuota)
                    $('#clase').val(response.data.clase)
                    $('#profesional').val(response.data.profesor)
                    if (response.mensaje) {
                        alert(response.mensaje)
                    } else {
                        $('#btn_ingresar').hide()
                    }
                } else {
                    alert(response.mensaje)
                    $('#btn_ingresar').hide()
                }

            },
            error: function(error) {
                console.log(error)
            }
        });
    }
</script>