<div class="col-12">
    <h1>บัญชีผู้ใช้งานระบบ</h1>
    <hr>
    <div class="col-12">
        <div class="container">
            <table class="table table-striped">
                <tr>
                    <th><label class="text-center w-100">#</label></th>
                    <th><label class="text-center w-100">ชื่อ-นามสกุล</label></th>
                    <th><label class="text-center w-100">บทบาท หรือ สถานะ</label></th>
                    <th><label class="text-center w-100">Action</label></th>
                </tr>
                <?php for ($i=0; $i < count($users_list); $i++) {  $item = $users_list[$i]?>
                    <tr>
                         <td><label class="text-center w-100"><?php echo $i+1?></label></td>
                         <td><label class="text-start w-100"><?php echo $item['user_prefix'].$item['user_name']." ".$item['user_lastname'] ?></label></td>
                         <td><label class="text-center w-100"><?php echo $item['user_role']?></label></td>
                         <td>
                            <div class="btn-group gap-1 w-100 align-items-center">
                                <button class="btn btn-primary" onclick="window.location.href = '?app=Accounts&view=detail&user_id=<?php echo $item['user_id']?>'">รายละเอียด</button>
                                <button class="btn btn-warning">แก้ไขข้อมูล</button>
                                <button class="btn btn-danger">ระงับการใช้งาน</button>
                                <button class="btn btn-danger">ลบออกจากระบบ</button>
                            </div>
                         </td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>