<x-layouts.master-layout title="Editar Mueble">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6 col-7">
            <h6>Editar un mueble</h6>
          </div>
        <form action="{{ route('furniture.update', $furniture->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
            @method('PUT')
          <div class="form-group row">
            <label for="name" class="mb-0 text-sm">Nombre</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre" value="{{ $furniture->name }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="mb-0 text-sm">Descripcion</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="description" name="description" placeholder="Ingrese la descripcion" value="{{ $furniture->description }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="price" class="mb-0 text-sm">Precio</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" id="price" name="price" placeholder="Ingrese el precio" value="{{ $furniture->price }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="material" class="mb-0 text-sm">Material</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="material" name="material" placeholder="Ingrese el material" value="{{ $furniture->material }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="color" class="mb-0 text-sm">Color</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese el color" value="{{ $furniture->color }}">
            </div>
          </div>
          <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary m-1">Enviar</button>
            <a href="{{route('furniture.index')}}" class="font-weight-bold text-xs btn btn-warning text-white m-1">
                Volver
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>  
</x-layouts.master-layout>