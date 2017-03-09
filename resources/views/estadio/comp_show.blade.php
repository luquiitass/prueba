<div>
    @if(isset($estadio))
     <ul class="lista-datos">

         @if(isset($estadio->nombre))
             <li><span>Nombre: </span>{{$estadio->nombre}}</li>
         @endif

         @if(isset($estadio->alias))
             <li><span>Alias: </span>{{$estadio->alias}}</li>
         @endif

         @if(isset($estadio->capasidad))
             <li><span>Capasidad: </span>{{$estadio->capasidad}}</li>
         @endif

         @if(isset($estadio->iluminado))
             <li><span>Con Iluminacion:</span> Si</li>
         @endif

         @if(isset($estadio->arquitectos))
             <li><span>Arquitectos: </span>{{$estadio->arquitectos}}</li>
         @endif

         @if(isset($estadio->dueños))
             <li><span>Dueños:</span>{{$estadio->dueños}}</li>
         @endif

         @if(isset($estadio->inauguracion))
             <li><span>Ianugurado:</span>El {{$estadio->inauguracion}}</li>
         @endif
     </ul>
    @else
        Sin Estadio
    @endif
        <br>
</div>