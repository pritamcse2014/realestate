<script type="text/javascript">
    @session("success")
        toastr.success("{{ $value }}", "Success");
    @endsession

    @session("info")
        toastr.info("{{ $value }}", "Info");
    @endsession

    @session("warning")
        toastr.warning("{{ $value }}", "Warning");
    @endsession

    @session("danger")
        toastr.error("{{ $value }}", "Danger");
    @endsession
</script>