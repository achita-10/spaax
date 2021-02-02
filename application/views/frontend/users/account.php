<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: AndresPava
 * Date: 10/11/2018
 * Time: 03:08 PM
 */
?>


<div class="card mb-3">
    <div class="card-header">
        <h2 align="center">Lista de Empleados</h2>
        <div align="right">
            <a class="btn btn-success" data-toggle="modal" data-target="#registrar_nuevo_empleado">Agregar Nuevo Usuario</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <section style="margin-bottom:3px">
                <div class="form-body">
                    <div class="row">
                        <div id="the-message" align="center"></div>
                    </div>
            </section>
            <div id="the-message"></div>

            <table id="tabla_empleados" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>