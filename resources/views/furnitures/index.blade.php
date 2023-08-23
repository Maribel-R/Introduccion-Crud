<x-layouts.master-layout title="Lista de Muebles">
<style>
    .boton {
        margin: 1em;
    }
</style>

<div class="table-responsive pg-0" style="margin: 1em">
    <table id="miTabla" class="table align-items-center mb-0">
        <thead>
            <tr>
                <th> ID </th>
                <th> Nombre </th>
                <th> Descripción </th>
                <th> Precio </th>
                <th> Material </th>
                <th> Color </th>
                <th> Acciones </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($furniture as $furniture)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $furniture->id }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $furniture->name }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $furniture->description }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">$ {{ $furniture->price }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $furniture->material }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $furniture->color }}</h6>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('furniture.show', $furniture->id) }}"
                                class="boton font-weight-bold text-xs btn btn-warning text-white">
                                Ver
                            </a>
                            <a href="{{ route('furniture.edit', $furniture->id) }}"
                                class="boton font-weight-bold text-xs btn btn-success text-white">
                                Editar
                            </a>
                            <form action="{{ route('furniture.destroy', $furniture->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="boton btn btn-danger font-weight-bold text-white">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#miTabla').DataTable({
            paging: true,
            searching: true
        });
    });
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    @if (Session::has('success'))
        crearAlertaSimple(`Creado exitosamente`, "{{ Session::get('success') }}",
            "success");
        {{ Session::forget('success') }}
    @endif
    @if (Session::has('successEdit'))
        crearAlertaSimple(`Editado exitosamente`, "{{ Session::get('successEdit') }}",
            "success");
        {{ Session::forget('successEdit') }}
    @endif
    @if (Session::has('successDelete'))
        crearAlertaSimple(`Eliminado exitosamente`, "{{ Session::get('successDelete') }}",
            "success");
        {{ Session::forget('successDelete') }}
    @endif
    function crearAlertaSimple(titulo, mensaje, icono) {
        Swal.fire({
            title: titulo,
            text: mensaje,
            icon: icono,
            confirmButtonText: 'Ok'
        });
    }
</script>
</x-layouts.master-layout>