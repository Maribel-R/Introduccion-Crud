<x-layouts.master-layout title="Muebles">  

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-6 col-7">
              <h6>Lista de Muebles</h6>
            </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Nombre </th>
                <th> Descripción </th>
                <th> Precio </th>
                <th> Material </th>
                <th> Color </th>
                <th> Acciones </th>
              </tr>
            </thead>
            <tbody>
              @foreach($furniture as $furniture)
              <tr>
              <td>
                  <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$furniture->name}}</h6>
                      </div>
                  </div>
              </td>
              <td>
                  <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$furniture->description}}</h6>
                      </div>
                  </div>
              </td>
              <td>
                  <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">$ {{$furniture->price}}</h6>
                      </div>
                  </div>
              </td>
              <td>
                  <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$furniture->material}}</h6>
                      </div>
                  </div>
              </td>
              <td>
                  <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$furniture->color}}</h6>
                      </div>
                  </div>
              </td>
              <td class="align-middle text-center">
                <a href="{{route('furniture.show', $furniture->id)}}" class="font-weight-bold text-xs btn btn-warning text-white">
                    Ver
                </a>
              </td>
              <td class="align-middle">
                <div class="d-flex align-items-center">
                <a href="{{route('furniture.edit', $furniture->id)}}" class="font-weight-bold text-xs btn btn-success text-white">
                    Editar
                </a>
                <form action="{{route('furniture.destroy', $furniture->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger font-weight-bold text-white">
                      Eliminar
                    </button>
                </form>
                </div>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-layouts.master-layout>