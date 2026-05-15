Proyecto Final – Sistema de Reservas en PHP (MVC)
Aplicación web desarrollada en PHP con arquitectura MVC personalizada.
Permite gestionar usuarios, negocios, servicios y reservas con selección de fecha y hora, validación de disponibilidad y panel administrativo.

Funcionalidades principales
Autenticación
Registro de usuarios con password_hash()

Login seguro con sesiones ($_SESSION)

Middleware para proteger rutas

Redirección automática según estado de sesión

Gestión de negocios
Selección de negocio antes de acceder al sistema

Sesión persistente del negocio seleccionado

Gestión de servicios
CRUD completo (crear, editar, eliminar)

Solo accesible para administradores

Sistema de reservas
Selección de servicio, fecha y hora

Horas generadas automáticamente según horario

Solo se muestran horas disponibles

Validación en servidor para evitar reservas duplicadas

Cancelación de reservas activas

Separación entre reservas activas y pasadas/canceladas

Calendario administrativo
Vista de calendario con todas las reservas del negocio

Exportación en formato JSON para FullCalendar

Sistema de rutas
Router manual basado en index.php

Manejo de rutas limpias

Controladores separados por funcionalidad

Arquitectura
Código
/app
  /Controllers
  /Models
  /Views
/config
/public
MVC real (Model–View–Controller)

Router centralizado

Vistas con layout general

Modelos conectados a MySQL mediante mysqli

Base de datos
Tablas principales:

usuario

negocio

servicio

reserva

Incluye campos como:

estado (activa / cancelada)

fecha

hora

id_negocio

id_servicio

Despliegue
Actualmente el proyecto se ejecuta en local mediante XAMPP:

PHP 8+

MySQL

Apache