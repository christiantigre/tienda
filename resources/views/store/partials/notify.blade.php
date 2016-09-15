@if (session('success'))	
<script type="text/javascript">
	$(document).ready(function(){
		new PNotify({
            title: '{{ session('success') }}',
            text: '!...',
            type: 'success'
        });
	});
</script>	
@endif
@if (session('error'))	
<script type="text/javascript">
	$(document).ready(function(){
		new PNotify({
            title: '{{ session('error') }}',
            text: '!...',
            type: 'error'
        });
	});
</script>	
@endif
@if (session('info'))	
<script type="text/javascript">
	$(document).ready(function(){
		new PNotify({
            title: '{{ session('info') }}',
            text: '!...',
            type: 'info'
        });
	});
</script>	
@endif
@if (session('warning'))	
<script type="text/javascript">
	$(document).ready(function(){
		new PNotify({
            title: '{{ session('warning') }}',
            text: '!...',
            type: 'warning'
        });
	});
</script>	
@endif