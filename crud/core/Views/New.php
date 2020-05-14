<div class="col-md-8 order-md-1 mx-auto" bis_skin_checked="1">

                    <form class="needs-validation card shadow-lg p-4">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-md-6 mb-3" bis_skin_checked="1">
                                <label for="name">Nombre(s)</label>
                                <input type="text" class="form-control" id="name" placeholder="Juan Pedro" value="" required>
                                <div class="invalid-feedback" bis_skin_checked="1">
                                   Este campo es obligatorio
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" bis_skin_checked="1">
                                <label for="surname">Apellidos</label>
                                <input type="text" class="form-control" id="surname" placeholder="Paez Hernandez" required>
                                <div class="invalid-feedback" bis_skin_checked="1">
                                    Este campo es obligatorio
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" bis_skin_checked="1">
                                <label for="position">Puesto</label>
                                <input type="text" class="form-control" id="position" placeholder="Asistente juridico" required>
                                <div class="invalid-feedback" bis_skin_checked="1">
                                    Este campo es obligatorio
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" bis_skin_checked="1">
                                <label for="salary">Salario</label>
                                <input type="number" class="form-control" id="salary" placeholder="15000" required>
                                <div class="invalid-feedback" bis_skin_checked="1">
                                    Este campo es obligatorio
                                </div>
                            </div>
                        </div>
                        <div class="col-4 m-0 px-2">
                            <button type="button" class="btn btn-primary btn-lg">Guardar</button>
                            <a href="?" class="btn btn-link text-muted">
                                Volver
                            </a>
                        </div>

                    </form>
                </div>
<script type="text/javascript">
    window.onload =function(){
       $('button').click(registerEmployee);

    };
    let invalidFields = [];
    let registerEmployee = function () {

      let employeeData ={
          name : getField('name'),
          surname : getField('surname'),
          position : getField('position'),
          salary: getField('salary'),
          register:true
      };
        if(!invalidFields.length){
            $.ajax({
                url:'core/Http/Controllers/EmpleadosController.php',
                type: "POST",
                data:  employeeData,
                success: function(data) {
                    let success = JSON.parse(data);
                   if(success === true){
                       alert('Se ha agregado un nuevo registro');
                       setTimeout(function(){
                           window.location.href = "?";
                       },1500);
                   }
                }
            });
        }

    }

    let getField = (field)=>{
        let val = $('#'+field).val();
        if(!val.length)
        {
            invalidFields.push(field);
            $('#'+field).addClass('is-invalid');

        }else
        {
            invalidFields.pop(field);
            $('#'+field).removeClass('is-invalid');
        }

        return val;
    }


</script>
