<?php
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo "
            <script>
                iziToast.success({
                    title: 'Success',
                    message: '" . $_GET['message'] . "',
                    position: 'bottomRight',
                });
            </script>
        ";
    } 

    if (isset($_GET['error']) && $_GET['error'] == 'true') {
        echo "
            <script>
                iziToast.error({
                    title: 'Error',
                    message:  '" . $_GET['message'] . "',
                    position: 'bottomRight',
                });
            </script>
        ";
    }
?>