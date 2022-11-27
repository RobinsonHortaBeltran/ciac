<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="roles"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Roles"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">

                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0 " data-bs-toggle="modal" data-bs-target="#exampleModal"
                                href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nuevo
                                rol</a>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table table-hover align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" ">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align: center ">
                                                NOMBRE
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align: center ">
                                                ESTADO
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="text-align: center ">
                                                FECHA DE CREACION
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $rol)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center" >
                                                        <p class="mb-0 text-sm" style="text-align: center ">{{ $rol->id }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm" style="text-align: center ">{{ $rol->name }}</h6>

                                                </div>
                                            </td>

                                            <td>
                                                @if ( $rol->status==1)
                                                <div class="d-flex flex-column justify-content-center" >
                                                    <h6 class="mb-0 text-sm" style="color:rgb(104, 196, 104); text-align: center ">Activo</h6>
                                                </div>
                                                @endif
                                                @if ($rol->status==0)
                                                <div class="d-flex flex-column justify-content-center" >
                                                    <h6 class="mb-0 text-sm" style="color:rgb(221, 86, 86); text-align: center">Inactivo</h6>
                                                </div>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{
                                                    $rol->created_at }}</span>
                                            </td>
                                            <td class="align-middle" style="text-align: center ">
                                                <a rel="tooltip" data-id="{{ $rol->id }}" data-bs-toggle="modal" data-bs-target="#modaleditar"
                                                    class="btn btn-outline-success btn-sm btn-editar">
                                                    <span class="material-icons">
                                                        edit
                                                    </span>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function () {
                                        $(document).on("click", ".btn-editar", function () {

                                            let id = $(this).data("id");

                                            let data = {
                                                id: id
                                            }
                                            let url = `{{ route('get.rol')}}`;
                                            $.ajax({
                                                url: url,
                                                method: "post",
                                                data: data,
                                                datatype: "json",
                                                success: function (respuesta) {
                                                    console.log(respuesta);
                                                    $('.name_edt').val(respuesta.name);
                                                    $('.status_edt').val(respuesta.status);
                                                    $('.id_edt').val(respuesta.id);

                                                },
                                                error: function () {
                                                    console.log("No se ha podido obtener la información");
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Crear nuevo usuario</h5>
                        </div>
                        <div class="modal-body">
                            <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto">
                                <div class="card card-plain">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('registro.rol') }}">
                                            @csrf
                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">Nombre</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name') }}">
                                            </div>
                                            @error('name')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="input-group input-group-outline mt-3">

                                                <select name="status" class="form-control" id="status">
                                                    <option selected value="">Seleccione estado</option>
                                                    <option selected value="0">Inactivo</option>
                                                    <option selected value="1">Activo</option>

                                                </select>
                                            </div>
                                            @error('status')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="modaleditar"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Editar usuario</h5>
                        </div>
                        <div class="modal-body">
                            <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto">
                                <div class="card card-plain">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('actualizar.rol') }}">
                                            @csrf
                                            <div class="input-group input-group-outline mt-3">
                                                <input type="hidden" class="id_edt" name="id_edt">
                                                <input type="text" class="form-control name_edt" name="name_edt"
                                                    value="{{ old('name') }}">
                                            </div>
                                            @error('name')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="input-group input-group-outline mt-3">

                                                <select name="status_edt" class="form-control status_edt" id="status_edt">
                                                    <option selected value="">Seleccione estado</option>
                                                    <option  value="0">Inactivo</option>
                                                    <option  value="1">Activo</option>

                                                </select>
                                            </div>
                                            @error('status')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
