<div class="col-12 mt-5">
    <h1>จัดการสมาชิก</h1>
    <hr>
    <div class="card mt-3 p-5">
        <h3>รายชื่อผู้ใช้งาน</h3>
        <div class="d-flex">
            <input type="text" class="form-control" id="keyword">
            <button class="btn btn-primary" onclick="to(`?app=static_user&keyword=${document.querySelector('#keyword').value}`)">ค้นหา</button>
            <button class="btn btn-success" onclick="to(`?app=manage_user&view=insert`)">เพิ่ม</button>
        </div>
        <table class="table table-stripted">

            <tr>
                <th>#</th>
                <th>ชื่อ</th>
                <th>บทบาท</th>
                <th>Action</th>
            </tr>

            <?php for ($i = 0; $i < count($search_users); $i++) {
                $item = $search_users[$i] ?>
                <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $item['user_prefix'] . $item['user_name'] . " " . $item['user_lastname'] ?></td>
                    <td><?php echo strtoupper($item['user_role']) ?></td>
                    <td>
                        <button class="btn btn-primary" onclick="to('?app=manage_user&view=detail&idx=<?php echo $i ?>')">รายละเอียด</button>
                        <button class="btn btn-warning" onclick="to('?app=manage_user&view=update&idx=<?php echo $item['user_id'] ?>')">แก้ไข</button>
                        <button class="btn btn-danger" onclick="_deleteUser(<?php echo $item['user_id'] ?>)">ลบ</button>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>
</div>

<script>
    function _deleteUser(user_id) {
        fetch('Controllers/deleteUserByID.php', {
                headers: {
                    "Accept": 'application/json',
                    "Content-Type": 'application/json'
                },
                method: "POST",
                body: JSON.stringify({
                    user_id
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data) {
                    window.location.reload()
                } else {
                    getEle('#errorPage').classList.remove('d-none')
                }
            })

    }
</script>