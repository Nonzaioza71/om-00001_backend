<div class="col-12 mt-5">
    <h1>จัดการสมาชิก</h1>
    <hr>
    <div class="col-12 p-5 card">
        <div class="btn-group col-12">
            <div class="btn btn-lg btn-outline-dark bg-primary-50 pt-5 pb-5">
                <h4 class="text-warning">จำนวนผู้เข้าชม <span class="text-lime"><?php echo $views_count ?></span></h4>
            </div>
            <div class="btn btn-lg btn-outline-dark bg-primary-50 pt-5 pb-5">
                <h4 class="text-warning">จำนวนสมาชิก <span class="text-lime"><?php echo $users_count ?></span></h4>
            </div>
        </div>
    </div>
    <div class="card mt-3 p-5">
        <h3>รายชื่อผู้ใช้งาน</h3>
        <div class="d-flex">
            <input type="text" class="form-control" id="keyword">
            <button class="btn btn-primary" onclick="to(`?app=static_user&keyword=${document.querySelector('#keyword').value}`)">ค้นหา</button>
        </div>
        <table class="table table-stripted">

            <tr>
                <th>#</th>
                <th>ชื่อ</th>
                <th>บทบาท</th>
            </tr>

            <?php for ($i = 0; $i < count($search_users); $i++) {
                    $item = $search_users[$i] ?>
                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $item['user_prefix'].$item['user_name']." ".$item['user_lastname'] ?></td>
                        <td><?php echo strtoupper($item['user_role']) ?></td>
                    </tr>
                <?php } ?>

        </table>
    </div>
</div>