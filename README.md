#  :computer:  tpaga consumo api tpaga.co

Presentado por : alejandro villegas. <br>
wifi Company. Aplicación de venta de un servicio o varios,  para prueba técnica de TPaga. <br>
La aplicación fue desarrollada con php marco "codeigniter" y utilicé Bootstrap  como marco css.

## Tiempos de trabajo
Las actividades de desarrolló  las organicé de la siguiente manera : 

1. Generación de Ideas del comercio y producto (60 min)
2. maquetar HTML con Bootstrap (60 min)
3. Lectura de la documentación de TPaga Api (1:30 horas)
4. Modelado de base de datos del aplicativo en mysql (4 hora)
5. Configuración básica del marco "codeigniter" php  
  5.1 Creación de archivo para consumir la TPaga Api y codificar los métodos de solicitar, pagar, confirmar y revertir (4 horas)
  5.2 Definir las vistas para listar los productos del Comercio (30 minutos)
  5.3 Definir las vistas para que el comercio haga las solicitudes a la TPaga Api  ( 8 horas ) 
7. Autenticación (2 hora)
8. certificados ssl (1 hora)
8. Despliegue en webhost "bluehost" (20 min)
  


### Observaciones:
- Las primeras pruebas con la API se hicieron con la herramienta Postman
- Cuando intente realizar  la petición encontré que la clave enviada por tepaga. le sobra un punto al final y eso me afectaba el Hash.  se retiro  punto y listo


><p align="center"><img src="http://vacasenvuelo.com/tpaga/img/punto.jpg" alt="error" height="100%" width="100%"></p>


## Funcionamiento del aplicativo
### Inicio permite agregar al carro para des pues pagar los servicios  
- **Página carro de compras** 
En este template se ve el detalle de la orden realizada y se piden datos para validar la compra si el usuario es nuevo despliega las opciones de registro sino solo procede a pagar  <br>


<p align="center">
	<img src="http://vacasenvuelo.com/tpaga/img/agregar_items.gif" alt="" height="637px" width="300px">
	<img src="http://vacasenvuelo.com/tpaga/img/login2.gif" alt="" height="637px" width="300px">
	<img src="http://vacasenvuelo.com/tpaga/img/pagar2.gif" alt="" height="637px" width="300px">
</p>


- **Después de registrar el usuario o iniciar sesión se le pide al usuario dar al clic al botón pagar al usuario** esto fue porque a google chrome  no le gustan las redirecciones en una redirección de cabeceras para evitar fallas<br>



## Tabla de URLs
Función | URL
------------ | -------------
Inicio | https://vacasenvuelo.com/tpaga
Login | https://vacasenvuelo.com/tpaga/index.php/user/login
Pagar Orden | https://vacasenvuelo.com/tpaga/index.php/user/shopping/
Consulta Transacciones (Login) | https://vacasenvuelo.com/tpaga/index.php/user/dashboard

## Autenticación

Para autenticarse en la aplicación como un operador del comercio, entre al aplicativo con las credenciales

### Administrador
**Usuario** *demo@demo.com* <br>
**Contraseña** *demo*

###usuario 
**Usuario** *demo2@demo.com* <br>
**Contraseña** *demo*

El administrador del comercio puede revertir las transacciones. 
y ver las transacciones no pagadas

## Despliegue
no fueron muchos los inconvenientes dado que se desplego en un webhost "buehost". inconvenientes. al desarrollar en Windows y pasar aun web host LINUX se presentaron errores con las promesas js para buscar facturas

El aplicativo se encuentra disponible en : https://vacasenvuelo.com/tpaga

