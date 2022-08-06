<!-- JAVASCRIPT -->
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('assets/libs/moment/moment.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>

<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

@stack('scripts')

<script>
    window.livewire.on('success', message => {
        Swal.fire({
            title: message.title || 'Success',
            text: message.text,
            type: 'success',
            confirmButtonColor: '#3b5de7'
        });
    });

    window.livewire.on('error', message => {
        Swal.fire({
            title: message.title || 'Error',
            text: message.text,
            type: 'error',
            confirmButtonColor: '#3b5de7'
        });
    });

    window.livewire.on('success_redirect', message => {
        Swal.fire({
            title: message.title || 'Success',
            text: message.text,
            type: 'success',
            confirmButtonColor: '#3b5de7'
        }).then(function () {
            window.location = message.url;
        });
    });
    window.livewire.on('success_redirect_href', message => {
        Swal.fire({
            title: message.title || 'Success',
            text: message.text,
            type: 'success',
            confirmButtonColor: '#3b5de7'
        }).then(function () {
            window.open( message.url, '_blank');
        });
    });
    window.livewire.on('reload', message => {

        window.location = message.url;

    });

    window.livewire.on('modal', message => {
            $('#'+message).modal('toggle');
    });


    window.livewire.on('confirm', message  =>
    {
        $('#'+message).modal('hide');
    });
    function getDateFormat(date = null) {
            if (date) {
                var now = new Date(date);
            } else {
                var now = new Date();
            }
            var month = (now.getMonth() + 1);
            var day = now.getDate();
            if (month < 10)
                month = "0" + month;
            if (day < 10)
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            return today;
        }
            $(document).ready(function () {

                $('.modal.printable').on('shown.bs.modal', function () {
                    $('.modal-dialog', this).addClass('focused');
                    $('body').addClass('modalprinter');

                }).on('hidden.bs.modal', function () {
                    $('.modal-dialog', this).removeClass('focused');
                    $('body').removeClass('modalprinter');
                });

                var date = new Date();
                var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
                var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
                $('.currentDate').val(getDateFormat());
                $('.firstDate').val(getDateFormat(firstDay));
                $('.lastDate').val(getDateFormat(lastDay));
            });

</script>


