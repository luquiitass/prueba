@if(isset($contacto))

    <div class="col-form">

        <h3>
            Datos de Contacto
            @include('otros.switch_edit_form')
        </h3>

        {{Form::open(array('id'=>'form_edit_contacto'))}}
        {{Form::token()}}

        <div class="form-group">
            {{Form::label('email')}}
            {{Form::text('email',$contacto->email,array('class'=>'form-control '))}}
        </div>

        <div id="form-telefonos">
            @if(isset($contacto->telefonos))
                @include('telefono.comp_edit',['telefonos'=>$contacto->telefonos])
            @else
                @include('telefono.comp_create')
            @endif

        </div>

        <div class="">
            <a class="glyphicon glyphicon-plus-sign addTelefono manita" style="padding: 10px;"> Telefono</a>
        </div>
        <div class="centered">
            <a class="btn btn-primary save_edit" data-link="/contacto/{{$contacto->id}}">Modificar</a>
        </div>
        {{Form::close()}}

    </div>

    @section('scripts')
        @parent

        {!! JsValidator::formRequest('App\Http\Requests\ContactoRequestUpdate', '#form_edit_contacto') !!}
    @endsection
@endif