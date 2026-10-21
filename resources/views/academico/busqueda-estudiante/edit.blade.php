@extends('layouts.adminlte')

@section('title', 'Editar Estudiante')
@section('page-title', 'Editar Estudiante')
@section('breadcrumb', 'Gestión Académica / Búsqueda Estudiante / Editar')

@section('content')

    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-user-edit mr-2"></i>
                Editando: {{ $estudiante->nombre }} {{ $estudiante->paterno }}
            </h3>
        </div>

        <form action="{{ route('academico.busqueda-estudiante.update', $estudiante) }}" 
            method="POST" 
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">

                {{-- ============ DATOS PERSONALES ============ --}}
                <h5 class="text-primary mb-3">
                    <i class="fas fa-user"></i> Datos Personales
                </h5>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre <span class="text-danger">*</span></label>
                            <input type="text" name="nombre"
                                   class="form-control @error('nombre') is-invalid @enderror"
                                   value="{{ old('nombre', $estudiante->nombre) }}" required>
                            @error('nombre')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>C.I. <span class="text-danger">*</span></label>
                            <input type="text" name="nro_documento"
                                   class="form-control @error('nro_documento') is-invalid @enderror"
                                   value="{{ old('nro_documento', $estudiante->nro_documento) }}" required>
                            @error('nro_documento')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Apellido Paterno <span class="text-danger">*</span></label>
                            <input type="text" name="paterno"
                                   class="form-control @error('paterno') is-invalid @enderror"
                                   value="{{ old('paterno', $estudiante->paterno) }}" required>
                            @error('paterno')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" name="materno"
                                   class="form-control"
                                   value="{{ old('materno', $estudiante->materno) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sexo <span class="text-danger">*</span></label>
                            <select name="sexo" class="form-control" required>
                                <option value="M" {{ old('sexo', $estudiante->sexo) === 'M' ? 'selected' : '' }}>Masculino</option>
                                <option value="F" {{ old('sexo', $estudiante->sexo) === 'F' ? 'selected' : '' }}>Femenino</option>
                                <!-- <option value="O" {{ old('sexo', $estudiante->sexo) === 'O' ? 'selected' : '' }}>Otro</option> -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento"
                                   class="form-control"
                                   value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento?->format('Y-m-d')) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" name="telefono"
                                   class="form-control"
                                   value="{{ old('telefono', $estudiante->telefono) }}">
                        </div>
                    </div>
                </div>

                        v{{-- ============ FOTO ============ --}}
                    <h5 class="text-primary mb-3 mt-4">
                        <i class="fas fa-camera"></i> Fotografía
                    </h5>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto del estudiante</label>
                                <div class="custom-file">
                                    <input type="file" name="foto" id="foto"
                                        class="custom-file-input"
                                        accept="image/*"
                                        onchange="previewFoto(event)">
                                        <label class="custom-file-label" for="foto">Seleccionar archivo...</label>
                                </div>
                                <small class="text-muted">Formatos: JPG, PNG. Tamaño máximo: 2 MB.</small>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <label>Vista previa</label><br>
                                    <img id="preview"
                                    src="{{ $estudiante->foto ? asset('storage/' . $estudiante->foto) : asset('images/user-default.png') }}"
                                    style="max-width: 150px; max-height: 150px; border-radius: 50%; border: 3px solid #ddd;"
                                    alt="Foto">
                        </div>
                    </div>

                            <script>
                                function previewFoto(event) {
                                    const reader = new FileReader();
                                    reader.onload = function() {
                                        document.getElementById('preview').src = reader.result;
                                    };
                                    reader.readAsDataURL(event.target.files[0]);
                                    
                                    // Actualizar el label del input file
                                    const fileName = event.target.files[0].name;
                                    document.querySelector('.custom-file-label').textContent = fileName;
                                }
                            </script>


                {{-- ============ CONTACTO ============ --}}
                <h5 class="text-primary mb-3 mt-4">
                    <i class="fas fa-address-book"></i> Contacto
                </h5>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $estudiante->email) }}">
                            @error('email')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" name="direccion"
                                   class="form-control"
                                   value="{{ old('direccion', $estudiante->direccion) }}">
                        </div>
                    </div>
                </div>

                {{-- ============ ESTADO ============ --}}
                <h5 class="text-primary mb-3 mt-4">
                    <i class="fas fa-toggle-on"></i> Estado
                </h5>
                <hr>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="activo" id="activo"
                               class="custom-control-input"
                               {{ $estudiante->activo ? 'checked' : '' }}>
                        <label class="custom-control-label" for="activo">
                            Estudiante activo (puede aparecer en listados)
                        </label>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Guardar cambios
                </button>
                <a href="{{ route('academico.busqueda-estudiante.show', $estudiante) }}" class="btn btn-default">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>

@endsection