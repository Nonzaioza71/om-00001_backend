<div class="col-12 pt-5">
    <h1>บัญชีผู้ใช้งานระบบ</h1>
    <hr>
    <div class="col-12">
        <div class="container">
            <table class="table table-striped">
                <tr>
                    <th><label class="text-center w-100">#</label></th>
                    <th><label class="text-center w-100">ชื่อ-นามสกุล</label></th>
                    <th><label class="text-center w-100">บทบาท</label></th>
                    <th><label class="text-center w-100">สถานะ</label></th>
                    <th><label class="text-center w-100">Action</label></th>
                </tr>
                <?php for ($i = 0; $i < count($users_list); $i++) {
                    $item = $users_list[$i] ?>
                    <tr>
                        <td><label class="text-center w-100"><?php echo $i + 1 ?></label></td>
                        <td><label class="text-start w-100"><?php echo $item['user_prefix'] . $item['user_name'] . " " . $item['user_lastname'] ?></label></td>
                        <td><label class="text-center w-100"><?php echo strtoupper($item['user_role']) ?></label></td>
                        <td><label class="text-center w-100">
                                <?php echo $isBanned = boolval($item['user_banned'])
                                    ? '<button class="btn btn-danger w-100">ถูกระงับการใช้งาน</button>'
                                    : '<button class="btn btn-success w-100">ปกติ</button>'
                                ?>
                            </label></td>
                        <td>
                            <div class="btn-group gap-1 w-100 align-items-center">
                                <button class="btn btn-primary" onclick="window.location.href = '?app=Accounts&view=detail&user_id=<?php echo $item['user_id'] ?>'">รายละเอียด</button>
                                <button class="btn btn-warning" onclick="_handleUpdateUser('<?php echo $item['user_name'] ?>', <?php echo $item['user_id'] ?>, <?php echo $item['user_banned'] ?>, '<?php echo $item['user_role'] ?>')">
                                    แก้ไขข้อมูล
                                </button>
                                <?php if (boolval($item['user_banned'])) { ?>
                                    <button class="btn btn-success" onclick="_handleBanUser(<?php echo $item['user_id'] ?>, <?php echo $item['user_banned'] ?>)">
                                        ปลดการระงับ
                                    </button>
                                <?php } else { ?>
                                    <button class="btn btn-danger" onclick="_handleBanUser(<?php echo $item['user_id'] ?>, <?php echo $item['user_banned'] ?>)">
                                        ระงับการใช้งาน
                                    </button>
                                <?php } ?>
                                <button class="btn btn-danger" onclick="_handleDeleteUser(<?php echo $item['user_id'] ?>)">
                                    ลบออกจากระบบ
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<script>
    function _handleBanUser(id, user_banned) {
        const isBanned = !Boolean(user_banned)
        const _confirm = confirm(isBanned ? "คุณต้องการระงับการใช้งานบัญชีนี้จริงหรือไม่?" : "คุณต้องการปลดการระงับการใช้งานบัญชีนี้จริงหรือไม่?")
        if (_confirm) {
            fetch('Controllers/bannedUserByID.php', {
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json"
                    },
                    method: "POST",
                    body: JSON.stringify({
                        user_id: id,
                        isBanned
                    })
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    if (data) {
                        alert("ดำเนินการเสร็จสิน!")
                        window.location.reload()
                    } else {
                        alert("เกิดข้อผิดพลาด!")
                        window.location.reload()
                    }
                })
                .catch(e => {
                    alert("เกิดข้อผิดพลาด!")
                    console.log(e)
                })
        }
    }

    function _handleDeleteUser(id) {
        const _confirm = confirm("คุณต้องการลบบัญชีนี้จริงหรือไม่?")
        if (_confirm) {
            fetch('Controllers/deleteUserByID.php', {
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json"
                    },
                    method: "POST",
                    body: JSON.stringify({
                        user_id: id
                    })
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    if (data) {
                        alert("ดำเนินการเสร็จสิน!")
                        window.location.reload()
                    } else {
                        alert("เกิดข้อผิดพลาด!")
                        window.location.reload()
                    }
                })
                .catch(e => {
                    alert("เกิดข้อผิดพลาด!")
                    console.log(e)
                })
        }
    }

    function _handleChangeRoleUser(user_id, user_role) {
        fetch('Controllers/updateRoleUserByID.php', {
                headers: {
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                },
                method: "POST",
                body: JSON.stringify({
                    user_id,
                    user_role
                })
            })
            .then(res => res.json())
            .then(data => {
                console.log(data);
                if (data) {
                    alert("ดำเนินการเสร็จสิน!")
                    window.location.reload()
                } else {
                    alert("เกิดข้อผิดพลาด!")
                    window.location.reload()
                }
            })
            .catch(e => {
                alert("เกิดข้อผิดพลาด!")
                console.log(e)
            })
    }
</script>

<?php require_once(__DIR__ . '/modal.inc.php'); ?>