
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            padding: 20px;
        }
    </style>
</head>

<body class="">
   <div>
        <h2>Users List</h2>
    <form method="post" action="<?php echo yii\helpers\Url::to(['login/logout']) ?>">    
        <button class="btn btn-warning logout" style="float:right" >Logout</button>
    </form>
   </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if($user_details) {
                    $count = 1;
                    foreach ($user_details as $key => $value) { ?>
                        <tr id="row_1">
                            <td><?php echo $count ?></td>
                            <td><?php echo $value['username'] ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['age'] ?></td>
                            <td><?php echo $value['sex'] ?></td>
                            <td><?php echo $value['city'] ?></td>
                            <td><?php echo $value['state'] ?></td>
                            <?php if($value['status'] == 1)  { ?>
                            <td> 
                                <button class="btn btn-warning activeDeactiveBtn"  data-id = "<?php echo $value['id'] ?>" value="1">Active</button>
                            </td>
                        <?php } else { ?>
                             <td>
                                <button class="btn btn-warning activeDeactiveBtn"  data-id = "<?php echo $value['id'] ?>" value="0">Deactive</button>
                            </td>
                        <?php  } ?>
                        </tr>
                       <?php $count++; ?>   
                <?php } } else { ?>    
                    <tr>
                        <td>No User Details Found </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
   

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.activeDeactiveBtn').on('click', function () {
                var status =  $(this).val();
                if(status == 0){
                     status = 1;
                } else {
                    status = 0;
                }
                var id = $(this).data('id');
                var url = "<?php echo Yii::$app->urlManager->createUrl('users/statuschange'); ?>";
                data = {id : id , status : status};
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json',
                    success: function (R) {
                        console.log(R);
                        if(R.status == 1){
                            location.reload(true);
                        } else {
                          
                        }
                    },
                    error: function (R) {
                       
                    },
                });
            });
        });
    </script>
</body>

</html>