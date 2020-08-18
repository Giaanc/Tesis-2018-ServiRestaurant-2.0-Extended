<?php session_start();

if (!isset($_SESSION['nombre'])) {
	header('location:Views/login/login.php');
}else{

	require_once 'Model/enlaces.php';
	require_once 'Model/reservasModel/reservasModel.php';
	require_once 'Model/usuariosModel/usuariosModel.php';
	require_once 'Model/categoriasModel/categoriasModel.php';
	require_once 'Model/productosModel/productosModel.php';
	require_once 'Model/empleados/empleadosModel.php';
	require_once 'Model/platos/platosModel.php';
	require_once 'Model/receta/recetaModel.php';
	



	require_once 'Controller/reservasController/reservasController.php';
	require_once 'Controller/usuariosController/usuariosController.php';
	require_once 'Controller/categoriasController/categoriasController.php';
	require_once 'Controller/productosController/productosController.php';
	require_once 'Controller/empleadosController/empleadosController.php';
	require_once 'Controller/platosController/platosController.php';
	require_once 'Controller/recetaController/recetaController.php';
	

	$index = new MvcController();
	$index->plantilla();
}


