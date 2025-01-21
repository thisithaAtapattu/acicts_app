function confirmation(form_id, message) {

    swal({
        title: message,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById(form_id).submit();
            }
        });


}

function confirmFormWithSelctor(form_id, message, selector) {


    if (selector.value != "" && selector.value != 0) {


        swal({
            title: message,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById(form_id).submit();
                }
            });




    }



}