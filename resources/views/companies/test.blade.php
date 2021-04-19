  echo '<script>      
        Swal.fire({
                title:'Good Job',
                text: 'Application submitted successfully',
                icon: 'success',
                confirmButton:true
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(function(){
                    window.location = "/post";
                },20);
                }
            });
            </script>';