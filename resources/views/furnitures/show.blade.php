<x-layouts.master-layout title="Mueble">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="col-lg-6 col-7">
          <h6>{{ $furniture->name }}</h6>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> ID </th>
                <th> Nombre </th>
                <th> Descripción </th>
                <th> Precio </th>
                <th> Material </th>
                <th> Color </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$furniture->id}}</h6>
                      </div>
                  </div>
              </td>
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
            </tr>
              </tbody>
          </table>
          <td class="align-middle text-center">
            <a href="{{route('furniture.index')}}" class="font-weight-bold text-xs btn btn-warning text-white">
                Volver
            </a>
          </td>
        </div>
      </div>
    </div>
  </div>
  </x-layouts.master-layout>