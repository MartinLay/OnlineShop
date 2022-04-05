<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Export Mysql Data to Excel in Codeigniter 4 using PHPSpreadsheet</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4 mb-4">Export Mysql Data to Excel in Codeigniter 4 using PHPSpreadsheet</h2>
        <span id="message"></span>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">Employee Data</div>
                    <div class="col-md-6" align="right">
                        <a href="<?php echo base_url('employeecontroller/export'); ?>" class="btn btn-success">Export</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>                                
                                <th>Employee Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Department</th>                                
                            </tr>
                            <?php
                            foreach($data as $row)
                            {
                            ?>
                            <tr>
                                <td><?php echo $row["employee_name"];?></td>
                                <td><?php echo $row["employee_email"]; ?></td>
                                <td><?php echo $row["employee_mobile"]; ?></td>
                                <td><?php echo $row["employee_department"]; ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>