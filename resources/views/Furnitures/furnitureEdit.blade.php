<x-layouts.master-layout title="Editar Mueble">
  <x-layouts.form-furniture :item="$furniture" method="PUT" route="{{route('furniture.update', $furniture->id)}}" title="Editar producto"/>
</x-layouts.master-layout>