@extends('layouts.app')

<style>
    .ph-center::-webkit-input-placeholder {
            text-align: center;
            /* Centrado vertical */
        }

        .ph-center:-moz-placeholder {
            /* Firefox 19+ */
            text-align: center;
        }
</style>

@section('content')
    <div class="container d-flex flex-wrap justify-content-center align-items-center border border-secondary rounded">

        <div class="row d-flex justify-content-center py-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo"
                class="img-fluid" style="width: 65%">
        </div>
      
    
        <div class="card-deck py-4 row">
          
            <div class="card border-0">
                <div class="p-5 d-flex justify-content-center " style="background-color: #F8FAFC">
                    <img src="{{ asset('images/Avatar.png') }}" class="img-fluid "  width="50px"  alt="...">
                </div>
                
              <div class="card-body rounded text-white bg-danger border-danger"
                <h4 class="card-title text-center font-weight-bold">Asistente de servicio</h4>
                <input type="text" name="" id="" placeholder="Número de colaborador" class="ph-center form-control mb-4">
                <select class="ph-center form-control mb-4" id="selectServicio">
                    <option>Comunicación interna</option>
                    <option>Administración</option>
                    <option>Relaciones Laborales</option>
                  </select>
                <a href="{{ url('empleado/create') }}" class="btn btn-light d-flex justify-content-center">Buscar -></a>
              </div>
            </div>
            
            <div class="card border-0">
                <div class="p-5 d-flex justify-content-center " style="background-color: #F8FAFC">
                    <img src="{{ asset('images/Document.png') }}" class="img-fluid "  width="50px"  alt="...">
                </div>

              <div class="card-body rounded text-white bg-danger">
                <h4 class="card-title text-center font-weight-bold">Generación de Listas</h4>
                <p class="card-text text-center font-italic">Selecciona el tipo de lista que quieres descargar</p>
                <select class="ph-center form-control mb-4" id="selectListas">
                    <option>Quinquenios</option>
                    <option>Día de la Madre</option>
                    <option>Día del Padre</option>
                    <option>Tarjetas de Fin de Año</option>
                    <option>Cumpleaños</option>
                    <option>Útiles Escolares</option>
                  </select>
                <a href="#" class="btn btn-light d-flex justify-content-center">Descargar</a>
              </div>
            </div>

            <div class="card border-0">

                <div class="p-5 d-flex justify-content-center " style="background-color: #F8FAFC">
                    <img src="{{ asset('images/Clip.png') }}" class="img-fluid "  width="50px"  alt="...">
                </div>
                
              <div class="card-body rounded text-white bg-danger">
                <h4 class="card-title text-center font-weight-bold">Creación de documentos</h4>
                <p class="card-text text-center font-italic">Selecciona el tipo de documento que quieres crear</p>
                <select class="ph-center form-control mb-4" id="selectDocumentos">
                    <option>Constancia</option>
                    <option>Contrato</option>
                  </select>
                <a href="#" class="btn btn-light d-flex justify-content-center">Crear documento -></a>
              </div>
            </div>
          </div>


        <footer class="footer d-flex align-items-end">
            <div id="footer" class="container text-center">
                <h6 style="letter-spacing: 3pt;" class="text-secondary text-monospace">Comunicación Interna · 2021
                    &copy; Aguila Ammunition</h6>
            </div>
        </footer>
    </div>
@endsection