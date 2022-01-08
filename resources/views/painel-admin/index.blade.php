@extends('template.painel-admin')
@section('content')
@section('title', 'Painel Administrador')
<?php
@session_start();
if (@$_SESSION['nivel_usuario'] != 'admin') {
    echo "<script language='javascript'> window.location='./' </script>";
}
?>
Home do Admin
@endsection