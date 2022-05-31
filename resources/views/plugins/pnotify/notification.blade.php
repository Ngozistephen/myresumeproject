@if (session()->has('notification'))
    <script>
        var notificationString = "{!! addslashes (session('notification')) !!}";
        var notificationObj = JSON.parse(notificationString);

        PNotify.alert(notificationObj);
    </script>
 
@endif
