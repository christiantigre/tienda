
            @if (Session::has('flash_message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message') }}
                </div>
            @endif


            @if (Session::has('flash_message_info'))
                <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message_info') }}
                </div>
            @endif

            @if (Session::has('flash_message_war'))
                <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_message_war') }}
                </div>
            @endif