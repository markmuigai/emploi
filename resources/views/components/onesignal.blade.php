<!-- ONESIGNAL -->
@if(Request::server ("SERVER_NAME") == 'emploi.co')
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "926b129f-755b-4029-a039-e9ef27e36b16",
    });
  });
</script>
@endif