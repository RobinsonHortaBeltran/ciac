<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="tikect"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Ticket de soporte"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0 " data-bs-toggle="modal" data-bs-target="#exampleModal"
                                href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Solicitud</a>
                        </div>
                        <div class="container card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                {{-- imagen :<img src="{{ Storage::url('R3mnlNAyjMcxizzvCg52Vd04RMqhv3UcbFxz4las.pdf')}}" alt="avatar"> --}}

                                <table class="table table-hover align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NAME</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                CREATOR</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                TYPE</th>
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

                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column ">
                                                        <p class="mb-0 text-sm text-center">{{ $ticket->id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>

                                                <div class="d-flex px-2 py-1">
                                                    <div class="align-middle text-center text-sm">
                                                        <p class="mb-0 text-sm text-center">{{ $ticket->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="align-middle text-center text-sm">

                                                    <h6 class="mb-0 text-sm text-center">{{ $ticket->ticket_user->name
                                                        }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0 text-center">{{
                                                    $ticket->ticket_support_type->name }}
                                                </p>
                                            </td>

                                            <td class="align-middle text-center">
                                                @if ( $ticket->status=='abierto')
                                                <span class="text-sm font-weight-bold"
                                                    style="color:rgb(104, 196, 104); text-align: center "> <a href="{{route('seguimiento.soporte', $ticket->id)}}"
                                                        style="color:rgb(104, 196, 104);"
                                                        data-id="{{ $ticket->id }}">Abierto</a> </span>
                                                @endif
                                                @if ( $ticket->status=='cerrado')
                                                <span class="text-sm font-weight-bold"
                                                    style="color:rgb(221, 86, 86); text-align: center"><a href="{{route('seguimiento.soporte', $ticket->id)}}"
                                                    style="color:rgb(221, 86, 86);" class="seguimiento"
                                                    data-id="{{ $ticket->id }}">Cerrado</a>  </span>
                                                @endif
                                                @if ( $ticket->status=='pendiente')
                                                <span class="text-sm font-weight-bold"
                                                    style="color:rgb(194, 194, 66); text-align: center"><a href="{{route('seguimiento.soporte', $ticket->id)}}"
                                                    style="color:rgb(194, 194, 66);" class="seguimiento"
                                                    data-id="{{ $ticket->id }}">Pendiente</a></span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{
                                                    $ticket->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a rel="tooltip" class="btn btn-outline-info btn-xs" href="{{route('listar.documentos', $ticket->id)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-medical-fill" viewBox="0 0 16 16">
                                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-3 2v.634l.549-.317a.5.5 0 1 1 .5.866L7 7l.549.317a.5.5 0 1 1-.5.866L6.5 7.866V8.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L5 7l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V5.5a.5.5 0 1 1 1 0zm-2 4.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z"/>
                                                      </svg>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                <a rel="tooltip" class="btn btn-outline-dark btn-xs" href="#" data-bs-toggle="modal" data-bs-target="#cargarDocumento">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                      </svg>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-5" style="margin-left: 400px">
                                    {!! $tickets->links() !!}
                                </div>
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
                            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Crear nuevo requerimiento
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto">
                                <div class="card card-plain">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('registro.soporte') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="input-group input-group-outline mt-3">
                                                <input type="hidden" id="id_user" name="id_user"
                                                    value="{{Session::get('idUser')}}">
                                                <select class="form-control" name="type_support" id="type_support"
                                                    required>
                                                    <option selected value="">Seleccione tipo...</option>
                                                    @foreach ($supports as $support)
                                                    <option value="{{$support->id}}">{{$support->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input-group input-group-outline mt-3">
                                                <label class="form-label">Nombre de la solicitud</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ old('name') }}" required>
                                            </div>
                                            @error('name')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            <div class="input-group input-group-outline mt-3">
                                                <textarea name="description" class="form-control" id="description"
                                                    cols="30" rows="10" placeholder="Descripcion" required></textarea>
                                            </div>
                                            <div class="input-group input-group-outline mt-3" required>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">Seleccione estado</option>
                                                    <option value="abierto">Abierto</option>
                                                    <option value="pendiente">Pendiente</option>
                                                    <option value="cerrado">Cerrado</option>
                                                </select>
                                            </div>
                                            <div class="input-group input-group-outline mt-3 mb-5" required>
                                                <label class="form-label for="documento_lbl">
                                                    <input type="file" name="documento">
                                                </label>
                                            </div>
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

            <div class="modal fade" id="cargarDocumento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Crear nuevo requerimiento
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column ms-auto me-auto ms-lg-auto">
                            <div class="card card-plain">
                                <div class="card-body">
                                    <form method="POST" action="{{route('cargar.documento')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group input-group-outline mt-3 mb-5" required>
                                            <input type="text" class="form-control" name="id_ticket" value="{{$ticket->id}}" required>
                                        </div>
                                        <div class="input-group input-group-outline mt-3">
                                            <label for="documento_cargar">
                                                <input type="file" class="form-control" name="cargar_documento" id="cargar_documento" required>
                                            </label>
                                        </div>
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
