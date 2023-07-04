$(document).ready(function (){
    $('.delete-button').click(function(e){
        e.preventDefault();
        var myid = $(this).val();
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: "post",
                url: "delete.php",
                data: {
                    'mydelete': true,
                    'myid': myid,
                },
                

                success: function (response) {
                    
                }
            });
        
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            ) 
        }
        })
    });
});