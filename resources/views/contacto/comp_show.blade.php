<div class="">
    @if(isset($contacto))
        <ul class="lista-datos">

            @if(isset($contacto->email))
                <li><span>Email: </span>{{$contacto->email}}</li>
            @endif

            <?php $nroTelefono = 0; ?>

            @forelse($contacto->telefonos as $telefono)
                <li><span>Telefono {{$nroTelefono+1}}: </span>{{$telefono->numero}}</li>

            @empty
                Sin telefono
            @endforelse
        </ul>
    @else
        <p>Sin datos de contacto</p>
    @endif
</div>
