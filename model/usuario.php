<?php
include_once('./httpful.phar');
class Usuario
{
	private $pdo;

	public $user;
	public $password;
	public $nombre;
	public $apellido;
	public $telefono;
	public $claveApi;
	public $idTrabajador;

	public $response;
	public $key;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try{
			$key = $_SESSION['claveApi'];
			$url = 'http://localhost:8080/api.peopleapp.com/v1/usuarios';

			$response = \Httpful\Request::get($url)
			->addHeader('authorization', $key)
			->send();

			return json_decode($response);
		}catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idUsuario)
	{
		try
		{
			$key =  $_SESSION['claveApi'];
			$url = 'http://localhost:8080/api.peopleapp.com/v1/usuarios/'.$idUsuario;

			$response = \Httpful\Request::get($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);

		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idUsuario)
	{
		try{
			$key = $_SESSION['claveApi'];
			$url = 'http://localhost:8080/api.peopleapp.com/v1/usuarios/'.$idUsuario;

			$response = \Httoful\Request::delete($url)
			->addHeader('authorization', $key)
			->send();
			return json_decode($response);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data,$idUsuario)
	{
		try{
			$key = $_SESSION['claveApi'];
			$url = 'http://localhost:8080/api.peopleapp.com/v1/usuarios/'.$idUsuario;

			$response = \Httpful\Request::put($url)
			->addHeader('authorization', $key)
			->body($data)
			->send();

			return json_decode($response);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try{
			$key = $_SESSION['claveApi'];
			$url = 'http://localhost:8080/api.peopleapp.com/v1/usuarios';

			$response = \Httpful\Request::post($url)
			->addHeader('authorization', $key)
			->body($data)
			->send();

			return json_decode($response);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
