@if (count($messages))
<script>
    @foreach ($messages as $message)
        FlashNotifier.open({
        message: "<img width='30' src='{{ asset('vendor/flash/icons/' . $message['icon'] . '.png') }}' /> {{ $message['message'] }}",
        messageTextColor: "{{ config('flash.options.messageTextColor') }}",
        position: "{{ config('flash.options.position') }}",
        customClass: "{{ config('flash.options.customClass') }}",
        width: "{{ config('flash.options.width') }}",
        showCloseButton: "{{ config('flash.options.showCloseButton') }}",
        closeButtonText: "{{ config('flash.options.closeButtonText') }}",
        duration: "{{ config('flash.options.duration') }}",
        onClose: "{{ config('flash.options.onClose') }}",
        closeButtonTextColor: "{{ config('flash.options.closeButtonTextColor') }}",
        backgroundColor: "{{ $message['type'] }}"
        });
    @endforeach
</script>
@endif
