<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="user-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="User Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">

                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0 " data-bs-toggle="modal" data-bs-target="#exampleModal"
                                href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nuevo
                                usuario</a>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table table-hover align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                PHOTO</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NAME</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                EMAIL</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ROLE</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                STATUS</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                CREATION DATE
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @csrf
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $user->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/team-2.jpg"
                                                            class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user->name }}</h6>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $user->email }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{
                                                    $user->user_rol[0]->name
                                                    }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ( $user->status==1)
                                                <span class="text-secondary text-xs font-weight-bold" style="color:rgb(104, 196, 104); text-align: center ">Activo</span>
                                                @endif
                                                @if ( $user->status==0)
                                                <span class="text-secondary text-xs font-weight-bold" style="color:rgb(221, 86, 86); text-align: center">Inactivo</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{
                                                    $user->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a rel="tooltip" data-id="{{ $user->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#modaleditar"
                                                    class="btn btn-outline-success btn-sm btn-editar">
                                                    <span class="material-icons">
                                                        edit
                                                    </span>
                                                    <div class="ripple-container"></div>
                                                </a>

                                                {{-- <button type="button" class="btn btn-outline-danger btn-sm delete" data-id="{{ $user->id }}">
                                                    <span class="material-icons">delete_outline</span>
                                                </button> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
                                        <script>
                                            $(document).ready(function () {
                                                $(document).on("click", ".btn-editar", function () {

                                                    let id = $(this).data("id");

                                                    let data = {
                                                        id: id
                                                    }
                                                    let url = `{{ route('user-management.prueba')}}`;
                                                    $.ajax({
                                                        url: url,
                                                        method: "post",
                                                        data: data,
                                                        datatype: "json",
                                                        success: function (respuesta) {
                                                            console.log(respuesta);
                                                            $('.name_edt').val(respuesta[0].name);
                                                            $('.email_edt').val(respuesta[0].email);
                                                            $('.rol_id_edt').val(respuesta[0].rol_id);
                                                            $('.id_edt').val(respuesta[0].id);
                                                            $('.estatus_edt').val(respuesta[0].status);
                                                        },
                                                        error: function () {
                                                            console.log("No se ha podido obtener la información");
                                                        }
                                                    });
                                                });

                                                $(document).on("click", ".delete", function () {

                                                    let id = $(this).data("id");

                                                    let data = {
                                                        id: id
                                                    }
                                                    let url = `{{ route('user.inactive')}}`;
                                                    $.ajax({
                                                        url: url,
                                                        method: "post",
                                                        data: data,
                                                        datatype: "json",
                                                        success: function (respuesta) {
                                                            console.log(respuesta);
                                                        },
                                                        error: function () {
                                                            console.log("No se ha podido obtener la información");
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </tbody>
                                </table>
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
                                        <form method="POST" action="{{ route('registro.usuario') }}">
                                            @csrf
                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">Nombre</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ old('name') }}">
                                            </div>
                                            @error('name')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">Correo</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    value="{{ old('email') }}">
                                            </div>
                                            @error('email')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password">
                                            </div>
                                            <div class="input-group input-group-outline mt-3">
                                                <select class="form-control " name="status" id="status">
                                                    <option selected value="">Seleccione estado</option>
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">Rol</label>
                                                <select class="form-control" name="rol_id" id="rol_id">
                                                    <option selected value=""></option>
                                                    @foreach ($roles as $rol)
                                                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('password')
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
                                        <form method="POST" action="{{ route('actualizar.usuario') }}">
                                            @csrf
                                            <div class="input-group input-group-outline mt-3">
                                                <input type="hidden" class="id_edt" name="id_edt" id="id_edt">
                                                <input type="text" class="form-control name_edt" name="name"
                                                    id="name_edt" value="{{ old('name') }}" placeholder="Nombre">
                                            </div>
                                            @error('name')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="input-group input-group-outline mt-3">

                                                <input type="email" class="form-control email_edt" name="email"
                                                    id="email_edt" value="{{ old('email') }}" placeholder="email">
                                            </div>
                                            @error('email')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="input-group input-group-outline mt-3">

                                                <select class="form-control rol_id_edt" name="rol_id" id="rol_id_edt">
                                                    <option selected value="">Seleccione rol</option>
                                                    @foreach ($roles as $rol)
                                                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group input-group-outline mt-3">

                                                <select class="form-control estatus_edt" name="estatus_edt"
                                                    id="estatus_edt">
                                                    <option selected value="">Seleccione estado</option>
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                            <div class="input-group input-group-outline mt-3">
                                                <input type="password" class="form-control password_edt" name="password"
                                                    id="password_edt" placeholder="Contraseña">
                                            </div>
                                            @error('password')
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
