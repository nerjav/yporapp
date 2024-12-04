
@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant.actions.trakings'))

@section('body')


    @include('admin.pedido.cabecera')
    @include('admin.detalle-pedido.index')


@endsection
