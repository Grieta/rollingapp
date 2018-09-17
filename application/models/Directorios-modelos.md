Directorio de Modelos usado en Codeigniter para uso porterior

*** Author Crislizame ***

Usuario    | Modelo de la table app_user

--insertar_usuario | Insertar Usuario a la Base de Datos
**** Usa los siguientes metodos $username,$usr_pass,$usr_dcreation,$usr_position,$fk_idcompany

--auth_login | Autenticar Inicio de Sesion de usuario atraves de la pagina
**** Usa los siguientes metodos $username,$pass


Noti    | Modelo de la tabla app_noti para notificaciones 

--obnotis  | Obtener notificacion nuevas
**** Usa la variable de session automaticamente sin pasar por metodo

--llenarnotis  | llenar notificaciones viejas
**** Sin metodos retorna un json

