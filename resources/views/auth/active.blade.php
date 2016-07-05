<h1>Bienvenid@ {{ $data['name'] }}</h1>
<p>
Por motivos de seguridad debes hacer click en el siguiente enlace para que puedas disfrutar de todos nuestros servicios en <b>Store-Line</b>
</p>

<a href="{{ url('/') }}/confirm/comfirm_token/{{ $data['comfirm_token'] }}/email/{{ $data['email'] }}"> Confirmar mi cuenta </a>