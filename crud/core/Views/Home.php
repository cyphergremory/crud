<div class="card h-100 overflow-scroll p-3 shadow-sm">
    <div class="clearfix mb-2">
        <h2 class="float-left ml-3">Lista de empleados</h2>
        <a href="?page=new" class="btn btn-primary btn-lg float-right">
           Registro
        </a>
    </div>

<table class="table" id="employeesTable">
    <thead>
    <th>Id</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Puesto</th>
    <th>Salario</th>
    <th></th>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
<script>
    window.onload =function(){
        $.ajax({
            url:'core/Http/Controllers/EmpleadosController.php',
            type: "POST",
            data:  {select:true},
            success: function(data) {
                let employees =JSON.parse(data);
                employees.forEach(function(item){
                   $('table>tbody').append(`<tr>
                        <td scope="row">${item.Id}</td>
                        <td>${item.Name}</td>
                        <td>${item.Surname}</td>
                        <td>${item.Position}</td>
                        <td>${item.Salary}</td>
        <td>
            <a  class="btn btn-link" title="Editar empleado" href="?page=refresh&id=${item.Id}">
                <span class="material-icons">edit</span>
            </a>
            <button class="btn btn-link text-danger" title="Eliminar empleado" type="button" onclick="deleteEmployee(${item.Id})">
               <span class="material-icons">
                    clear
                </span>
            </button>
        </td>
        </td>
    </tr>`);
                });
            }
        });
    }
    let deleteEmployee = (id)=>{
        if(confirm('¿desea eliminar este usuario?')){
            $.ajax({
                url:'core/Http/Controllers/EmpleadosController.php',
                type: "POST",
                data:  {delete:true,id:id},
                success: function(data)
                {
                    response =JSON.parse(data);
                    if(response == true){
                        alert('se ha eliminado un registro');
                        setTimeout(function(){
                            window.location.reload ();
                        },1500);
                    }
                }
            });
        }
    }
</script>