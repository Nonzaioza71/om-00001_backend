<pre>
</pre>
<div class="card col-12 h-100vh fixed-top d-none" id="theModal">
    <div class="card-body position-absolute w-100 top-25 justify-content-center">
        <div class="text-center">
            <h2>การแก้ไขบัญชี <span id="user_name"></span></h2>
            <h4 class="text-secondary">เพื่อความเป็นส่วนตัวและความปลอดภัยของผู้ใช้งาน สามารถเปลี่ยนข้อมูลได้เฉพาะบางส่วนเท่านั้น</h4>
        </div>
        <div class="col-12">
            <div class="container">
                <hr>
                <div class="btn-group align-items-center col-12 gap-1">
                    <button class="btn btn-warning" id="btn_clear_pin">ล้าง PIN</button>
                    <button class="btn btn-danger" id="btn_ban_user">ระงับการใช้งาน</button>
                    <button class="btn btn-danger" id="btn_remove_user">ลบออกจากระบบ</button>
                </div>
                <div class="col-12 mt-3">
                    <select name="user_role" id="user_role" class="form-select">
                        <?php for ($i = 0; $i < count($role_list); $i++) { $item = $role_list[$i]; ?>
                            <option 
                                value="<?php echo $item['value']?>" 
                                id="option_item"
                            >
                                <?php echo $item['text']?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <button class="btn btn-success w-100 mt-3" onclick="_toggleUserUpdateModal(false)">เสร็จสิ้น</button>
            </div>
        </div>
    </div>
</div>
<script>
    function _toggleUserUpdateModal(show) {
        const modal = document.querySelector('#theModal')
        show
            ?
            modal.classList.remove('d-none') :
            modal.classList.add('d-none')
    }

    function _handleUpdateUser(user_name, user_id, user_banned, user_role) {
        const text_user_name = document.querySelector('#user_name')
        const btn_clear_pin = document.querySelector('#btn_clear_pin')
        const btn_ban_user = document.querySelector('#btn_ban_user')
        const btn_remove_user = document.querySelector('#btn_remove_user')
        const selector_role = document.querySelector("#user_role")
        const options_item = document.querySelectorAll('#option_item')

        text_user_name.innerHTML = user_name
        btn_clear_pin.setAttribute('onClick', `
            console.log(${user_id})
        `)

        btn_ban_user.setAttribute('onClick', `
            _handleBanUser(${user_id}, ${user_banned})
        `)
        if (Boolean(user_banned)) {
            btn_ban_user.innerHTML = "ปลดการระงับใช้งาน"
            btn_ban_user.classList.add('btn-success')
            btn_ban_user.classList.remove('btn-danger')
        } else {
            btn_ban_user.innerHTML = "ระงับการใช้งาน"
            btn_ban_user.classList.remove('btn-success')
            btn_ban_user.classList.add('btn-danger')
        }

        btn_remove_user.setAttribute('onClick', `
            _handleDeleteUser(${user_id})
        `)

        selector_role.setAttribute('onChange', `
            _handleChangeRoleUser(${user_id}, this.value)
        `)

        options_item.forEach(ele=>{
            ele.removeAttribute('selected')
            if (ele.value == user_role) {
                ele.setAttribute('selected', true)
            }
        })

        _toggleUserUpdateModal(true)
    }
</script>