
<h1>Bienvenid@ {{ $data['name'] }}</h1>
<p>
Lamentamos esto, por motivos de seguridad se tuvo que desactivar esta cuenta <b>Store-Line</b>, esto puede ser causa me exeder el numero de intentos de login o inactividad en el sitio.
Para que puedas activar tu cuenta debes dar click en el siguiente enlace.
</p>

<a href="{{ url('/') }}/recupera/comfirm_token/{{ $data['comfirm_token'] }}/email/{{ $data['email'] }}"> RECUPERAR CUENTA </a>
