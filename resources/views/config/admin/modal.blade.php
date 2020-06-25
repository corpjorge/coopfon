<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">El usuario existe como asociado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <form method="post" id="formFind" action="" autocomplete="off" class="form-horizontal">
                @csrf
                @method('put')
            <div class="modal-body">
                <p>El usuario que desea agregar ya existe ¿desea asignarle un nuevo rol?</p>
                    <label class="text-dark ml-3"><b>Nombre</b><div id="name"></div></label>
                    <label class="text-dark ml-3"><b>Cedula</b><div id="document"></div></label>
                    <label class="text-dark ml-3"><b>Correo</b><div id="email"></div></label>
                <br><br>
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-8">
                            <strong>¿Agregar como administrador?</strong>
                            <div class="col-lg-5 col-md-6 col-sm-3">
                                <select class="selectpicker" data-style="select-with-transition" title="Cambiar rol" data-size="7" name="role_id" required>
                                    <option disabled> Elegir rol</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-round" >Agrega administrador</button>
            </div>
            </form>
        </div>
    </div>
</div>
