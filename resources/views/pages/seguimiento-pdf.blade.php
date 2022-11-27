<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class=" me-3 my-3 text-end">
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="row" >
                                    <div class="col-md-12" >
                                        <table style="border: 1px solid #000;width: 100%">
                                            <tbody >
                                                <tr class="tex-content-center">
                                                    <p style="margin-left: 300px">Ticket # {{$ticket->id}}</p><br>
                                                    <p style="margin-left: 300px">Creado por {{$user->name}}</p>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{--  --}}
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($descripcions as $descripcion)
                                            <div class="col-md-12">
                                                <h4>Descripcion #{{ $descripcion->id}}  &nbsp;&nbsp;Fecha de creacion : {{ $descripcion->created_at}}</h4>
                                                <p>{{ $descripcion->description}}</p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
