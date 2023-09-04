<div>
    <x-layouts.page-scripts>
       <script>
            document.addEventListener('livewire:initialized', () => {
                @this.on('confirmDeletion', (data) => {
                let name = data[0]?.name
                let id = data[0]?.id
                Swal.fire({
                        text: "Are you sure you want to delete " + name + "?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton:
                                "btn fw-bold btn-active-light-primary",
                        },
                    }).then(function (event) {
                        event.value
                            ? @this.dispatch('delete', [id])
                            : "cancel" === event.dismiss &&
                              Swal.fire({
                                  text: name + " was not deleted.",
                                  icon: "error",
                                  buttonsStyling: !1,
                                  confirmButtonText: "Ok, got it!",
                                  customClass: {
                                      confirmButton: "btn fw-bold btn-primary",
                                  },
                              });
                    });
            })


            @this.on('deleted', (name) => {
                Swal.fire({
                    text: "You have deleted " + name + "!.",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary",
                    },
                })
            })
            });
       </script>
    </x-layouts.page-scripts>
</div>  
