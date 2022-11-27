<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="tikect-description"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Ticket de soporte"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class=" me-3 my-3 text-end">
                            <a class="btn btn-outline-info mb-0 " href="{{ route('generar.pdf', $ticket->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                    <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                  </svg></a> &nbsp;&nbsp;
                            @if ($ticket->status != "cerrado")
                            <a class="btn bg-gradient-dark mb-0 " href="javascript:;" data-bs-toggle="modal"
                            data-bs-target="#crearSeguimiento">
                            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nuevo seguimiento</a>
                            &nbsp;&nbsp
                            <a class="btn bg-gradient-danger mb-0 " href="{{ route('cerrar.ticket', $ticket->id) }}">
                                <i class="material-icons text-sm">close</i>&nbsp;&nbsp;Cerrar ticket</a>
                            @endif

                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="accordion-1">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-10 mx-auto">
                                                <div class="accordion" id="accordionRental">
                                                    @foreach ($descripcions as $descripcion)
                                                    <div class="accordion-item mb-3">
                                                        <h5 class="accordion-header" id="headingFifth">
                                                            <button
                                                                class="accordion-button border-bottom font-weight-bold"
                                                                type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#description{{ $descripcion->id}}"
                                                                aria-expanded="false"
                                                                aria-controls="description{{ $descripcion->id}}">
                                                                Descripcion #{{ $descripcion->id}}  &nbsp;&nbsp;Fecha de creacion : {{ $descripcion->created_at}}
                                                                <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"
                                                                    aria-hidden="true"></i>
                                                                <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </h5>
                                                        <div id="description{{ $descripcion->id}}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="description{{ $descripcion->id}}"
                                                            data-bs-parent="#accordionRental">
                                                            <div class="accordion-body text-sm opacity-8">
                                                                {{ $descripcion->description}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div style="display: block" class="mostrarOculto">
                            <div class="container">
                                <!-- Modal -->
                                <div class="modal fade" id="crearSeguimiento" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Crear
                                                    seguimiento</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('registro.seguimiento')}}" method="POST">
                                                    @csrf
                                                    <div class="input-group input-group-outline mt-2 mb-3">
                                                        <input type="hidden" id="id_ticket" name="id_ticket" value="{{$ticket->id}}"/>
                                                        <input type="hidden" id="id_user" name="id_user"
                                                    value="{{Session::get('idUser')}}">
                                                        <textarea name="description" class="form-control"
                                                            id="description" cols="30" rows="10"
                                                            placeholder="Ingrese la informacion" required></textarea>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit"
                                                            class="btn btn-lg bg-gradient-primary btn-sm w-100 mt-4 mb-2">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
