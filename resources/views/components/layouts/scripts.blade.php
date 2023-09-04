<div>
    <script src="{{ @asset('assets/js/theme-mode.js') }}"></script>
    <script src="{{ @asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ @asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ @asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    {{ $slot  }}
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('toastError', (data) => {
                const message = data.length ? data[0].message : 'Whoops, looks like something went wrong!';
                toastr.error(message);
            });
    
            Livewire.on('toastSuccess', (data) => {
                const message = data.length ? data[0].message : 'Operation Completed Successfully!';
                toastr.success(message);
            });

            Livewire.on('hideModal', () => {
                $('.modal').modal('hide');
            });
        });
    </script>
</div>
