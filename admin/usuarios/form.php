<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="titulo_form">Crear Usuarios</h6>
    </div>
    <div class="card-body">

    <form action="guardar.php"  method="POST" id="form_usuarios">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre y apellido" id="input_name" required />
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Ingrese su email"  id="input_email" required />

        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" class="form-control mb-2" name="password" placeholder="Ingrese contraseña" id="input_password"  />
            <input type="password" class="form-control" name="confirmar" placeholder="Confirme contraseña" id="input_confirmar"  />
        </div>

        <div class="form-group" >
            <label>Tipo de Usuario</label>
            <select class="form-control" name="role" id="input_role" required>
                <option value="">Seleccione</option>
                <option value="1">Atención al Ciudadano</option>
                <option value="2">Recursos Humanos</option>
                <option value="3">Transporte</option>
                <option value="99">Administrador</option>
            </select>
        </div>

        <input type="hidden" name="opcion" value="guardar" id="input_opcion" />
        <input type="hidden" name="id" id="input_user_id" />

        <button type="reset" class="btn btn-secondary" id="btn_cancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary float-right">Guardar</button>

    </form>
        
    </div>
</div>