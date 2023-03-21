@if (Session::has('success'))
    <script>
    $.toast({
        heading: 'Success',
        text: '{{Session::get('success')}}',
        showHideTransition: 'slide',
        icon: 'success',
        position: 'top-right',
        stack: false
    })
    </script>
@endif
    
@if (Session::has('error'))
    <script>
    $.toast({
        heading: 'Error',
        text: '{{Session::get('error')}}',
        showHideTransition: 'slide',
        icon: 'error',
        position: 'top-right',
        stack: false
    })
    </script>
@endif