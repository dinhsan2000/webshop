<div class="col-md-6">
        <div class="x_content">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sqlUser = "SELECT * FROM user";
                $result = mysqli_query($conn,$sqlUser);
                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $row['user_name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['mobile']?></td>
                            <td><?php echo ($row['status']) ? 'Admin' : 'Người dùng'?></td>
                            <td><?php echo date("d-m-Y H:i:s", strtotime($row['date_create']))?></td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>