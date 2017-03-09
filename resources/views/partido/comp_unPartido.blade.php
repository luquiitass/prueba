
{{--<div class="match__main">--}}
    {{--<h3 class="match__main__title">--}}
				{{--<span class="match__main__competition">--}}
					{{--La Liga--}}
				{{--</span>--}}
        {{--| <span class="match__main__phase">--}}
					{{--Jornada 23--}}
				{{--</span>--}}
    {{--</h3>--}}
    {{--<p class="match__main__date">--}}



        {{--<time class="match__main__date__data" datetime="19/02/201720:45">--}}
            {{--19/02/2017 | 20:45--}}
        {{--</time>--}}
        {{--<span class="match__main__date__timezone">--}}
							{{--Hora local--}}
						{{--</span>--}}






    {{--</p>--}}
    {{--<div class="match__main__scoreboard">--}}
        {{--<div class="scoreboard__team">--}}
            {{--<p class="scoreboard__team__identifier">--}}
                {{--<img class="scoreboard__team__badge" src="bar_files/20462440.png" alt="" role="presentation">--}}
                {{--<span class="scoreboard__team__name">--}}
							{{--FC Barcelona--}}
						{{--</span>--}}
            {{--</p>--}}
        {{--</div>--}}




        {{--<p class="scoreboard__vs">--}}
            {{--vs--}}
        {{--</p>--}}



        {{--<div class="scoreboard__team">--}}
            {{--<p class="scoreboard__team__identifier">--}}
                {{--<img class="scoreboard__team__badge" src="bar_files/4039720.png" alt="" role="presentation">--}}
                {{--<span class="scoreboard__team__name">--}}
							{{--Leganés--}}
						{{--</span>--}}
            {{--</p>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}



{{--<aside class="match__complementary" role="complementary">--}}
    {{--<div class="match__tickets">--}}

        {{--<ul class="match__tickets__pricelist">--}}

            {{--<li class="match__tickets__pricelist__ticket">--}}
										{{--<span class="match__tickets__pricelist__ticket__info">--}}
											{{--<span class="match__tickets__pricelist__ticket__type">--}}
												{{--Entradas--}}
											{{--</span>--}}
											{{--<span class="match__tickets__pricelist__ticket__from">--}}
												{{--desde--}}
											{{--</span>--}}
										{{--</span>--}}
                {{--<span class="match__tickets__pritelist__ticket__price">--}}
											{{--44€--}}
										{{--</span>--}}
            {{--</li>--}}



            {{--<li class="match__tickets__pricelist__ticket">--}}
										{{--<span class="match__tickets__pricelist__ticket__info">--}}
											{{--<span class="match__tickets__pricelist__ticket__type">--}}
												{{--Entradas VIP--}}
											{{--</span>--}}
											{{--<span class="match__tickets__pricelist__ticket__from">--}}
												{{--desde--}}
											{{--</span>--}}
										{{--</span>--}}
                {{--<span class="match__tickets__pritelist__ticket__price">--}}
											{{--250€--}}
										{{--</span>--}}
            {{--</li>--}}

        {{--</ul>--}}







        {{--<div class="match__tickets__purchase">--}}


            {{--<a href="http://go.fcbarcelona.com/CampNou/Regular/FCB-Leganes/ES" class="button button--primary" onclick="trackEventActions('everisEvent', 'boto-detall-partit-es', 'comprar-entrades', 'fulf23-leg');" tabindex="0">--}}
                {{--Comprar entradas--}}
            {{--</a>--}}



        {{--</div>--}}


    {{--</div>--}}
{{--</aside>--}}
			{{----}}
<div class="centered ">
    <table class="" style="margin:0 auto;">
        <tr class=" borde">
            <td>
                <p>
                    {{$partido->equipo1->nombre}}
                    <img src="{{asset($partido->equipo1->getFotoEscudo())}}" alt="Escudo">
                </p>
            </td>
            <td style="padding: 0px 10px;">vs</td>
            <td>
                <p>
                    <img src="{{asset($partido->equipo2->getFotoEscudo())}}" alt="Escudo">
                    {{$partido->equipo2->nombre}}
                </p>
            </td>
        </tr>
    </table>
</div>
			
			
		
	