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
                            <input type="hidden" value="<?=$_GET['id']?>" id="employee_id">
                        </div>
                        <div class="col-4 clearfix m-0 px-2">
                            <button type="button" class="btn btn-primary btn-lg" onclick="updateEmployee()">Actualizar</button>
                                <a href="?" class="btn btn-link text-muted">
                                    Volver
                                </a>
                        </div>

                    </form>
                </div>
<script type="text/javascript">
    window.onload =function(){

        let id =$('#employee_id').val();
        $.ajax({
            url:'core/Http/Controllers/EmpleadosController.php',
            type: "POST",
            data:  {find:true,id:id},
            success: function(data)
            {
                response =JSON.parse(data);
               $('#name').val(response.Name);
               $('#surname').val(response.Surname);
               $('#position').val(response.Position);
               $('#salary').val(response.Salary);
            }
        });

    };
    let invalidFields = [];
    let updateEmployee = function () {

      let employeeData ={
          name : getField('name'),
          surname : getField('surname'),
          position : getField('position'),
          salary: getField('salary'),
          id:getField('employee_id'),
          update:true
      };
        if(!invalidFields.length){
            $.ajax({
                url:'core/Http/Controllers/EmpleadosController.php',
                type: "POST",
                data:  employeeData,
                success: function(data) {
                    let success = JSON.parse(data);
                    if(success === true){
                        alert('Se ha actualizado un registro');
                        setTimeout(function(){
                            window.location.href = "?";
                        },1500);
                    }
                }
            });
        }

    }

    let getField = (field)=>{
        let name = $('#'+field).val();
        if(!name.toString().length)
        {
            invalidFields.push(field);
            $('#'+field).addClass('is-invalid');

        }else
        {
            invalidFields.pop(field);
            $('#'+field).removeClass('is-invalid');
        }

        return name;
    }


</script>