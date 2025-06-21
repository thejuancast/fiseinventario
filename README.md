# Sistema de FISEInventario

_Sistema desarrollado para la gestión de solicitudes como abastecimientos de herramientas, procesos, documentación, etc. Este sistema permite mantener una página web autónoma, realizar análisis de actividades y generar gráficos de uso de consumo e ingresos para la empresa FISEI DEL NORTE S.A. DE C.V._

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._

### Pre-requisitos 📋

_Para poder inicializar el sistema se requiere lo siguiente :_

```
1. MSSQL.
2. MySQL Workbench.
3. XAMPP.
4. PHP 8 (Incluido en XAMPP).
5. Apache (Incluido en XAMPP).
6. Visual Studio Code (Editor de Codigo).
```

### Instalación 🔧

```
_Colocar la carpeta en la instalación de XAMPP C:\xampp\htdocs_

```

## Informacion Importante del Proyecto 🖇️

- Carpetas Importantes (No borrar). 

Existen tres carpetas esenciales para el funcionamiento del proyecto, ubicadas en /assets/help, /assets/producto, /assets/usuario. Estas carpetas almacenan las imágenes de los usuarios y productos que se están cargando en el sistema. En la carpeta help se encuentra información sobre el uso de la página web, con pequeños manuales para los usuarios.

- Base de Datos.

Se agrego el script de la Base de Datos en la carpeta /docs/db, ademas de informacion de apoyo para emigrar a otros gestores de base de datos.

- Informacion Necesaria para la Base de Datos.

En la carpeta /docs/infodb se ha colocado información vital para el funcionamiento de la página web, como el manejo de roles o ejemplos de cómo utilizar la página (pagos, documentos o las respuestas de las solicitudes).

- Procedures de la Base de Datos.

En la carpeta /docs/sql se han añadido diversos archivos divididos por los mantenimientos o procesos del sistema, donde se encuentran los procedimientos correspondientes, además de breves explicaciones del funcionamiento de los mismos.

- Diagramas de Inicio.

En la carpeta de /docs/schemes se coloco con los primeros diagramas con los que se planteo la pagina web, desde su diseño de interfaz, como de el diagrama de flujo de la informacion.

## Despliegue 📦

_Copiar la carpeta del proyecto a C:\xampp\htdocs, además de cambiar la cadena de conexión de la base de datos en el archivo /config/conexion.php. También se deben ajustar las llamadas a los procedimientos almacenados para que coincidan con la base de datos del servidor en el que se está colocando. Ejemplo de ello:
$sql = "SP_L_ABASTECIMIENTO_06 ?"; que es formato de SQL Server o $sql = "exec SP_I_ABASTECIMIENTO_01 (?,?)"; que es el formato de MySQL._

## Construido con 🛠️

_Las herramientas utilizadas son las siguientes_

- [PHP](http://www.php.net/) - BackEnd
- [MSSQL](https://www.microsoft.com/es-es/sql-server/sql-server-downloads) - Base de Datos
- [Visual Studio Code](https://code.visualstudio.com/) - Editor de Codigo
- [JS](https://www.javascript.com/) - FrontEnd
- [Git](https://git-scm.com/) - Manejador de Versiones
- [HTML5](https://html5.org/) - FrontEnd

## Manual de Usuario 🖇️

Por favor, lee el manual de usuario en caso de que tengas dudas sobre el funcionamiento del programa. Puedes encontrarlo en /docs/usermanual/Manual de Usuario_FISEInventario.

## Autores ✒️

- **Juan Ricardo Castañeda Avalos** - _Version 1.0_ - [Linkedin](www.linkedin.com/in/juan-castaneda-avalos-10808527a)


## Expresiones de Gratitud 🎁

- "Las grandes cosas en los negocios nunca las hace una sola persona. Están hechas por un equipo de personas". Steve Jobs
- "La tecnología es la herramienta más poderosa que tenemos para cambiar el mundo". Bill 

---
