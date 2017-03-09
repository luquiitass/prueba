<div class="">
    @if(isset($contacto))
        <ul class="list-unstyled">

            @if(isset($contacto->email))
                <li><strong>Email: </strong>{{$contacto->email}}</li>
            @endif

            <?php $nroTelefono = 0; ?>

            @forelse($contacto->telefonos as $telefono)
                <li><strong>Telefono {{$nroTelefono+1}}: </strong>{{$telefono->numero}}</li>

            @empty
                Sin telefono
            @endforelse
        </ul>
    @else
        <p>Sin datos de contacto</p>
    @endif
</div>
