<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
   </head>
   <body>
     <h2>Email remitente:</h2>
     <p>{{$email}}</p>
     <h2>Telefono:</h2>
     <p>{{$phone}}</p>
     <h2>Mensaje:</h2>
     <p>{{$consulta}}</p>
   </body>
</html>